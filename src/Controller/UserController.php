<?php

namespace Controller;

use App\{DB, User};

class UserController {
    public function members() {
        extract($_POST);
        
        $members = "SELECT user_id FROM members";
        $idData = DB::fetchAll($members, []);

        if(count($idData) < 10) {
            $sql = "INSERT INTO `members` (`user_id`,`password`) VALUES (?, PASSWORD(?))";
            $cnt = DB::execute($sql, [$id, $password]);
        }
    }

    public function login() {
        extract($_POST);

        $user = User::login($userid, $password);

        if($user == null){
            message("아이디 또는 비밀번호가 올바르지 않습니다.");
            return;
        }

        message("로그인 되었습니다.");
    }

    public function logout() {
        User::logout();
        message("로그아웃 되었습니다.");
    }
}