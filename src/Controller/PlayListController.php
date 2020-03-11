<?php

namespace Controller;

use App\{DB, User};

class PlayListController {
    public function playList() {
        extract($_POST);

        $lists = "SELECT * FROM `playlists`";
        $dataNum = DB::fetchAll($lists, []);

        $list = \implode('/', $list);
        if(count($dataNum) < 10) {
            $sql = "INSERT INTO `playlists` (`id`,`user_id`, list) VALUES (?, ?, ?)";
            $cnt = DB::execute($sql, [$idx, $maker, $list]);
        }
    }
}