<form id="view-form" method="post" class="modal fade" name="view">
    <div class="modal-dialog">
        <div class="modal-content h-100">
            <div class="modal-body d-flex flex-column">
                <div class="form-header-text pt-4">
                    견적 확인
                </div>
                <div class="form-group">
                    <p>전문가 이름 : </p><br>
                    <p>전문가 이름 : </p><br>
                    <p>전문가 이름 : </p><br>
                </div>
                <div class="form-group">    
                    <a id="build-form-btn" class="modal-btn">선택</a>
                </div>
                <input name="num" type="text" hidden>
            </div>
        </div>
    </div>
</form>

<section id="build" class="pb-5">
    <div class="build-bar w-40"></div>
    <div id="build-container" class="container h-100 pt-4">
        <div class="section-title pt-5 pl-5 mt-5 ml-5">
            <p>E S T I M A T E<br> 
            C O N S T R U C T I O N</p> 
        </div>
        <ul class="build-main d-flex flex-column">
            <div class="build-list d-flex flex-column">
                <a class="build-request-btn w-10" data-toggle="modal" data-target="#request">견적 요청</a>
                <p>견적 요청 리스트</p>
                <table class="request-list mt-3">
                    <thead>
                        <tr>
                            <td>이름(아이디)</td>
                            <td>시공일</td>
                            <td>내용</td>
                            <td>상태</td>
                            <td>견적 개수</td>
                            <td>견적 버튼</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($requests as $key => $request) { ?>
                        <tr class="<?=$request->id?>">
                            <td><?=$request->user_id?>(<?=$request->user_name?>)</td>
                            <td><?=$request->date?></td>
                            <td><?=$request->content?></td>
                            <td><?php if($request->state == 0) echo '진행 중'; else echo '완료'; ?></td>
                            <td><?=$request->volume?></td>
                            <td>
                                <?php if($request->user_id == $_SESSION['user']->user_id) echo '<button id="view-build" data-toggle="modal" data-target="#view-form">견적 보기</button>'; else echo '<button id="send-build" data-toggle="modal" data-target="#build-form" >견적 보내기</button>'; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <p class="pt-5">보낸 견적 리스트</p>
                <table class="request-list mt-3">
                    <thead>
                        <tr>
                            <td>이름(아이디)</td>
                            <td>시공일</td>
                            <td>내용</td>
                            <td>상태</td>
                            <td>견적 개수</td>
                            <td>견적 버튼</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sends as $key => $send) { ?>
                            <?php if($send->sender_id == $_SESSION['user']->user_id) {?>
                        <tr class="<?=$send->id?>">
                            <td><?=$send->user_id?>(<?=$send->user_name?>)</td>
                            <td><?=$send->date?></td>
                            <td><?=$send->content?></td>
                            <td><?php if($send->state == 0) echo '진행 중'; else echo '완료'; ?></td>
                            <td><?=$send->volume?></td>
                            <td>
                                <?php if($send->user_id == $_SESSION['user']->user_id) echo '<button id="view-build">견적 보기</button>'; else echo '<button id="send-build" data-toggle="modal" data-target="#build-form" >견적 보내기</button>'; ?>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </ul>
    </div>
</section>