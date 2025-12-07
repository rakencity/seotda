<?php
include_once('./_common.php');
if ($n=="my") echo get_session("my_seotda_nm");
else if ($n=="point") echo $member["mb_point"];
else if ($n=="result") {



			if (get_session("win_seotda_nm")=="1"){
					$game_table=$point_msg="seotda_game";
					$game_idx=$member['mb_id'].date("YmdHis");
					 insert_point($member['mb_id'], get_session('seotda_batting_value') , $point_msg, $game_table, $game_idx, '승리보수');


				echo "승리하셨습니다.";
			}else{
					echo "패배하셨습니다.";
			}


}
else echo get_session("pc_seotda_nm");