<?php

namespace Controller;

use App\{DB, Lib, User};

class UserController
{
    //회원가입 처리를 하는 곳
    public function registerProcess()
    {
        extract($_POST);

        //입력값 검증
        /*
         * 회원아이디 : 5글자 이상 10글자 이하로 하고 오직 영문과 숫자만 올 수 있다.
         * 비밀번호 : 8글자 이상
         * 회원이름 : 한글만 1글자 이상
         * 비밀번호와 비밀번호 확인이 일치하는지 체크
         */
        if(!preg_match('/^[a-zA-Z0-9]{3,10}$/', $userid)) {
            if($userid === '') 
                message("아이디를 입력하세요");
            else
                message("회원아이디는 영문 숫자로 3글자 이상 10글자 이하여야합니다.");
            return;
        }
        if(!preg_match('/^[가-힣]{1,}$/', $username)) {
            if($username === '') 
                message("이름를 입력하세요");
            else
                message("회원이름은 한글로 1글자 이상이여합니다.");
            return;
        }
        if(!preg_match('/^.{6,}$/', $password)) {
            if($password === '') 
                message("비밀번호를 입력하세요");
            else
                message("비밀번호는 6글자 이상이여야 합니다.");
            return;
        }else if($password !== $passwordc){
            message("비밀번호와 확인이 일치하지 않습니다.");
            return;
        }

        $sql = "INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `level`) VALUES (?, ?, ?, PASSWORD(?), 1)";
        $cnt = DB::execute($sql, [$userid, $useremail, $username, $password]);
        message("회원가입 되었습니다.");
    }

    public function loginProcess()
    {
        extract($_POST);

        $errors = [];
        if(trim($userid) === "") $errors['userid'] = "유저 아이디는 공백일 수 없습니다.";
        if(trim($password) === "") $errors['password'] = "비밀번호는 공백일 수 없습니다.";

        $user = User()->login($userid, $password);

        if($user == null){
            message("아이디 또는 비밀번호가 올바르지 않습니다.");
            return;
        }

        message("로그인 되었습니다.");
    }

    public function logoutProcess()
    {
        user()->logout();
        message("로그아웃 되었습니다.");
    }
}