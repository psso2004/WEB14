<?php
include "include/php/db.php";
include "include/php/lib.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>드림렌터카 홈페이지</title>
<script src="include/js/jquery-1.11.1.js"></script>
<script src="include/js/jquery-ui-1.10.4.custom.js"></script>
<script src="include/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="include/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="include/css/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" type="text/css" href="include/css/common.css">
<link rel="stylesheet" type="text/css" href="include/css/print.css" media="print">
</head>

<body>
<div class="all_wrap">
	<div class="wrap">
    	<div class="wrap2">
			<!--헤더영역-->
        	<header id="header">
            	<!--로고-->
            	<h1 id="logo">
                	<a href="/">
                    	<img src="/data/image/logo.png" alt="로고" title="로고">
                    </a>
                </h1>
                <div id="glbNav">
                <?php
				if(!$_SESSION['id']){
				?>
                	<a href="javascript:void(0)" id="login_d">로그인</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="javascript:void(0)" id="join_d">회원가입</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <?php
				}else{
				?>
                	<?php echo $_SESSION['id']."님";?>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="/include/db/logout.php" >로그아웃</a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<?php
					if($_SESSION['id'] == 'admin'){
					?>
                    	<a href="/page/sub.php/14/14/admin">관리자페이지</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <?php
					}
					?>
                <?php
				}
				?>
					글자크기
                    <img src="/data/image/ft3.png" alt="폰트사이즈조절 버튼" title="폰트사이즈조절버튼" onClick="return fsize(+1,'true')">
                    <img src="/data/image/ft2.png" alt="폰트사이즈조절 버튼" title="폰트사이즈조절버튼" onClick="return fsize(2,'false')">
                    <img src="/data/image/ft1.png" alt="폰트사이즈조절 버튼" title="폰트사이즈조절버튼" onClick="return fsize(-1,'true')">

                </div>
                
                <!--네비게이션영역-->
                <nav id="menu">
                	<ul>
                    <?php
					$res = $db->mq("select * from menu limit 4 ");
					while($d = $db->mf($res)){
						$s = $db->mfs("select * from menu where parent = '".$d['idx']."'");
						$url = "/page/sub.php/{$s['parent']}/{$s['idx']}/{$s['action']}";
					?>
                    	<li data-idx="<?php echo $d['idx'];?>">
                        	<a href="<?php echo $url;?>"><?php echo $d['title'];?></a>
                            <ul>
                            <?php
							$res_sub = $db->mq("select * from menu where parent = '".$d['idx']."'");
							while($sub = $db->mf($res_sub)){
								$surl = "/page/sub.php/{$sub['parent']}/{$sub['idx']}/{$sub['action']}";
							?>
                            	<li>
                                	<a href="<?php echo $surl;?>"><?php echo $sub['title'];?></a>
                                </li>
                            <?php
							}
							?>
                            </ul>
                        </li>
					<?php
					}
					?>
                    </ul>
                </nav>
                
            </header>
