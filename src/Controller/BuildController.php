<?php
namespace Controller;
use App\DB;

class BuildController {
    function buildPage() {
        $requests = DB::fetchAll("SELECT * FROM requests WHERE 1");
        $sends = DB::fetchAll("SELECT * FROM sends WHERE 1");
        
        view("build", ["requests"=>$requests, "sends"=>$sends]);
    }

    function requestProccess() {
        \extract($_POST);

        DB::execute("INSERT INTO requests(`user_id`, `user_name`, `date`, `content`, `state`, `volume`) VALUES(?, ?, ?, ?, ?, ?)", [$_SESSION['user']->user_id, $_SESSION['user']->user_name, $date, $content, 'false', '1']);
    }

    function buildProccess() {
        \extract($_POST);
        // DB::execute("UPDATE requests SET `state` = ? WHERE id = ?", [true, $num]);
        $requests = DB::fetch("SELECT * FROM requests WHERE id = ?", [$num]);
        var_dump($requests->id);
        DB::execute("INSERT INTO sends(`build_id`, `sender_id`, `sender_name`, `user_id`, `user_name`, `date`, `content`, `state`, `volume`, `price`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
                    [$requests->id, $_SESSION['user']->user_id, $_SESSION['user']->user_name, $requests->user_id, $requests->user_name, $requests->date, $requests->content, $requests->state, $requests->volume, $price]);
        go("/build", "견적이 전송되었습니다");
    }
}