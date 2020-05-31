<?php 
namespace Controller;

use App\DB;

class PartyController {
    function partyPage() {
        $boards = DB::fetchAll("SELECT * FROM party WHERE 1");
        $partys = DB::fetchAll("SELECT * FROM rating WHERE 1");
        
        view("party", ['boards'=>$boards, 'partys'=>$partys]);
    }

    function writeProccess() {
        \extract($_POST);
        $uploadfile = $_SERVER["DOCUMENT_ROOT"]."/uploads/";
        \move_uploaded_file($_FILES["before"]["tmp_name"], $uploadfile.$_FILES["before"]["name"]);
        \move_uploaded_file($_FILES["after"]["tmp_name"], $uploadfile.$_FILES["after"]["name"]);

        DB::execute("INSERT INTO party(user_id, user_name, content, before_pic, after_pic) VALUES(?, ?, ?, ?, ?)", [$_SESSION['user']->user_id, $_SESSION['user']->user_name, $content, $_FILES["before"]["name"], $_FILES["after"]["name"]]);
    }

    function ratingProccess() {
        \extract($_POST);

        $party = DB::fetch("SELECT * FROM rating WHERE user_id = ?", [$_SESSION['user']->user_id]);
        
        $board = DB::fetch("SELECT id FROM party WHERE user_id = ?", [$w_id]);
        if($party) {
            DB::execute("UPDATE rating SET rating = ? WHERE user_id = ?", [$rating, $w_id]);
        } else {
            DB::execute("INSERT INTO rating(user_id, party_id, rating) VALUES(?, ?, ?)", [$_SESSION['user']->user_id, $board->id, $rating]);
        }
    }
}