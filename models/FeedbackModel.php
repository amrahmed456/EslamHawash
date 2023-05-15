<?php

class FeedbackModel extends Database{
    
    private $db;
    private $tabel;
    private $port;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'feedback';
        $this->port = $this->prefix . 'portfolio';

    }


    
    public function get_message(){

        
        $query = "
            SELECT f.*,p.title_en FROM $this->tabel f
            JOIN $this->port p ON p.port_slug = f.port_id
            ORDER BY id desc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function delete_feedback($id){
        $query = "
            DELETE FROM $this->tabel WHERE id = ?
        ";
        $stmt = $this->db->prepare($query);
        if($stmt->execute([$id])){
            set_form_response(1,'Feedback Deleted succesfully');
            return true;
        }

        set_form_response(2);
        return;
    }

    public function check_duplicate($slug,$feedback){
        $query = "
            SELECT id FROM $this->tabel WHERE port_id = ? AND feedback = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$slug,$feedback]);
        if( $stmt->rowCount() > 0 ){
            return true;
        }
        return false;
    }

    public function insert_feedback($slug,$feedback){
        $d = $this->check_duplicate($slug,$feedback);
        $date = date('Y-m-d');
        if( $d === false ){
            $query = "
            INSERT INTO $this->tabel ( port_id, feedback, date ) VALUES ( ?,?,? )
            ";
            $stmt = $this->db->prepare($query);
            if($stmt->execute([$slug,$feedback,$date])){
                echo 'success';
                return;
            }
        }
        echo 'duplicate';
    }


}