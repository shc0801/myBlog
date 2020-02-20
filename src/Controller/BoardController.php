<?php

namespace Controller;

use App\{DB, Lib, User};

class BoardController {
    public function writeProcess() {
        extract($_POST);
        var_dump($_POST);
        exit;
        $sql = "INSERT INTO `writes` (`writer`, `title`, `content`, `date`) VALUES (?, ?, ?, ?)";
        $cnt = DB::execute($sql, [$_SESSION['user']->user_id, $title, $content, $date]);

        message("글이 업로드 되었습니다.");
    }

    public function list() {
        if(!User::checkLogin()) {
            message("로그인 후 가능한 기능입니다");
            return;
        }
        $sql = "SELECT * FROM `writes` WHERE ? ";
        $list = DB::fetchAll($sql, [1]);
        Lib::json(['success'=>true, 'list'=>$list]);
    }

    public function writeLoad() {
        extract($_POST);
        
        $sql = "SELECT * FROM `writes` WHERE id = ?";
        $writeData = DB::fetch($sql, [$write]);
        
        Lib::json(['success'=>true, 'writeData'=>$writeData]);
    }

    public function comment() {
        extract($_POST);
        $sql =  "INSERT INTO `comments` (`write_id`, `user_id`, `comment`, `image`) VALUES(?, ?, ?, ?)";
        $cnt = DB::execute($sql, [$id, $_SESSION['user']->user_id, $comment, $_SESSION['user']->image]);

        message("댓글이 등록되었습니다.");
    }
    
    public function commentLoad() {
        extract($_POST);
        $sql = "SELECT C.* FROM comments C WHERE C.write_id = ?";
        $commentData = DB::fetchAll($sql, [$id]);

        Lib::json(['success'=>true, 'commentData'=>$commentData]);

        var_dump($commentData);
    }

    public function update() {
        extract($_POST);
        var_dump($_POST);
    }

    public function delete() {
        extract($_POST);
        var_dump($_POST);
    }
}