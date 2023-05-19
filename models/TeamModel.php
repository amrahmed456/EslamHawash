<?php

class TeamModel extends Database{
    
    private $db;
    private $tabel;
    private $permissionsTable;
    private $usersPermissions;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'users';
        $this->permissionsTable = $this->prefix . 'permissions';
        $this->usersPermissions = $this->prefix . 'users_permissions';
    }


    public function get_team($id = '' , $limit = '' , $pin = '' , $except = ''){
        
        $where  = ( $id == '' ) ? '' : ' AND id = ' . $id;
        $pin    = ( $pin == '' ) ? '' : ' AND pin = ' . $pin;
        $except = ( $except == '' ) ? '' : ' AND id != ' . $except;
        $limit  = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
        
        $query = "
            SELECT * FROM $this->tabel
            WHERE photo != '' $where $pin $except ORDER BY member_order ASC $limit
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    public function delete_member($id){
        $query = "
            DELETE FROM $this->tabel WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }


    public function edit_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src,$id,$permissions){
        $query = " UPDATE $this->tabel SET name_en = ?, name_ar = ?, job_en = ? , job_ar = ? , facebook = ?, instagram = ?, email = ? , whatsapp = ?, member_order = ?, pin = ? , photo = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $exec = $stmt->execute([$name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src,$id]);

        if($exec){
            self::syncUserPermissions($id, $permissions);
            return true;
        }
        return false;
    }


    public function insert_new_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img,$permissions, $password){

        $query = "
            INSERT INTO $this->tabel ( name_en,name_ar,job_en,job_ar,facebook,instagram,email,whatsapp,member_order,pin,photo,password ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->db->prepare($query);
        $exec = $stmt->execute([$name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img,$password]);

        if($exec){
            $query = "SELECT id FROM $this->tabel ORDER BY id desc LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $user_id = $stmt->fetch()['id'];
            self::syncUserPermissions($user_id , $permissions);
            return true;
        }
        return false;

    }

    public function syncUserPermissions($user_id, $permissions){
        $query = "
            DELETE FROM $this->usersPermissions WHERE user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);

        if($permissions == ''){
            return;
        }
        // insert new ones
        $sql = "INSERT INTO $this->usersPermissions (user_id, permission_id) VALUES ";
        $placeholders = array();
        foreach ($permissions as $permission) {
            $placeholders[] = "(?, ?)";
        }

        $sql .= implode(", ", $placeholders);

        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);

        // Bind the parameters
        $params = array();
        foreach ($permissions as $permission) {
            $params[] = $user_id;
            $params[] = $permission;
        }

        $stmt->execute($params);
    }
    
    public function team_count(){
        $query = "
        SELECT id FROM $this->tabel
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }


    public function get_all_permissions(){
        $query = "SELECT * FROM $this->permissionsTable";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function get_user_permissions($user_id){
        $query = "
            SELECT p.id as per_id,p.title as per_title, p.name as per_name,u.user_id FROM $this->usersPermissions u
            JOIN $this->permissionsTable p ON p.id = u.permission_id
            WHERE u.user_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

}