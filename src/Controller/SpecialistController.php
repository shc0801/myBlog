<?php 
namespace Controller;
use App\DB;

class SpecialistController {
    function specialistPage() {
        $specialist = DB::fetchAll("SELECT * FROM specialist WHERE 1");
        $specialist_rating = DB::fetchAll("SELECT * FROM specialist_rating WHERE 1");
        
        view("specialist", ['specialist'=>$specialist, 'specialist_rating'=>$specialist_rating]);
    }

    function reviewProccess() {
        \extract($_POST);
        var_dump($specialist_id);
        exit;
        DB::execute("INSERT INTO specialist(user_id, user_name, content, price, specialist_id, rating) VALUES(?, ?, ?, ?, ?, ?)", 
                    [$_SESSION['user']->user_id, $_SESSION['user']->user_name, $content, $price, $specialist_id, $rating]);

        DB::execute("INSERT INTO specialist_rating(user_id, specialist_id, rating) VALUES(?, ?, ?)", 
                    [$_SESSION['user']->user_id, $specialist_id, $rating]);
    }
}