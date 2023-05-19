<?php

class UsersModel extends Database{
    
    private $db;
    private $tabel;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'users';
    }


    public function insertUser($name, $email, $password){
        $query = "
            INSERT INTO
            $this->tabel
            (name_en,email,password)
            VALUES
            (?,?,?,?,)
        ";
        $stmt = $this->db->prepare($query);
        if( $stmt->execute([$name, $email, $password]) ){
            return true;
        }
        return false;
    }

    public function get_user($id , $email = ''){
        
        $query = "
            SELECT *
            FROM $this->tabel
            WHERE id = ? OR email = ?
            LIMIT 1
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id , $email]);
        
       
        if($stmt->rowCount() > 0){
            $data = $stmt->fetch();
            return $data;
        }
        return false;
    }


    public function block_user($id){
        $query = "UPDATE $this->tabel SET user_status = 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        if($stmt->execute([$id])){
            return '1';
        }
    }
    public function reactivate_user($id){
        $query = "UPDATE $this->tabel SET user_status = 0 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        if($stmt->execute([$id])){
            return '0';
        }
    }

    public function update_user_info($id,$name,$password){
        if($password != ''){
            $password = password_hash($password,PASSWORD_DEFAULT);
            $password = ', password = "'. $password . '"';
        }
        $query = "
            UPDATE $this->tabel SET name_en = ? ". $password ." WHERE id = ?
        ";
      
        $_SESSION['user']['name'] = $name;
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name,$id]);
    }

    public function upload_user_profile($id,$dest){
        $query = "
            UPDATE $this->tabel
            SET image = ?
            WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$dest,$id]);
    }

    public function forget_pass($email,$pass){
        $query = "
            UPDATE $this->tabel SET password = ? WHERE email = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$pass,$email]);
        if($stmt->rowCount() > 0){
            return true;
        }

        return false;
    }

    public function checkUserExist($email){
        $query = "SELECT id FROM $this->tabel WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0){
            return true;
        }
        return false;
    }

}