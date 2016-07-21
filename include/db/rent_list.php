<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

$res = $db->mq("select * from rent_list where id = '".$_POST['id']."' order by idx desc");
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
			<button class="bt2" data-idx="<?php echo $d['idx'];?>" onClick="return rentDel(<?php echo $d['idx'];?>)">반납</button>
		</td>
	</tr>
<?php
}
?>
