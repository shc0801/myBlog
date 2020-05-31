<!-- 전문가 영역 -->
<section id="special-list">
    <div class="special-list-bar w-35"></div>
    <div id="special-list-container" class="container pt-4">
        <div class="section-title pt-5 pl-5 ml-5 mt-5">
            <p>B E S T <br>
                S P E C I A L I S T</p>
        </div>
        <div class="special-list-main w-90 h-50 mt-5 pt-5">
            <div class="special-list">
                <div class="rotate">
                   <img class="circle front" src="./images/specialist/specialist1.jpg">
                    <div class="circle back">
                        <p class="mt-5 pt-5">전문가1<br><span>( specialist1 )</span></p>
                        <?php 
                            $sum = 0;
                            $count = 0;
                            foreach($specialist_rating as $key => $rating) {
                                if($rating->specialist_id == "specialist1") {
                                    $sum += $rating->rating;
                                    $count++;
                                }
                            }
                            if($sum != 0)
                                $sum /=$count;
                        ?>
                        <p>
                            <?php for($i = 0; $i < floor($sum); $i++) { ?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                            
                            <?php for($i = 0; $i < 5 - floor($sum); $i++) { ?>
                                <i class="fa fa-star-o"></i>
                            <?php } ?>
                        </p>
                        <a class="specialist1 review-btn mt-3" data-toggle="modal" data-target="#review-form">시공 후기 작성</a>
                        <input type="hidden" id="s_id" name="s_id" value="specialist1">
                    </div>
                </div>
            </div>
            <div class="special-list">
                <div class="rotate">
                   <img class="circle front" src="./images/specialist/specialist2.jpg">
                    <div class="circle back">
                        <p class="mt-5 pt-5">전문가2<br><span>( specialist2 )</span></p>
                        <?php 
                            $sum = 0;
                            $count = 0;
                            foreach($specialist_rating as $key => $rating) {
                                if($rating->specialist_id == "specialist2") {
                                    $sum += $rating->rating;
                                    $count++;
                                }
                            }
                            if($sum != 0)
                                $sum /= $count;
                        ?>
                        <p>
                            <?php for($i = 0; $i < floor($sum); $i++) { ?>
                                </i><i class="fa fa-star"></i>
                            <?php } ?>
                            
                            <?php for($i = 0; $i < 5 - floor($sum); $i++) { ?>
                                </i><i class="fa fa-star-o"></i>
                            <?php } ?>
                        </p>
                        <a class="specialist2 review-btn mt-3" data-toggle="modal" data-target="#review-form">시공 후기 작성</a>
                        <input type="hidden" id="s_id" name="s_id" value="specialist2">
                    </div>
                </div>
            </div>
            <div class="special-list">
                <div class="rotate">
                   <img class="circle front" src="./images/specialist/specialist3.jpg">
                    <div class="circle back">
                        <p class="mt-5 pt-5">전문가3<br><span>( specialist3 )</span></p>
                        <?php 
                            $sum = 0;
                            $count = 0;
                            foreach($specialist_rating as $key => $rating) {
                                if($rating->specialist_id == "specialist3") {
                                    $sum += $rating->rating;
                                    $count++;
                                }
                            }
                            if($sum != 0)
                                $sum /=$count;
                        ?>
                        <p>
                            <?php for($i = 0; $i < floor($sum); $i++) { ?>
                                </i><i class="fa fa-star"></i>
                            <?php } ?>
                            
                            <?php for($i = 0; $i < 5 - floor($sum); $i++) { ?>
                                </i><i class="fa fa-star-o"></i>
                            <?php } ?>
                        </p>
                        <a class="specialist3 review-btn mt-3" data-toggle="modal" data-target="#review-form">시공 후기 작성</a>
                        <input type="hidden" id="s_id" name="s_id" value="specialist3">
                    </div>
                </div>
            </div>
            <div class="special-list">
                <div class="rotate">
                   <img class="circle front" src="./images/specialist/specialist4.jpg">
                    <div class="circle back">
                        <p class="mt-5 pt-5">전문가4<br><span>( specialist4 )</span></p>
                        <?php 
                            $sum = 0;
                            $count = 0;
                            foreach($specialist_rating as $key => $rating) {
                                if($rating->specialist_id == "specialist4") {
                                    $sum += $rating->rating;
                                    $count++;
                                }
                            }
                            if($sum != 0)
                                $sum /=$count;
                        ?>
                        <p>
                            <?php for($i = 0; $i < floor($sum); $i++) { ?>
                                </i><i class="fa fa-star"></i>
                            <?php } ?>
                            
                            <?php for($i = 0; $i < 5 - floor($sum); $i++) { ?>
                                </i><i class="fa fa-star-o"></i>
                            <?php } ?>
                        </p>
                        <a class="specialist4 review-btn mt-3" data-toggle="modal" data-target="#review-form">시공 후기 작성</a>
                        <input type="hidden" id="s_id" name="s_id" value="specialist4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="review">
    <div class="review-bar w-31"></div>
    <div id="review-container" class="container pt-4">
        <div class="section-title pt-5 pl-5 ml-5 mt-5">
            <p>R E A L <br>
                R E V I E W</p>
        </div>
        <div class="review-main w-70 mt-5 ml-5 pt-5 pl-5">
            <?php foreach($specialist as $key => $list) { ?>
                <div class="review">
                    <div class="review-left w-50 pt-5 pl-5 float-left">
                        <span><?=$list->user_name?> ( <?=$list->specialist_id?> )</span><br><br>
                        <p><?=$list->user_name?> ( <?=$list->user_id?> )<br>

                            비용    : <?=$list->price?><br><br>
                            
                            <?=$list->content?></p>
                    </div>
                    <div class="review-right w-50 pt-4 pl-4 float-left">
                        <img src="./images/specialist/<?=$list->specialist_id?>.jpg" alt="<?=$list->specialist_id?>" title="<?=$list->specialist_id?>"><br>
                        <?php for($i = 0; $i < $list->rating; $i++) { ?>
                        <i class="fa fa-star"></i>
                        <?php } ?>
                        <?php for($i = 0; $i < 5 - $list->rating; $i++) { ?>
                        <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>