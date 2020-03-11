<?php

namespace Controller;

use App\{DB, User, Lib};

class PlayListController {
    public function innerPlayList() {
        $name = '알수없는 재생목록';
        extract($_POST);

        $lists = "SELECT * FROM `playlists`";
        $dataNum = DB::fetchAll($lists, []);

        $list = \implode('/', $list);
        if(count($dataNum) < 10) {
            $sql = "INSERT INTO `playlists` (`id`,`user_id`, `list`, `name`) VALUES (?, ?, ?, ?)";
            $cnt = DB::execute($sql, [$idx, $maker, $list, $name]);
        }
    }
    
    public function fetchPlayList() {
        $user_id = $_SESSION['user']->user_id;
        $lists = "SELECT * FROM `playlists` WHERE user_id = ?";
        $dataNum = DB::fetchAll($lists, [$user_id]);
        foreach($dataNum as $data) {
           $data->list = \explode('/', $data->list);
        }
        Lib::json(['dataNum'=>$dataNum]);
        
        var_dump($dataNum);
    }

    public function deletePlayList() {
        extract($_POST);
        $user_id = $_SESSION['user']->user_id;
        $lists = "SELECT * FROM `playlists` WHERE user_id = ?";
        $dataNum = DB::fetchAll($lists, [$user_id]);
        
        foreach($dataNum as $data) {
            $data->list = \explode('/', $data->list);
        }
        var_dump($dataNum);
        // array_splice($target, array_search('Orange', $fruits), 1);
    }
}