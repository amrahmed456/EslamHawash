<?php

class TeamModel extends Database{
    
    private $db;
    private $tabel;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'team';
    }


    public function get_team($id = '' , $limit = '' , $pin = ''){
        
        $where  = ( $id == '' ) ? '' : ' AND id = ' . $id;
        $pin    = ( $pin == '' ) ? '' : ' AND pin = ' . $pin;
        $limit  = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
        $query = "
            SELECT * FROM $this->tabel
            WHERE photo != '' $where $pin ORDER BY member_order ASC $limit
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function delete_member($id){
        $query = "
            DELETE FROM $this->tabel WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }


    public function edit_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src,$id){
        $query = " UPDATE $this->tabel SET name_en = ?, name_ar = ?, job_en = ? , job_ar = ? , facebook = ?, instagram = ?, email = ? , whatsapp = ?, member_order = ?, pin = ? , photo = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src,$id]);
    
    }


    public function insert_new_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img){

        $query = "
            INSERT INTO $this->tabel ( name_en,name_ar,job_en,job_ar,facebook,instagram,email,whatsapp,member_order,pin,photo ) VALUES (?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img]);

    }
    
    public function team_count(){
        $query = "
        SELECT id FROM $this->tabel
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

}