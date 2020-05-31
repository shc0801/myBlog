<?php
namespace Controller;

use App\DB;

class UserController {
    function loginProccess() {
        \extract($_POST);

        $find = DB::fetch("SELECT * FROM users WHERE user_id = ?", [$userid]);
        if(!$find) return back("존재하지 않는 아이디를 입력하셨습니다."); 
        if($find->password !== hash("sha256", $password)) return back("비밀번호가 일치하지 않습니다.");
        $_SESSION['user'] = $find;
        go("/", "로그인 되었습니다.");
    }
    
    function joinProccess() {
        \extract($_POST);
        $uploadfile = $_SERVER['DOCUMENT_ROOT']."/uploads/";

        if($_SESSION['capt'] != $_POST['captcha'])
            back("자동가입방지문구가 올바르지 않습니다.");
            
        $find = DB::fetch("SELECT id FROM users WHERE user_id = ?", [$userid]);

        if($find) 
            back("이미 존재하는 아이디입니다.");
        
        $password = hash("sha256", $password);

        move_uploaded_file($_FILES['profile-picture']['tmp_name'], $uploadfile.$_FILES["profile-picture"]["name"]);

        DB::execute("INSERT INTO users(user_id, user_name, password, profile_picture) VALUES(?, ?, password(?), ?)", [$userid, $username, $password, $_FILES["profile-picture"]['name']]);
        
        go("/", "회원가입 되었습니다.");
    }
    
    function logoutProccess() {
        unset($_SESSION['user']);
        go("/", "로그아웃 되었습니다.");
    }
}