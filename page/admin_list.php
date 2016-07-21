<div class="all_wrap">
	<table class="board">
    	<thead>
        	<tr>
            	<th class="board20">차량사진</th>
            	<th class="board20">차량명</th>
            	<th class="board10">차량색상</th>
            	<th class="board10">사용연료</th>
            	<th class="board20">예약기간(시작~종료)</th>                                                                
                <th class="board10">차량번호</th>
                <th class="board10">아이디</th>
            </tr>
        </thead>
        <tbody>
			<?php
            $res = $db->mq("select * from rent_list order by idx desc ");
            $total = $db->mn($res);
            if($total == 0){
            ?>
                <tr><td class="board100">예약목록이 없습니다.</td></tr>
            <?php
            }
            while($d = $db->mf($res)){
                $data = $db->mfs("select * from obj_list where idx = '".$d['pidx']."'");
            ?>
                <tr>
                    <td class="board20" >
                        <img src="/data/image/objimg/<?php echo $data['image'];?>" alt="<?php echo $d['carnmae'];?>" title="<?php echo $d['carnmae'];?>" <?php echo imgsize("{$_SERVER['DOCUMENT_ROOT']}/data/image/objimg/{$data['image']}",110,110);?>>
                    </td>
                    <td class="board20">
                        <?php echo $d['carname'];?>
                    </td>
                    <td class="board10">
                        <?php echo $d['color'];?>
                    </td>
                    <td class="board10">
                        <?php echo $d['fuel'];?>
                    </td>
                    <td class="board20">
                        <?php echo $d['dStart']."~<br>".$d['dEnd'];?>
                    </td>
                    <td class="board10">
                        <?php echo $d['carnumber'];?>
                    </td>
                    <td class="board10">
                        <?php echo $d['id'];?>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</div>