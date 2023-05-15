<?php

class Messages{

    public function toggle_status(){

        $id         = filter_var($_POST['id'] , FILTER_SANITIZE_STRING );
        $to_status  = ( $_POST['form_action'] == 'mark-done') ? '1' : '0';
        $mssg = new MessagesModel;
        if( $mssg->toggle_status($id,$to_status) ){
            echo 'success-messages-page';
            return true;
        }
        set_form_response(2);
        return false;

    }


    public function delete_message(){
        $id = filter_var($_POST['message_id'], FILTER_SANITIZE_STRING);
        $cat = new MessagesModel;
        if( $cat->delete_message($id) ){
            set_form_response(1 , 'Message deleted succesfully :)');
            return true;
        }
        set_form_response(2);
        return false;
    }

    public function insert_new_message(){

        $name = filter_var($_POST['name'] , FILTER_SANITIZE_STRING );
        $method = filter_var($_POST['method'] , FILTER_SANITIZE_STRING );
        $contact = filter_var($_POST['contact'] , FILTER_SANITIZE_STRING );
        $mssg = filter_var($_POST['mssg'] , FILTER_SANITIZE_STRING );
        $date = date('Y-m-d');

        $cat = new MessagesModel;
        if( $cat->check_duplicate($name,$mssg) ){
            echo 'duplicate';
            return;
        }else{
            if( $cat->insert_new_message($name,$method,$contact,$mssg,$date) ){
                echo 'success';
                return;
            }
        }
        echo 'failed';
        return;
    }

}