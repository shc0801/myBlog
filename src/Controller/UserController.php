<?php

namespace Gondr\Controller;

use Gondr\App\{DB, Lib};

class UserController extends MasterController
{
    //회원가입 처리를 하는 곳
    public function registerProcess()
    {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $passwordc = $_POST['passwordc'];
        $username = $_POST['username'];

        //입력값 검증
        /*
         * 회원아이디 : 5글자 이상 10글자 이하로 하고 오직 영문과 숫자만 올 수 있다.
         * 비밀번호 : 8글자 이상
         * 회원이름 : 한글만 1글자 이상
         * 비밀번호와 비밀번호 확인이 일치하는지 체크
         */
        $errors = [];
        if(!preg_match('/^[a-zA-Z0-9]{5,10}$/', $userid)) {
            $errors['userid'] = "회원아이디는 영문 숫자로 5글자 이상 10글자 이하여야합니다.";
        }
        if(!preg_match('/^.{8,}$/', $password)) {
            $errors['password'] = "비밀번호는 8글자 이상이여야 합니다.";
        }else if($password !== $passwordc){
            $errors['password'] = "비밀번호와 확인이 일치하지 않습니다.";
        }
        if(!preg_match('/^[가-힣]{1,}$/', $username)) {
            $errors['username'] = "회원이름은 한글로 1글자 이상이여합니다.";
        }

        if(count($errors) != 0){
            $this->render("user/register", ['errors' => $errors]);
            return;
        }

        $sql = "INSERT INTO `users` (`id`, `name`, `password`, `level`) VALUES (?, ?, PASSWORD(?), 1)";
        $cnt = DB::execute($sql, [$userid, $username, $password]);
        if($cnt == 1){
            Lib::redirect("/user/login", "회원가입이 성공적으로 이루어졌습니다.");
        }else {
            Lib::redirect("/user/register", "회원가입이 실패했습니다.");
        }
    }

    public function login(){
        $this->render("/user/login");
    }

    public function loginProcess()
    {
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        $errors = [];
        if(trim($userid) === "") $errors['userid'] = "유저 아이디는 공백일 수 없습니다.";
        if(trim($password) === "") $errors['password'] = "비밀번호는 공백일 수 없습니다.";
        if(count($errors) != 0){
            $this->render("user/login", ['errors' => $errors]);
            return;
        }

        $user = user()->login($userid, $password);

        if($user == null){
            Lib::redirect("/user/login", "아이디 또는 비밀번호가 올바르지 않습니다.");
        }

        session()->set("user", $user);
        Lib::redirect("/", "로그인 완료");
    }

    public function logoutProcess()
    {
        user()->logout();
        Lib::redirect("/", "로그아웃 완료");
    }
}