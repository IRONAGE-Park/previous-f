<?  require_once("../include/header.php");
	require_once("./common_head.html");

############ 해당 부분 환경 설정 파일 ######
if($conf) {
	include "./conf/conf_".$conf.".php";
}

	//인젝션
	$title		= escape_string($_REQUEST['title'],1);	

	$content	= escape_string($_REQUEST['content'],1);		
	$fileadd_name = escape_string($_REQUEST['fileadd_name'],1);	
	//$content = addslashes($content);

	$fileadd_name	= $_FILES['fileadd']['name'];		//등록파일명
	$fileadd		= $_FILES['fileadd']['tmp_name'];	//파일임지저장소 
	$fileadd_size	= $_FILES['fileadd']['size'];		//파일크기


	if(!$reg_date) $reg_date = date("Y-m-d H:i:s");
	$ip_addrs = getenv("REMOTE_ADDR");

    switch( $formmode ){        
        case 'save' :  

			if(!$title) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

		########### 저장하기 처리 ##################		

			$query1= "SELECT max(uid) FROM $tablename";
			$row1 =  $db->fetch_row($query1);
				if($row1[0])	$new_uid = $row1[0] + 1; else $new_uid = 1;

			//추가 첨부저장
			for( $i = 0; $i < count($in_file); $i++ )	{
				if( $in_file_size[$i] > 0 )	{					

					$fileadd_name	= $_FILES['in_file']['name'][$i];		//등록파일명
					$fileadd		= $_FILES['in_file']['tmp_name'][$i];	//파일임지저장소 
					$fileadd_size	= $_FILES['in_file']['size'][$i];		//파일크기

					############ 첨부화일 저장 하기 ######################
					list($fileadd_name_1,$fileadd_size,$fileadd_org)=$common->Fileadd($new_uid."_$i","$tablefile", $fileadd, $fileadd_name);
					$file_value .= ( $file_value ) ? "|" . $fileadd_name_1 : $fileadd_name_1;			
				}
			}
			// 첨부저장					
			 
			$tran_query[0] = "INSERT INTO $tablename (uid,title,content,icon1,icon2,icon3,fileadd_name,reg_date) VALUES ('$new_uid','$title','$content','$icon1','$icon2','$icon3','$file_value','$reg_date')";
			
			$tran_result = $db->tran_query( $tran_query );

			if ( $tran_result == "1" ) {
				$common->error("처리 되었습니다.","goto_no_alert","$_SERVER[PHP_SELF]?bmain=list&conf=$conf");
			} else {
				$common->error("등록 실패 되었습니다","previous","");
			}
			
        break;
        case 'modify' :  
		########### 수정 하기 처리 ##################		
			if(!$uid) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}
		
		
			$query= "SELECT fileadd_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
			$row = $db->row( $query );


			if($in_file[0]) {
				$org_count = count(explode("|",$row[fileadd_name]));

				if(!$org_count) $org_count = 0;
				####  추가 첨부저장
				for( $i = 0; $i <= count($in_file); $i++ )	{
					if( $in_file_size[$i] > 0 )	{
						$org_count += 1;
						$fileadd_name	= $_FILES['in_file']['name'][$i];		//등록파일명
						$fileadd		= $_FILES['in_file']['tmp_name'][$i];	//파일임지저장소 
						$fileadd_size	= $_FILES['in_file']['size'][$i];		//파일크기

						############ 첨부화일 저장 하기 ######################
						$add_name=  time().rand(10000,99999).'_'.$i;;

						list($fileadd_name_2,$fileadd_size,$fileadd_org)=$common->Fileadd("$add_name",$tablefile, $fileadd, $fileadd_name);
						$file_value .= ( $file_value ) ? "|" . $fileadd_name_2 : $fileadd_name_2;
					}
				}
				if($row[fileadd_name]) {
					$file_value_1 = $row[fileadd_name]."|".$file_value;
					$file_sql_1 = ",fileadd_name='$file_value_1'";
				} else {
					$file_sql_1 = ",fileadd_name='$file_value'";
				}
			}
			#### END 추가 첨부저장

			#### 추가 첨부삭제
			//echo "삭제표시된파일 : $fdel[0]/$fdel[1]/$fdel[2]<br>";
			if( count($fdel) ) {
				$row_file_arr = explode("|",$row[fileadd_name]);
				for( $i = 0; $i < count($row_file_arr); $i++ ) {					
					if($fdel[$i]!=$row_file_arr[$i]) {
						$file_value_2 .= ( $file_value_2 ) ? "|" . $row_file_arr[$i] : $row_file_arr[$i];
					}
				}
				$file_sql_1 = ",fileadd_name='$file_value_2'";	//디비에 남길파일

				for($f=0;$f<=count($row_file_arr);$f++) {
					if($fdel[$f]==$row_file_arr[$f]) {
						if($fdel[$f]) {
						$saverdir_1 = "$ROOT_PATH/$tablefile/$fdel[$f]";				
						//echo "삭제되는 파일 : $fdel[$i] /  $saverdir_1 <br>";
							######## 이미지 파일들을 삭제 한다 ###################							
							if(file_exists($saverdir_1)) {
								if(!unlink($saverdir_1)) {
									$common->error("파일삭제가 실패 되었습니다","previous","");
								}
							}
						}
					}
				}
			}//end if( count($fdel) ) {			
			#### END 추가 첨부삭제

			$tran_query[0] = "UPDATE $tablename SET title='$title',content='$content',icon1='$icon1',icon2='$icon2',icon3='$icon3',reg_date='$reg_date' $file_sql_1 WHERE uid='$uid'";
			$tran_result = $db->tran_query( $tran_query );

			//echo "<br><Br> $tran_query[0] <br>";

			if ( $tran_result == "1" ) {
				$common->error("수정 되었습니다.  ","goto_no_alert","$_SERVER[PHP_SELF]?bmain=list&conf=$conf");
			} else {
				$common->error("등록 실패 되었습니다","previous","");
			}			

        break;



        case 'delete' :  
		########### 삭제하기 하기 처리 ##################		
			if(!$uid) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

			$query= "SELECT fileadd_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
			$row = $db->row( $query );
				$delimg = "$ROOT_PATH/$tablefile/$row[fileadd_name]";				

			#### 추가 첨부삭제
			$row_file_arr = explode("|",$row[fileadd_name]);
			for( $i = 0; $i < count($row_file_arr); $i++ ) {					
				if($fdel[$i]!=$row_file_arr[$i]) {
					$file_value_2 .= ( $file_value_2 ) ? "|" . $row_file_arr[$i] : $row_file_arr[$i];
				}
			}
			$file_sql_1 = ",fileadd_name='$file_value_2'";	//디비에 남길파일

			for($f=0;$f<=count($row_file_arr);$f++) {
				if($fdel[$f]==$row_file_arr[$f]) {
					if($fdel[$f]) {
					$saverdir_1 = "$ROOT_PATH/$tablefile/$fdel[$f]";				
					//echo "삭제되는 파일 : $fdel[$i] /  $saverdir_1 <br>";
						######## 이미지 파일들을 삭제 한다 ###################							
						if(file_exists($saverdir_1)) {
							if(!unlink($saverdir_1)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				}
			}
			#### END 추가 첨부삭제



			########## 선택한 글을 삭제 한다 ################
			$tran_query[0] = "DELETE FROM  $tablename WHERE uid='$uid'";
			$tran_result = $db->tran_query( $tran_query );

			$common->error("삭제 되었습니다.","goto_no_alert","$_SERVER[PHP_SELF]?bmain=list&conf=$conf");
			

        break;

        case 'delete_all' :  
		########### 선택 삭제하기 하기 처리 ##################		
			if(!$uid) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

			$uid_value = explode(",",$uid);	//선택한 메세지를 배열로 저장 해서 순서대로 지운다		

			while(list($key,$uid) = each($uid_value)) {				

				$query= "SELECT fileadd_name,fileadd1_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
				$row = $db->row( $query );
					$delimg = "$ROOT_PATH/$tablefile/$row[fileadd_name]";				
					$delimg1 = "$ROOT_PATH/$tablefile/$row[fileadd1_name]";


				#### 파일 삭제 체크한 경우 실행 ########
				if($row[fileadd_name]){ 
					######## 이미지 파일들 삭제 한다 ###################
					if(file_exists($delimg)) {
						if(!unlink($delimg)) {
							$common->error("파일삭제가 실패 되었습니다","previous","");
						}
					}
				}

				if($row[fileadd1_name]){ 
					######## 이미지 파일들 삭제 한다 ###################
					if(file_exists($delimg1)) {
						if(!unlink($delimg1)) {
							$common->error("파일삭제가 실패 되었습니다","previous","");
						}
					}
				}

				########## 선택한 글을 삭제 한다 ################
				$tran_query[0] = "DELETE FROM  $tablename WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );

				if($MEMOUSETYPE=="Y") {
					########## 선택한 글을 메모글 삭제 한다 ################
					$tran_query[0] = "DELETE FROM  $memo_tablename WHERE board_num='$uid'";
					$tran_result = $db->tran_query( $tran_query );
				}
			}

			
			$suss_msg = "선택 게시물이 삭제 되었습니다.";	
			
			
        break;


    } //switch end

?>

<?if($formmode=="chviewtype" OR $formmode=="delete_all") {?>
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<!-- 본문컨텐츠부분 시작 -->
	<table width="300" height="150" border="0" cellpadding="0" cellspacing="0">
	  <tr> 
		<td valign="top" bgcolor="#FFFFFF">
		  <table width="300" height="32" border="0" cellpadding="10" cellspacing="0">
			<tr> 
			  <td width="275" height="32" bgcolor="a6c070"><font color="#FFFFFF" class="T8">상태처리 </font></td>
			  <td width="25" bgcolor="a6c070"><a href="javascript:parent.fancyboxClose();parent.location.reload();"><img src="./img/admin_38.gif" border="0"></a></td>
			</tr>
		  </table>
		  <br> <table width="300" border="0" cellpadding="0" cellspacing="0">
			<tr> 
			  <td width="275" height="22"><div align="center"><strong><?=$suss_msg?></strong></div></td>
			</tr>
		  </table>
		  <br> <table width="117" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr> 
			  <td  align="center">
				<a href="javascript:parent.fancyboxClose();parent.location.reload();"><img src="./img/btn_1.gif"  border="0"></a> 
			</tr>
		  </table>
		</td>
	  </tr>
	</table>
	<!-- 본문컨텐츠부분 끝 -->
	</body>
	</html>
	<?
	if($suss_msg) {
		$common->error("$suss_msg","parent_reload","");
	}
	?>
<?}?>
