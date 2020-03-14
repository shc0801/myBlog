<?php

namespace Controller;

use App\{DB, User, Lib};

class SearchController {
    public function searchData() {
        extract($_POST);

        $playListData = [];

        $musicList = "SELECT * FROM `musiclists` WHERE `name` LIKE ? OR  `artist` LIKE ? ";
        $musicListData = DB::fetchAll($musicList, ["%$search%", "%$search%"]);
        
        if(isset($_SESSION['user']->user_id)) {
            $user_id = $_SESSION['user']->user_id;
            foreach($musicListData as $data) {
                $playList = "SELECT `id`, `list`, `name` FROM `playlists` WHERE `list` LIKE ? AND `user_id` = ?";
                $listData= DB::fetchAll($playList, ["%$data->idx%", $user_id]);
                foreach($listData as $list) {
                    $list->list = \explode('/', $list->list);
                    if(!in_array($list, $playListData))
                        \array_push($playListData, $list);
                }
            }
        }
        if(isset($playListData))
            Lib::json(['musicListData'=>$musicListData, 'playListData'=>$playListData]);
        else
            Lib::json(['musicListData'=>$musicListData]);
    }
}  