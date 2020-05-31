<?php

namespace App;

use App\{Session};

class User{
    public function checkLogin(){
        return session()->has("user");
    }

    public function login(string $id, string $password){
        $sql = "SELECT * FROM members WHERE user_id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$id, $password]);

        if($user == null){
            return false;
        }

        Session::set("user", $user);
        return $user;
    }

    public function get(){
        return session()->get('user', true);
    }
    
    public function logout(){
        return Session::remove('user');
    }
}