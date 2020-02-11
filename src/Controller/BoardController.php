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
}