<? require_once("../include/header.php");
######### 상단 메뉴 ############
include ('common_top.html');
exit;
############## 공지사항 ################
/*

		$query1 = "SELECT * FROM ASADAL_BOARD_ENH_copy WHERE 1  ORDER BY board_no ASC";
		$result1 = $db->fetch_array( $query1 );
		$rcount1 = count($result1) ;		 

		$s=0;
		for ( $i=0 ; $i<$rcount1 ; $i++ ) {

			$query1= "SELECT max(uid), max(fidnum) FROM tb_board";
			$row1 =  $db->fetch_row($query1);
			if($row1[0])	$new_uid = $row1[0] + 1; else $new_uid = 1;
			if($row1[1]) $new_fidnum = $row1[1] + 1; else $new_fidnum = 1;
		


			$my_contents = stripslashes($result1[$i][contents]);
			$my_subject = stripslashes($result1[$i][subject]);

			$my_contents = addslashes($my_contents);
			$my_subject = addslashes($my_subject);

			if($result1[$i][userHtml]=="2") {
				$my_html = "Y";
			} else {
				$my_html = "N";
			}

			$my_uid = $result1[$i][board_no];
			$my_writer = $result1[$i][writer];
			$my_member_num = $result1[$i][member_num];
			$my_email = $result1[$i][email];
			$my_count  = $result1[$i][count];
			$my_fmlid1  = $result1[$i][fmlid1];
			$my_parent1 = $result1[$i][parent1];
			$my_date	= $result1[$i][date];

			######### 회원 정보를 DB에 넣는다 ##############			
			$tran_query[0] = "INSERT INTO tb_board (uid,mid,title,mode,viewtype,pass,uname,uemail,content,content1,topview,ref,fidnum,thread,tegtype,fileadd_name,fileadd_org,fileadd1_name,fileadd1_org,keytype,reply_date,reg_date) VALUES ('$my_uid','$my_member_num','$my_subject','','Y','mk1234','$my_writer','$my_email','$my_contents','','','$my_count','$my_fmlid1','$my_parent1','$my_html','$my_fileadd_name','$my_fileadd_org','$my_fileadd1_name','$my_fileadd1_org','$my_keytype','$my_reply_date','$my_date')";

			echo "$member_into <br><br>";
			$tran_result = $db->tran_query( $tran_query );
			
		$s++;
		
		}

	echo "<br><br>총 $s 개의 데이터 삽입 <br>";

*/
?>			
