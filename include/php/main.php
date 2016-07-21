            <!--슬라이드버튼,영역-->
            <div id="slideArea">
            	<div id="mainText">
                	<ul>
                    	<li>
                        	<img src="/data/image/maintext.png" alt="비주얼텍스트" title="비주얼텍스트">
                        </li>
                    </ul>
                </div>
                <div id="loginForm">
                <?php
				if($_POST['action'] == 'login'){
					$_POST['pw'] = md5($_POST['pw']);
					include "{$_SERVER['DOCUMENT_ROOT']}/include/db/login_ok.php";
				}
				if(!$_SESSION['id']){
				?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <fieldset>
                	<input type="hidden" name="action" value="login">
                	<input type="text" name="id" required placeholder="아이디">
                	<input type="password" name="pw" required placeholder="비밀번호">
					<button class="bt2">로그인</button>
                </fieldset>
                </form>
                <?php
				}else{
					echo $_SESSION['id']."님";
				?>
                	<button class="bt2" onClick="location.href='/include/db/logout.php'">로그아웃</button>
                <?php
				}
				?>
                </div>
            </div>
            <!--콘텐츠영역-->
            <div id="columnWrap">
            	<div id="column1">
					<ul>
                    	<li>
                        	<figure>
                            	<img src="/data/image/carimg/1.jpg" alt="차이미지" title="차이미지">
                                <figcaption>
                                	<h4>
                                    	제네시스
                                    </h4>
                                    <span>
									G330 모던 기본사양 외                                    
                                    </span>
                                    <img src="/data/image/view.png" alt="뷰"  title="뷰" onClick="location.href='/page/sub.php/2/8/carguide'">
                                </figcaption>
                            </figure>
                        </li>
                    	<li>
                        	<figure>
                            	<img src="/data/image/carimg/2.jpg" alt="차이미지" title="차이미지">
                                <figcaption>
                                	<h4>
                                    	에쿠스
                                    </h4>
                                    <span>
									VS 380 익스클루시브 기본 및
                                    </span>
                                    <img src="/data/image/view.png" alt="뷰"  title="뷰" onClick="location.href='/page/sub.php/2/8/carguide'">
                                </figcaption>
                            </figure>
                        </li>
                    	<li>
                        	<figure>
                            	<img src="/data/image/carimg/3.jpg" alt="차이미지" title="차이미지">
                                <figcaption>
                                	<h4>
                                    	소나타
                                    </h4>
                                    <span>
									Smart 기본 품목 및
                                    </span>
                                    <img src="/data/image/view.png" alt="뷰"  title="뷰" onClick="location.href='/page/sub.php/2/8/carguide'">
                                </figcaption>
                            </figure>
                        </li>
                    	<li>
                        	<figure>
                            	<img src="/data/image/carimg/4.jpg" alt="차이미지" title="차이미지">
                                <figcaption>
                                	<h4>
                                    	산타페
                                    </h4>
                                    <span>
									디젤e-VGT R2.0 2WD Exclusive 및
                                    </span>
                                    <img src="/data/image/view.png" alt="뷰"  title="뷰" onClick="location.href='/page/sub.php/2/8/carguide'">
                                </figcaption>
                            </figure>
                        </li>

                    </ul>
                </div>
                
                <!--컬럼2-->
                <div id="column2">
                	<h4>새소식</h4>
                    <div class="more">
                    	<a href="/page/sub.php/13/13/gongsa">
                    	<img src="/data/image/more.png" alt="더보기" title="더보기">
                        </a>
                    </div>
                    <ul>
                    	<li>
                        	<a href="/page/sub.php/13/13/gongsa">드림렌터카 10월의 이벤트</a>
                            <img src="/data/image/new.png" alt="new" title="new">
                        </li>
                    	<li>
                        	<a href="/page/sub.php/13/13/gongsa">드림렌터카 11월의 이벤트</a>
                        </li>
                    	<li>
                        	<a href="/page/sub.php/13/13/gongsa">드림렌터카 12월의 이벤트</a>
                        </li>
                    </ul>
                </div>
                <!--컬럼3-->
                <div id="column3">
                	<h4>
                    	온라인예약
                    </h4>
                    <div class="more">
                    	<a href="/page/sub.php/3/9/apply">
						<img src="/data/image/more.png" alt="더보기" title="더보기">
                        </a>
                    </div>
                    <p>
                    	편리하게<br>
                        예약을<br>
                        할 수 있습니다.
                    </p>
                </div>
                <div id="column4">
                	<h4>
                    	이용안내
                    </h4>
                    <div class="more">
                    	<a href="/page/sub.php/12/12/gongsa">
                    	<img src="/data/image/more.png" alt="더보기" title="더보기">
                        </a>
                    </div>
                    <ul>
                    	<li onClick="location.href='/page/sub.php/1/5/intro'">
                        	<figure>
                            	<img src="/data/image/icon1.png" alt="아이콘" title="아이콘">
                                <figcaption>
                                회사소개
                                </figcaption>
                            </figure>
                        </li>
                    	<li onClick="location.href='/page/sub.php/2/8/carguide'">
                        	<figure>
                            	<img src="/data/image/icon2.png" alt="아이콘" title="아이콘">
                                <figcaption>
                                차량안내
                                </figcaption>
                            </figure>
                        </li>
                    	<li onClick="location.href='/page/sub.php/3/9/apply'">
                        	<figure>
                            	<img src="/data/image/icon3.png" alt="아이콘" title="아이콘">
                                <figcaption>
                                예약하기
                                </figcaption>
                            </figure>
                        </li>
                    	<li onClick="location.href='/page/sub.php/4/11/search'">
                        	<figure>
                            	<img src="/data/image/icon4.png" alt="아이콘" title="아이콘">
                                <figcaption>
                                차량검색
                                </figcaption>
                            </figure>
                        </li>
                    	<li onClick="location.href='/page/sub.php/1/6/map'">
                        	<figure>
                            	<img src="/data/image/icon5.png" alt="아이콘" title="아이콘">
                                <figcaption>
                                오시는길
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
                
            </div>
            
            
        </div>
    	<div id="slideBt">
        <?php
		$stotal = $db->mns("select * from slide where chk = 'true'");
		if($stotal >= 3){
		?>
        	<div class="btWrap"> 
            	<div id="prev" onClick="return nextBt(-1)">
        		<img src="/data/image/prev.png" alt="이전" title="이전">
                </div>
            	<div id="next" onClick="return nextBt(+1)">
        		<img src="/data/image/next.png" alt="다음" title="다음">
                </div>

                <ul>
                <?php
				$cnt = 0;
				$res_b = $db->mq("select * from slide where chk = 'true'");
				while($b = $db->mf($res_b)){
				?>
                    <li onClick="return slideBt(<?php echo $cnt;?>)"></li>
				<?php
				$cnt++;
				}
				?>
                </ul>

            </div>
		<?php
		}
		?>
        </div>

    </div>
    <!--비주얼,슬라이드영역-->
    <div id="visual">
    <?php
	if($stotal >= 3){
	?>
        <ul>
        <?php
		$res = $db->mq("select * from slide where chk = 'true'");
		while($d = $db->mf($res)){
		?>
            <li>
                <img src="/data/uploade_file/<?php echo $d['image'];?>" alt="비주얼이미지" title="비주얼이미지" width="2000" height="513">
            </li>
        <?php
		}
		?>
        </ul>
	<?php
	}
	?>
    </div>
    
</div>