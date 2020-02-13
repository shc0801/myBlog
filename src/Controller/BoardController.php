<?php

namespace Controller;

use App\{DB, Lib, User};

class BoardController {
    public function writeProcess() {
        extract($_POST);
        
        $sql = "INSERT INTO `writes` (`writer`, `title`, `content`) VALUES (?, ?, ?)";
        $cnt = DB::execute($sql, [$_SESSION['user']->user_id, $title, $content]);

        message("글이 업로드 되었습니다.");
    }

    public function list()
    {
        $sql = "SELECT * FROM writes WHERE id = ?, writer = ?, title = ?, content = ?";
        $list = DB::fetchAll($sql, [$id, $writer, $title, $content]);
        var_dump($list);
        exit;
    }
}