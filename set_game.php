<?php
include_once('./_common.php');

$game_table=$point_msg="seotda_game";

$sql = " select * from `new_seota_config` ";
$row = sql_fetch($sql);

$win_per=$row["winning_per"];

include_once('./suotda.lib.php');



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

set_session('seotda_batting_value', $batting_value);
game_set();

echo "OK";
