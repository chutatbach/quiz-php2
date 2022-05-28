<?php

namespace App\Controllers;

use App\Models\User; // object in namespace
class LoginController
{
    function register()
    {
        $user = new User();
        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $avatar = $_FILES['avatar']['tmp_name'];
            $avatar_name = $_FILES['avatar']['name'];
            move_uploaded_file($avatar, __IMG__ . $avatar_name);
            $arr = array(
                'name' => $name,
                'email' => $email,
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'avatar' => $avatar_name,
            );
            $user->insert($arr);
            header("location:" . __URL__ . "login-resiter");
        }
    }
    function login()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $get_val =  User::all();
            foreach ($get_val as $val) {
                if ($val->email == $email && $val->password == $pass) {
                    // && password_verify($pass,$val->password) == true
                    $role = $val->role_id;
                    $id = $val->id;
                }
            }
            if (isset($role)) {
                if ($role == 1) {
                    $_SESSION['login'] = array(
                        'admin' => $role,
                        'id' => $id,
                    );
                    header("location:" . __URL__ . "admin/subject_teacher");
                }
                if($role < 1){
                    $_SESSION['login'] = array(
                        'user' => $role,
                        'id' => $id,
                    );
                    header("location:" . __URL__ . "user/subject_student");
                }
            } else {
                // setcookie('error',"<script>alert('tai khoan nay khong ton tai');</script>",10000);
                header("location:" . __URL__ . "login-resiter");
            }
        }
    }
    function logout(){
        unset($_SESSION['login']);
        header("location:" . __URL__ . "login-resiter");
    }
    function index()
    {
        return view('lg_rs',[]);
    }
}
