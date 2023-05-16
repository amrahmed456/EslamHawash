<?php

class Users{

    public function register_new_user(){
        $name           = filter_var(trim($_POST['name']) , FILTER_SANITIZE_STRING);
        $email          = filter_var(trim($_POST['email']) , FILTER_SANITIZE_EMAIL);
        $phone          = filter_var(trim($_POST['phone']) , FILTER_SANITIZE_STRING);
        $password       = filter_var(trim($_POST['password']) , FILTER_SANITIZE_STRING);
        $re_password    = filter_var(trim($_POST['re-password']) , FILTER_SANITIZE_STRING);
        $occupation     = (isset($_POST['occupation'])) ? filter_var(trim($_POST['occupation']) , FILTER_SANITIZE_STRING) : '';
        $ref = $_POST['ref'];

        if(strlen($name) <= 2 || filter_var($email , FILTER_VALIDATE_EMAIL) == false || strlen($password) <= 6 || $password != $re_password){
            set_form_response(2 , 'عفوا, يبدو انك أدخلت بيانات خاطئة تأكد من ادخال البيانات بشكل صحيح');
            return;
        }else{
            
            $user = new UsersModel;
            if(!$user->checkUserExist($email , $phone)){

                $password   = password_hash($password , PASSWORD_DEFAULT);
                $date       = date('y-m-d');
                if($user->insertUser($name, $email, $phone, $password,$occupation,$date)){
                    $user = $user->get_user(0 , $email);
                    $d = new TeamModel();
                    $user_permissions = $d->get_user_permissions($user['id']);
                    $this->set_users_session($user , $user_permissions);
                    header("Location: $ref");
                }

            }else{
                set_form_response(2, 'هذا المستخدم مسجل بالفعل');
            }
            return;
        }
    }

    public function login_user(){
        $email    = filter_var(trim($_POST['email']) , FILTER_SANITIZE_STRING);
        $password  = filter_var(trim($_POST['password']) , FILTER_SANITIZE_STRING);

        $user = new UsersModel;
        $user = $user->get_user(0,$email );
        if(!$user){
            set_form_response(2,'User Dosen\'t Exist ');
        }else{
            // check password
            if(password_verify($password , $user['password']) && $user['status'] != 2){ // 2 = blocked user
                $d = new TeamModel();
                $user_permissions = $d->get_user_permissions($user['id']);
                $this->set_users_session($user , $user_permissions);
                header("Location: index.php");
            }else{
                set_form_response(2 , 'Password is incorrect!, Try Again');
            }
            
        }

        return;

    }

    public function set_users_session($user , $permissions = []){
        $arr = [
            "name" => $user['name_en'],
            "email" => $user['email'],
            "status" => $user['status'],
            "user_id"   => $user['id'],
            "permissions"   => $permissions
        ];
        $_SESSION['user'] = $arr;
    }


    public function update_user_info(){
        $id         = $_SESSION['user']['user_id'];
        $name       = filter_var(trim($_POST['name']) , FILTER_SANITIZE_STRING);
        $password   = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $db = new UsersModel;
        if($db->update_user_info($id,$name,$password)){
            set_form_response(1 , 'Profile Info. Updated Successfully');
            return;
        }
        set_form_response(2);
    }

    // upload user pic
    public function upload_user_profile(){
        $id     = $_SESSION['user']['user_info']['user_id'];
        $img    = new Images;
        $dest   = $img->upload_image();
        $db     = new UsersModel;
        if($db->upload_user_profile($id,$dest)){
            return $dest;
        }
        return 'error';
    }

    public function forget_pass(){
        $email  = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $new_pas= uniqid(true);
        $hashed = password_hash($new_pas, PASSWORD_DEFAULT);
        $db = new UsersModel;
        if($db->forget_pass($email,$hashed)){
            
            $to = $email;
            $subject = "نسيت كلمة السر - " . WEBSITE_SETTINGS['title'];
            $mssg = "
                نخطرك بأنه قد تم إنشاء كلمة مرور مؤقته يمكنك إستخدامها للدخول لحسابك وبرجاء تغييرها بمجرد تسجيل الدخول ( $new_pas )
            ";
            $mail = new Emails;
            if($mail->send_mail($to,$subject,$mssg)){
                return 'success';
            }else{
                return 'wow';
            }
        }
        return 'error';
    }


}