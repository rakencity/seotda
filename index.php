<?php
include_once('./_common.php');
$g5['title']="섯다 게임";
include_once('./suotda.lib.php');
if ($display_big=="Y")
	include_once(G5_PATH.'/head.sub.php');
else
	include_once(G5_PATH.'/head.php');



		clear_game();
		$sql = " select * from `new_seota_config` ";
		$row = sql_fetch($sql);

		if (!$row)	slot_install();

?>
<link rel="stylesheet" href="./common.min.css">

<script>
<?php if (!$member['mb_id']){?>
		var no_login=true;
	<?php }else{ ?>
			var no_login=false;		
	<?php }?>
var NL_msg="로그인된 회원만 사용가능합니다.";
var NP_msg="보유하신 포인트가 부족합니다.";
var E4_msg="금일 게임하실수 있는 횟수가 초과되었습니다.";
var slot_result="";
var is_auto_game=false;
var is_start=false;
var is_sound=true;
var slot_sound = new Audio('./sound/slot.mp3');
var win_sound = new Audio('./sound/win.mp3');
var lose_sound = new Audio('./sound/lose.mp3');

var MA_point=<?=$row['max_point']?>;
var MI_point=<?=$row['min_point']?>;
var AD_point=<?=$row['add_point']?>;

$(document).ready(function(){

		$("#sound_off").click(function() {	
				is_sound=false;
				$("#sound_on").show();
				$("#sound_off").hide();
		});
		$("#sound_on").click(function() {	
				is_sound=true;
				$("#sound_on").hide();
				$("#sound_off").show();
		});




	$("#bet_up").click(function() {
		if (is_start==true || is_auto_game==true) return;
		if (parseInt($("#batting_value").val()) <MA_point){
				$("#batting_value").val(parseInt($("#batting_value").val())+AD_point);
		}else{
			$("#batting_value").val(MA_point);
		}
	});


	$("#bet_down").click(function() {
		if (is_start==true || is_auto_game==true) return;
		if (parseInt($("#batting_value").val()) <= MI_point){
			$("#batting_value").val(MI_point);
		}else{
				$("#batting_value").val(parseInt($("#batting_value").val())-AD_point);	
		}
	});




	$("#set_game").click(function() {
											$.ajax({
											type: "POST",
											url: "./set_game.php",
											
											cache: false,
											async: false,
											success: function(data) {

										if (data=="NL") {
											
												alert(NL_msg);
												return;
											}else if (data=="NP") {
												
												alert(NP_msg);
												return;
											}else if (data=="E4") {
												
												alert(E4_msg);
												return;
											}else{

												$(".check_p").show();
												$(".seotda_msg").show();
												$(".check_0").hide();
												$(".seotda_msg0").hide();

												$(".pc_seotda_p1 img ,.pc_seotda_p2 img,.my_seotda_p1 img,.my_seotda_p2 img").attr("src","./img/0.jpg");
												$(".seotda_msg").text("패를 클릭하시면 승패를 확인하실 수 있습니다.");
												$(".pc_result").text("");
												$(".my_result").text("");
											}




										}
										});
	});

	$(".check_p").click(function() {
		var p_nm=$(this).data('pa');

			if (  (p_nm=="pc_seotda_p1" || p_nm=="pc_seotda_p2" )   &&  ( $(".my_seotda_p1 img").attr("src") =="./img/0.jpg"   ||  $(".my_seotda_p2 img").attr("src") =="./img/0.jpg" )  ){
				alert("당신의 패를 먼저 오픈해주세요");
				return;
			}

				$.ajax({
					type: "POST",
					url: "./p_check.php",
					data: {
					"p": p_nm

				},
					cache: false,
					async: false,
					success: function(data) {

						$("."+p_nm +" img").attr("src","./img/"+data+".jpg");

					

						if ( $(".pc_seotda_p1 img").attr("src") !="./img/0.jpg"   &&  $(".pc_seotda_p2 img").attr("src") !="./img/0.jpg"  ){
											$.ajax({
											type: "POST",
											url: "./n_check.php",
											data: {
											"n": "pc"

										},
											cache: false,
											async: false,
											success: function(data) {
											$(".pc_result").text(data);
										}
										});
						} else if ( $(".my_seotda_p1 img").attr("src") !="./img/0.jpg"   &&  $(".my_seotda_p2 img").attr("src") !="./img/0.jpg"  ){
											$.ajax({
											type: "POST",
											url: "./n_check.php",
											data: {
											"n": "my"

										},
											cache: false,
											async: false,
											success: function(data) {
											$(".my_result").text(data);
											$(".seotda_msg").text("컴퓨터 패를 오픈하세요.");
										}
										});
						}

						if ( $(".pc_seotda_p1 img").attr("src") !="./img/0.jpg"   &&  $(".pc_seotda_p2 img").attr("src") !="./img/0.jpg"  &&  $(".my_seotda_p1 img").attr("src") !="./img/0.jpg"   &&  $(".my_seotda_p2 img").attr("src") !="./img/0.jpg"  ){
											$.ajax({
											type: "POST",
											url: "./n_check.php",
											data: {
											"n": "result"

										},
											cache: false,
											async: false,
											success: function(data) {
											$(".seotda_msg").text(data);
										}
										});

										$.ajax({
											type: "POST",
											url: "./n_check.php",
											data: {
											"n": "point"

										},
											cache: false,
											async: false,
											success: function(data) {
											$("#myponit").val(data);
										}
										});



						}



				}
				});
	});






});

</script>

<style>
	.seotda_msg0, .seotda_msg{width:100%;text-align:center;padding:30px 0;color:yellow;font-size:20px;font-weight:bold;}
	.seotda_msg,.check_p{display:none;}
	.pc_nm,.pc_result,.my_result{width:100%;text-align:center;height:50px;line-height:50px;color:#FFF;font-size:30px;}
	.my_area p,.com_area p{width:100%;text-align:center;}
</style>

    <!-- Slot machine example -->
    <div id="bumy_casino" style="padding-top:20px;">
	 
      <div class="casino_content"> 

		<h1>섯다게임</h1>
		<div class="com_area">
			<p class="pc_nm">COM</p>
			<p>
				<span class="check_0 "><img src="./img/00.png"></span> <span class="check_0 "><img src="./img/00.png"></span>
				<span class="check_p  pc_seotda_p1"  data-pa="pc_seotda_p1"><img src="./img/0.jpg"></span> <span class="check_p  pc_seotda_p2"  data-pa="pc_seotda_p2"><img src="./img/0.jpg"></span>
			</p>
			<p class="pc_result"></p>
		</div>


		  <div class="seotda_msg0">
				게임을 하시려면 배팅 후 패 받기를 클릭하세요.
				
		  </div>

		  <div class="seotda_msg">
				패를 클릭하시면 승패를 확인하실 수 있습니다
		  </div>
	  
	 	<div class="my_area">
		<p class="my_result"></p>
		<p><span class="check_0 "><img src="./img/00.png"></span> <span class="check_0 "><img src="./img/00.png"></span>
			<span class="check_p  my_seotda_p1" data-pa="my_seotda_p1"><img src="./img/0.jpg"></span> <span class="check_p  my_seotda_p2"  data-pa="my_seotda_p2"><img src="./img/0.jpg"></span>
		</p>
		</div> 
	  
	  </div>
	

		  <div class="point_area">
				<p class="point_area_left"><input type="text" value="<?php echo $member['mb_point']?>" name="myponit"  id="myponit" readonly><br>CREDITS</p>
				<p class="point_area_center"><input type="text" value="<?php echo $row['min_point']?>" name="batting_value"  id="batting_value" readonly><br>BET</p>
				<p class="point_area_right"><input type="text" value="0" name="paid"  id="paid" readonly><br>WINNER PAID</p>		
			
          </div>



		<div class="btn_area">
            <button id="bet_up" type="button" class="">BET UP</button>
            <button id="bet_down" type="button" class="">BET DOWN</button>
            <button id="set_game" type="button" class="">패 받기</button>

			<?php if ($is_admin == 'super') { ?>
				<button id="config" type="button" onClick="location.href='config.php';">게임설정</button>
			<?php }?>

          </div>

		  <div  class="jackpat_info">
				<p class="tit">섯다게임 족보</p>
				<p class="tit2">삼팔광땡</p>
				<p><img src="./img/3.jpg"><img src="./img/8.jpg"></p>
				<p class="tit2">광땡</p>
				<p><img src="./img/3.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/1.jpg"><img src="./img/8.jpg"></p>  
				<p class="tit2">땡</p>
				<p><img src="./img/10.jpg"><img src="./img/20.jpg">&nbsp;&nbsp;<img src="./img/9.jpg"><img src="./img/19.jpg">&nbsp;&nbsp;<img src="./img/8.jpg"><img src="./img/18.jpg">&nbsp;&nbsp;<img src="./img/7.jpg"><img src="./img/17.jpg">&nbsp;&nbsp;<img src="./img/6.jpg"><img src="./img/16.jpg"></p>
				<p><img src="./img/5.jpg"><img src="./img/15.jpg">&nbsp;&nbsp;<img src="./img/4.jpg"><img src="./img/14.jpg">&nbsp;&nbsp;<img src="./img/3.jpg"><img src="./img/13.jpg">&nbsp;&nbsp;<img src="./img/2.jpg"><img src="./img/12.jpg">&nbsp;&nbsp;<img src="./img/1.jpg"><img src="./img/11.jpg"></p>  
				<p class="tit2">알리</p>
				<p><img src="./img/2.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/2.jpg"><img src="./img/11.jpg">&nbsp;&nbsp;<img src="./img/12.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/12.jpg"><img src="./img/11.jpg"></p>  
				<p class="tit2">독사</p>
				<p><img src="./img/4.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/4.jpg"><img src="./img/11.jpg">&nbsp;&nbsp;<img src="./img/14.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/14.jpg"><img src="./img/11.jpg"></p>  

				<p class="tit2">구삥</p>
				<p><img src="./img/9.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/9.jpg"><img src="./img/11.jpg">&nbsp;&nbsp;<img src="./img/19.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/19.jpg"><img src="./img/11.jpg"></p>  
				<p class="tit2">장삥</p>
				<p><img src="./img/10.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/10.jpg"><img src="./img/11.jpg">&nbsp;&nbsp;<img src="./img/20.jpg"><img src="./img/1.jpg">&nbsp;&nbsp;<img src="./img/20.jpg"><img src="./img/11.jpg"></p>  
				<p class="tit2">장삥</p>
				<p><img src="./img/10.jpg"><img src="./img/4.jpg">&nbsp;&nbsp;<img src="./img/10.jpg"><img src="./img/14.jpg">&nbsp;&nbsp;<img src="./img/20.jpg"><img src="./img/4.jpg">&nbsp;&nbsp;<img src="./img/20.jpg"><img src="./img/14.jpg"></p>  
				<p class="tit2">세륙</p>
				<p><img src="./img/6.jpg"><img src="./img/4.jpg">&nbsp;&nbsp;<img src="./img/6.jpg"><img src="./img/14.jpg">&nbsp;&nbsp;<img src="./img/16.jpg"><img src="./img/4.jpg">&nbsp;&nbsp;<img src="./img/16.jpg"><img src="./img/14.jpg"></p>  
		  </div>


      </div>


<?
if ($display_big=="Y")
	include_once(G5_PATH.'/tail.sub.php');
else
	include_once(G5_PATH.'/tail.php');
?>
