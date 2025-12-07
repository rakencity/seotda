<?php
include_once('./_common.php');

$game_table=$point_msg="new_slot game";

include_once('./slot.lib.php');

$sql = " select * from new_slot_config ";
$row = sql_fetch($sql);


if (!$member['mb_id'] ) {
	echo "NL";
	exit;
}

if ($batting_value >  $row['max_point']  || $row['min_point'] > $batting_value ){
	$batting_value=10;
}

if ($member['mb_point'] < $batting_value) {
	echo "NP";
	exit;
}



$row2 = sql_fetch("select count(*) cnt from $g5[point_table] where SUBSTRING(po_datetime,1,10) = '".date("Y-m-d")."'   and po_rel_table  = '".$game_table."' and mb_id = '$member[mb_id]'");
if($row2['cnt'] >= $row['day_max']){
	echo "E4"; 
 exit;
}




$game_idx=$member['mb_id'].date("YmdHis");

	 insert_point($member['mb_id'], $batting_value*-1 , $point_msg, $game_table, $game_idx, '차감');




$my_num=MT_RAND("0","10000000");


$top1_point=$row['top1_point'];
$top1_no=10000000*$row['top1_per']/100;


$top2_point=$row['top2_point'];
$top2_no=$top1_no+10000000*$row['top2_per']/100;


$top3_point=$row['top3_point'];
$top3_no=$top2_no+10000000*$row['top3_per']/100;


$top4_point=$row['top4_point'];
$top4_no=$top3_no+10000000*$row['top4_per']/100;

$top5_point=$row['top5_point'];
$top5_no=$top4_no+10000000*$row['top5_per']/100;

$top6_point=$row['top6_point'];
$top6_no=$top5_no+10000000*$row['top6_per']/100;

$top7_point=$row['top7_point'];
$top7_no=$top6_no+10000000*$row['top7_per']/100;

$top8_point=$row['top8_point'];
$top8_no=$top7_no+10000000*$row['top8_per']/100;

$top9_point=$row['top9_point'];
$top9_no=$top8_no+10000000*$row['top9_per']/100;

$top10_point=$row['top10_point'];
$top10_no=$top9_no+10000000*$row['top10_per']/100;

$top11_point=$row['top11_point'];
$top11_no=$top10_no+10000000*$row['top11_per']/100;

$top12_point=$row['top12_point'];
$top12_no=$top11_no+10000000*$row['top12_per']/100;

$top13_point=$row['top13_point'];
$top13_no=$top12_no+10000000*$row['top13_per']/100;

$top14_point=$row['top14_point'];
$top14_no=$top13_no+10000000*$row['top14_per']/100;



if ($my_num<=$top1_no){ 
	insert_point($member['mb_id'], ($batting_value* $top1_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "8,8,8|".my_not_no(8).",".my_not_no(8).",".my_not_no(8)."|1,1,1";
	 echo "|".($batting_value* $top1_point);
}else if ($my_num<=$top2_no){ 
	insert_point($member['mb_id'], ($batting_value* $top2_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "7,7,7|".my_not_no(7).",".my_not_no(7).",".my_not_no(7)."|1,1,1";
	 echo "|".($batting_value* $top2_point);
}else if ($my_num<=$top3_no){ 
		insert_point($member['mb_id'], ($batting_value* $top3_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "6,6,6|".my_not_no(6).",".my_not_no(6).",".my_not_no(6)."|1,1,1";
	 echo "|".($batting_value* $top3_point);
}else if ($my_num<=$top4_no){ 
	insert_point($member['mb_id'], ($batting_value* $top4_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "5,5,5|".my_not_no(5).",".my_not_no(5).",".my_not_no(5)."|1,1,1";
	 echo "|".($batting_value* $top4_point);
}else if ($my_num<=$top5_no){ 
	insert_point($member['mb_id'], ($batting_value* $top5_point), $point_msg, $game_table, $game_idx, '승리');	
	echo jabbar();
	 echo "|".($batting_value* $top5_point);
}else if ($my_num<=$top6_no){ 
	insert_point($member['mb_id'], ($batting_value* $top6_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "4,4,4|".my_not_no(4).",".my_not_no(4).",".my_not_no(4)."|1,1,1";
	 echo "|".($batting_value* $top6_point);
}else if ($my_num<=$top7_no){ 
	insert_point($member['mb_id'], ($batting_value* $top7_point), $point_msg, $game_table, $game_idx, '승리');	
	 echo two_eq(4);
	  echo "|".($batting_value* $top7_point);
}else if ($my_num<=$top8_no){ 
	insert_point($member['mb_id'], ($batting_value* $top8_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "3,3,3|".my_not_no(3).",".my_not_no(3).",".my_not_no(3)."|1,1,1";
	 echo "|".($batting_value* $top8_point);
}else if ($my_num<=$top9_no){ 
		insert_point($member['mb_id'], ($batting_value* $top9_point), $point_msg, $game_table, $game_idx, '승리');	
	 echo two_eq(3);
	  echo "|".($batting_value* $top9_point);

}else if ($my_num<=$top10_no){ 
		insert_point($member['mb_id'], ($batting_value* $top10_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "2,2,2|".my_not_no(2).",".my_not_no(2).",".my_not_no(2)."|1,1,1";
	 echo "|".($batting_value* $top10_point);

}else if ($my_num<=$top11_no){ 
			insert_point($member['mb_id'], ($batting_value* $top11_point), $point_msg, $game_table, $game_idx, '승리');	
	 echo two_eq(2);
	  echo "|".($batting_value* $top11_point);

}else if ($my_num<=$top12_no){ 
			insert_point($member['mb_id'], ($batting_value* $top12_point), $point_msg, $game_table, $game_idx, '승리');	
	echo "1,1,1|".my_not_no(1).",".my_not_no(1).",".my_not_no(1)."|1,1,1";
	 echo "|".($batting_value* $top12_point);

}else if ($my_num<=$top13_no){ 
	insert_point($member['mb_id'], ($batting_value* $top13_point), $point_msg, $game_table, $game_idx, '승리');	
	 echo two_eq(1);
	  echo "|".($batting_value* $top13_point);
}else if ($my_num<=$top14_no){ 
	insert_point($member['mb_id'], ($batting_value* $top14_point), $point_msg, $game_table, $game_idx, '승리');	
 echo all_rand_one1();
 echo "|".($batting_value* $top14_point);
}else{
	echo all_rand();
	echo "|0";
}
