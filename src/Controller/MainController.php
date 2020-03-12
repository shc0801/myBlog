<?php 

namespace Controller;

use App\{DB, User, Lib};

class MainController {
    public function index() {
        include_once SRC . "/View/index.php";
    }

    public function music() {
        extract($_POST);
        
        $musics = "SELECT idx FROM musiclists";
        $musicData = DB::fetchAll($musics, []);

        if(count($musicData) < 31) {
            $sql = "INSERT INTO `musiclists` (`idx`,`name`, `albumName`,
                    `albumImage`, `artist`, `url`, `lyrics`, `genre`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $cnt = DB::execute($sql, [$idx, $name, $albumName, $albumImage, $artist, $url, $lyrics, $genre]);
        }
        
        $musicList = "SELECT * FROM musiclists";
        $musicListData = DB::fetchAll($musicList, []);
        
        Lib::json(['musicListData'=>$musicListData]);

        var_dump($musicListData);
    }

    public function musicData() {
        $musicList = "SELECT * FROM musiclists";
        $musicListData = DB::fetchAll($musicList, []);
        
        Lib::json(['musicListData'=>$musicListData]);

        var_dump($musicListData);
    }
}