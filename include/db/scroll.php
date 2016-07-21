<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

?>
<?php
$limit = isset($_POST['obj']) != "" && $_POST['obj'] != 0 ? "limit 5,{$_POST['obj']}" : "limit {$_POST['num']},5";
$res = $db->mq("select * from obj_list where carname like '%".$_POST['key']."%'  order by idx asc  ".$limit);
while($d = $db->mf($res)){
?>
	<tr>
		<td class="board20">
			<img src="/data/image/objimg/<?php echo $d['image'];?>" alt="<?php echo $d['carnmae'];?>" title="<?php echo $d['carname'];?>" <?php echo imgsize("{$_SERVER['DOCUMENT_ROOT']}/data/image/objimg/{$d['image']}",110,110);?>>
		</td>
		<td class="board20">
			<?php echo rep($d['carname'],$_POST['key']);?>
		</td>
		<td class="board20">
			<?php echo $d['color'];?>
		</td>
		<td class="board20">
			<?php echo $d['fuel'];?>
		</td>
		<td class="board20">
			<?php echo $d['carnumber'];?>
		</td>
	</tr>
<?php
}
?>

