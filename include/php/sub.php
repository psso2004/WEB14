            <!--슬라이드버튼,영역-->
            <div id="subslideArea">
            	<div id="subText">
					즐겁고 편안한 여행을<br>
                    드림렌터카와 즐기세요.                    
                </div>
            </div>
            
            <div id="subPage">
            <?php
			$pSub = $db->mfs("select * from menu where idx = '".$parent."'");
			$sub = $db->mfs("select * from menu where idx = '".$idx."'");
			$ps = $db->mfs("select * from menu where parent = '".$pSub['idx']."'");
			$purl = "/page/sub.php/{$ps['parent']}/{$ps['idx']}/{$ps['action']}";
			$url = "/page/sub.php/{$sub['parent']}/{$sub['idx']}/{$sub['action']}";
			?>
            	<aside id="subSide">
                	<h2 id="sideTitle">
                    <?php
						echo $pSub['title'];
					?>
                    </h2>
                    <ul>
                    <?php
					$res_side = $db->mq("select * from menu where parent = '".$pSub['idx']."'");
					while($side = $db->mf($res_side)){
						$surl = "/page/sub.php/{$side['parent']}/{$side['idx']}/{$side['action']}";
						$class = $side['idx'] == $idx ? "shv" : "";
					?>
                    	<li class="<?php echo $class;?>">
                        	<a href="<?php echo $surl;?>"><?php echo $side['title'];?></a>
                        </li>
					<?php
					}
					?>
                    </ul>
                    
                </aside>
                <div id="subContent">
					<nav id="subNav">
                    	<img src="/data/image/homeicon.png"	 alt="홈" title="홈">
                        <a href="/">홈</a>&nbsp;&gt;&nbsp;<a href="<?php echo $purl;?>"><?php echo $pSub['title'];?></a>&nbsp;&gt;<a href="<?php echo $url;?>"><?php echo $sub['title'];?></a>
                    </nav>
                	<h2 id="subTitle">
                    <?php
						echo $sub['title'];
					?>
                    </h2>
                    <div class="all_wrap">
                    <?php
						include "{$_SERVER['DOCUMENT_ROOT']}/page/{$action}.php";
					?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--비주얼,슬라이드영역-->
    <div id="subvisual">
        <ul>
            <li>
                <img src="/data/image/subvisual1.png" alt="비주얼이미지" title="비주얼이미지">
            </li>
        </ul>
    </div>
    
</div>