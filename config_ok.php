<?php
include_once('./_common.php');

if ($is_admin != 'super') exit;

include_once('./suotda.lib.php');

$sql = "update new_seota_config set 
max_point = '$max_point',
min_point = '$min_point',
day_max = '$day_max',
add_point = '$add_point',
winning_per = '$winning_per'

";


$res = sql_query($sql); 



alert("정상처리 되었습니다.","config.php");
?>
