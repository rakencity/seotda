<?php
include_once('./_common.php');
$g5['title']="섯다겜임 설정";

if ($is_admin != 'super') exit;

include_once(G5_PATH.'/head.php');
include_once('./suotda.lib.php');
		$sql = " select * from new_seota_config ";
		$row = sql_fetch($sql);


?>
<style>
.bumy_board {width:80%;margin-top:20px;}
.bumy_board table {clear:both;width:100%;border-collapse:collapse;border-spacing:0}
.bumy_board table th, td ,.bumy_board th, .item ,.bbsInfo{font-size:12px;letter-spacing:-0.1em}
.bumy_board thead th,.bumy_board th {padding:10px 0;border:1px solid #d1dee2;background:#e5ecef;color:#383838;}
.bumy_board thead input {vertical-align:top} /* middle 로 하면 게시판 읽기에서 목록 사용시 체크박스 라인 깨짐 */
.bumy_board thead a {color:#383838;text-decoration:underline}
.bumy_board tbody th {}
.bumy_board tbody td {padding:10px 5px;line-height:1.4em;word-break:break-all;border:1px solid #d1dee2;}

.bumy_board th {text-align:center;}
.bumy_board td img {width:30px;}
		.abtn {width:30%;height:50px;line-height:50px;margin-top:20px;
				-moz-box-shadow: 0px 1px 0px 0px #fff6af;
				-webkit-box-shadow: 0px 1px 0px 0px #fff6af;
				box-shadow: 0px 1px 0px 0px #fff6af;
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
				background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
				background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
				background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
				background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
				background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
				background-color:#ffec64;
				-moz-border-radius:6px;
				-webkit-border-radius:6px;
				border-radius:6px;
				border:1px solid #ffaa22;
				display:inline-block;
				cursor:pointer;
				color:#333333;
				font-family:Arial;
				font-size:15px;
				font-weight:bold;

				text-decoration:none;
				text-shadow:0px 1px 0px #ffee66;
			}
			.abtn:hover {
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
				background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
				background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
				background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
				background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
				background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
				background-color:#ffab23;
			}
			.abtn:active {
				position:relative;
				top:1px;
			}
</style>



  <form name="wform" action="config_ok.php" method="post"  enctype="multipart/form-data">
<table class="bumy_board">
<tr>
	<th>이길 확율</th><td><input type="text" name="winning_per"   id="winning_per"  value="<?php echo $row['winning_per']?>"> 사용자가 이길 확율</td>	
</tr>
<tr>
	<th>최소배팅</th><td><input type="text" name="min_point"   id="min_point"  value="<?php echo $row['min_point']?>"></td>	
</tr>
<tr>
	<th>최대배팅</th><td><input type="text" name="max_point"   id="max_point"  value="<?php echo $row['max_point']?>"></td>	
</tr>
<tr>
	<th>배팅증감량</th><td><input type="text" name="add_point"   id="add_point"  value="<?php echo $row['add_point']?>"></td>	
</tr>
<tr>
	<th>일일제한횟수</th><td><input type="text" name="day_max"   id="day_max"  value="<?php echo $row['day_max']?>"></td>	
</tr>
</table>




<div style="width:100%;text-align:center;">
	<a href="javascript:#"   onClick="check(document.wform);"  class="abtn">저장</a> 

</div>



</form>

<script>
	function check(f){
		f.submit();
}
</script>


<?php
	include_once(G5_PATH.'/tail.php');
?>
