<?php

namespace App;

class User{
    public function checkLogin(){
        return session()->has("user");
    }

    public function login(string $id, string $password){
        $sql = "SELECT * FROM users WHERE user_id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$id, $password]);

        if($user == null){
            return false;
        }

        session()->set("user", $user);
        return $user;
    }

    public function get(){
        return session()->get('user', true);
    }
    
    public function logout(){
        return session()->remove('user');
    }
}