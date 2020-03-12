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
        var_dump($_POST);
        extract($_POST);

        $user_id = $_SESSION['user']->user_id;
        $lists = "SELECT list FROM `playlists` WHERE user_id = ?";
        $dataList = DB::fetchAll($lists, [$user_id]);

        $data = $dataList[$playListNum]->list;

        $data = \explode('/', $data);
        array_splice($data, array_search($idx, $data), 1);
        $data = \implode('/', $data);

        $sql = "UPDATE `playlists` SET list = ? WHERE id = ?";
        $cnt = DB::execute($sql, [$data, $id]);
    }

    public function recommend() {
        extract($_POST);
        $playList = "SELECT `list` FROM `playlists` WHERE 1";
        $lists = DB::fetchAll($playList, []);

        foreach($lists as $data) {
            $data->list = \explode('/', $data->list);
        }

        $reliability = 0; $support = 0;

        foreach($lists as $list) {
            foreach($list as $data) {
                foreach($data as $dataIdx) {
                    var_dump($idx);
                    if($dataIdx == $idx) {
                        
                    }
                }
            }
        }
    }
}