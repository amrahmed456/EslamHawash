<?php

class CommentsModel extends Database{
    
    private $db;
    private $tabel;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'comments';
    }

    public function delete_comment($id){
        $query = "
            DELETE FROM $this->tabel WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function check_duplicate($name, $comment){
        $query = "
            SELECT id FROM $this->tabel WHERE name = ? AND comment = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name,$comment]);
        if( $stmt->rowCount() > 0 ){
            return true;
        }
        return false;
    }

    public function insert_new_comment($name,$email,$comment,$parent_id = 0){
        $query = "
            INSERT INTO $this->tabel ( name,email,comment,parent_id ) VALUES ( ?,?,?,? )
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name,$email,$comment,$parent_id]);
    }

    public function total_comments($status = ''){
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


    public function get_comment($id = '', $status = ''){

        $status = ( $status == '' ) ? '' : ' AND status = ' . $status;
        $id = ( $id == '' ) ? '' : ' AND id = ' . $id;
        $w = $status . $id;
        $query = "
            SELECT c.*,p.id,p.title_en as port_title, p.photos FROM $this->tabel c
            JOIN ". $this->prefix ."portfolio p ON p.id = c.port_id
            WHERE c.date != '' $w ORDER BY c.id desc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

}