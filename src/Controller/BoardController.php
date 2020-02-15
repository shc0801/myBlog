<?php

namespace Controller;

use App\{DB, Lib, User};

class BoardController {
    public function writeProcess() {
        extract($_POST);
        
        $sql = "INSERT INTO `writes` (`writer`, `title`, `content`, `date`) VALUES (?, ?, ?, ?)";
        $cnt = DB::execute($sql, [$_SESSION['user']->user_id, $title, $content, $date]);

        message("글이 업로드 되었습니다.");
    }

    public function list() {
        if(!User::checkLogin()) {
            message("로그인 후 가능한 기능입니다");
            return;
        }
        $sql = "SELECT * FROM `writes` WHERE ?";
        $list = DB::fetchAll($sql, [1]);

        Lib::json(['success'=>true, 'list'=>$list]);
    }

    public function load() {
        extract($_POST);
        
        $sql = "SELECT * FROM `writes` WHERE id = ?";
        $writeData = DB::fetch($sql, [$write]);
        
        Lib::json(['success'=>true, 'writeData'=>$writeData]);
    }
}