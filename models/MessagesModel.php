<?php

class MessagesModel extends Database{
    
    private $db;
    private $tabel;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'messages';
    }


    public function toggle_status($id,$to_status){
        $query = "
            UPDATE $this->tabel SET status = ? WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$to_status,$id]);
    }


    public function get_message($id = '', $status = ''){

        $status = ( $status == '' ) ? '' : ' AND status = ' . $status;
        $id = ( $id == '' ) ? '' : ' AND id = ' . $id;
        $w = $status . $id;
        $query = "
            SELECT * FROM $this->tabel
             WHERE method != '' $w ORDER BY id desc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    public function delete_message($id){
        $query = "
            DELETE FROM $this->tabel WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function check_duplicate($name, $mssg){
        $query = "
            SELECT id FROM $this->tabel WHERE name = ? AND message = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name,$mssg]);
        if( $stmt->rowCount() > 0 ){
            return true;
        }
        return false;
    }

    public function insert_new_message($name,$method,$contact,$mssg,$date){
        $query = "
            INSERT INTO $this->tabel ( name,method,contact,message,date ) VALUES ( ?,?,?,?,? )
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name,$method,$contact,$mssg,$date]);
    }

    public function total_message($status = ''){
        $status = ( $status == '' ) ? '' : ' AND status = ' . $status;
        $query = "
        SELECT id FROM $this->tabel
        WHERE id != 0
        $status
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

}