<section id="housewarming-party">
    <div class="housewarming-party-bar w-30"></div>
    <div id="housewarming-party-container" class="container h-100 pt-4">
        <div class="section-title pt-5 pl-5 mt-5 ml-5">
            <p>H O U S E W A R M I N G<br>
                P A R T Y</p>
        </div>
        <div class="party">
            <?php foreach ($boards as $key => $board) { $rating = 0; ?>
                <div class="housewarming-party-list h-100 d-flex flex-column overflow-hidden">
                    <div class="list-img overflow-hidden">
                        <img class="w-100" src="./uploads/<?=$board->before_pic?>" alt="before" title="before">
                        <img class="w-100" src="./uploads/<?=$board->after_pic?>" alt="after" title="after">
                    </div>
                    <div class="board h-20 pb-3">
                        <p class="pt-2">"<?=$board->content?>"</p>
                        <input type="hidden" id="u_id" name="u_id" value="<?= $board->user_id?>">
                        <p class="font-weight-bold pt-1"><?=$board->user_id?>(<?=$board->user_name?>)</p>
                        평점: 
                        <?php foreach($partys as $key => $party) {
                            if($party->user_id == $board->user_id) 
                                $rating += $party->rating;
                        }?>
                        <?=$rating?>
                        <a id="rating-btn" data-toggle="modal" data-target="#rating">평점주기</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href="#" id="write-btn" class="party-footer float-right" data-toggle="modal" data-target="#write">글쓰기</a>
    </div>
</section>