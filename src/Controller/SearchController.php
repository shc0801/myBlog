<?php

namespace Controller;

use App\{DB, User, Lib};

class SearchController {
    public function searchData() {
        # 검색한 내용 가져오기
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

    public function selectData() {
        extract($_POST);
        $user_id = $_SESSION['user']->user_id;

        if($search == '') exit;

        # 검색한 기록 저장
        $lists = "SELECT `dataText` FROM `autocompletes` WHERE `user_id` = ?";
        $dataNum = DB::fetchAll($lists, [$user_id]);
        
        if(count($dataNum) < 5) {
            if(isset($_SESSION['user']->user_id)) {
                $sql = "INSERT INTO `autocompletes` (`user_id`, `dataText`) VALUES (?, ?)";
                $cnt = DB::execute($sql, [$user_id, $search]);
            }
        } else {
            $sql = "DELETE FROM `autocompletes` WHERE `user_id` = ?";
            $cnt = DB::execute($sql, [$user_id]);
            
            array_shift($dataNum);

            $i = 0;
            foreach($dataNum as $data) {
                $dataNum[$i] = $data->dataText;
                $i++;
            }
            array_push($dataNum, $search);

            foreach($dataNum as $data) {
                $sql = "INSERT INTO `autocompletes` (`user_id`, `dataText`) VALUES (?, ?)";
                $cnt = DB::execute($sql, [$user_id, $data]);
            }
        }
    }

    public function autocomplete() {
        $user_id = $_SESSION['user']->user_id;

        $lists = "SELECT `dataText` FROM `autocompletes` WHERE `user_id` = ?";
        $text = DB::fetchAll($lists, [$user_id]);

        Lib::json(['text'=>$text]);
    }
}  