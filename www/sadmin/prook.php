<?  require_once("../include/header.php");
	require_once("./common_head.html");

############ 해당 부분 환경 설정 파일 ######
if($conf) {
	include "./conf/conf_".$conf.".php";
}


	//인젝션
	$tcode		= escape_string($_REQUEST['tcode'],1);	
	$title		= escape_string($_REQUEST['title'],1);	
	$mode		= escape_string($_REQUEST['mode'],1);	
	$viewtype	= escape_string($_REQUEST['viewtype'],1);	
	$uname		= escape_string($_REQUEST['uname'],1);	
	$uemail		= escape_string($_REQUEST['uemail'],1);	
	$content	= escape_string($_REQUEST['content'],1);		
	$topview	= escape_string($_REQUEST['topview'],1);	
	$ref		= escape_string($_REQUEST['ref'],1);	
	$keytype	= escape_string($_REQUEST['keytype'],1);	
	$fileadd_name = escape_string($_REQUEST['fileadd_name'],1);	
	$fileadd1_name = escape_string($_REQUEST['fileadd1_name'],1);	
	//$content = addslashes($content);

	$fileadd_name	= $_FILES['fileadd']['name'];		//등록파일명
	$fileadd		= $_FILES['fileadd']['tmp_name'];	//파일임지저장소 
	$fileadd_size	= $_FILES['fileadd']['size'];		//파일크기

	$fileadd1_name	= $_FILES['fileadd1']['name'];		//등록파일명
	$fileadd1		= $_FILES['fileadd1']['tmp_name'];	//파일임지저장소 
	$fileadd1_size	= $_FILES['fileadd1']['size'];		//파일크기

	$fileadd2_name	= $_FILES['fileadd2']['name'];		//등록파일명
	$fileadd2		= $_FILES['fileadd2']['tmp_name'];	//파일임지저장소 
	$fileadd2_size	= $_FILES['fileadd2']['size'];		//파일크기

	$fileadd3_name	= $_FILES['fileadd3']['name'];		//등록파일명
	$fileadd3		= $_FILES['fileadd3']['tmp_name'];	//파일임지저장소 
	$fileadd3_size	= $_FILES['fileadd3']['size'];		//파일크기

	$fileadd4_name	= $_FILES['fileadd4']['name'];		//등록파일명
	$fileadd4		= $_FILES['fileadd4']['tmp_name'];	//파일임지저장소 
	$fileadd4_size	= $_FILES['fileadd4']['size'];		//파일크기

	if(!$reg_date) $reg_date = date("Y-m-d H:i:s");
	$ip_addrs = getenv("REMOTE_ADDR");

	if(!$topview) $topview="N";
	if(!$keytype) $keytype="N";
	if(!$datetype) $datetype="N";
	if($edate)	  $datetype="Y";

    switch( $formmode ){        
        case 'save' :  

			if(!$title) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

		########### 저장하기 처리 ##################		

			$query1= "SELECT max(uid) FROM $tablename";
			$row1 =  $db->fetch_row($query1);
				if($row1[0])	$new_uid = $row1[0] + 1; else $new_uid = 1;

			list($fileadd_name_1,$fileadd_size,$fileadd_org)=$common->Fileadd($new_uid,$tablefile, $fileadd, $fileadd_name);
			list($fileadd_name_2,$fileadd1_size,$fileadd1_org)=$common->Fileadd($new_uid."_1", $tablefile, $fileadd1, $fileadd1_name);
			list($fileadd_name_3,$fileadd2_size,$fileadd2_org)=$common->Fileadd($new_uid."_2", $tablefile, $fileadd2, $fileadd2_name);
			list($fileadd_name_4,$fileadd3_size,$fileadd3_org)=$common->Fileadd($new_uid."_3", $tablefile, $fileadd3, $fileadd3_name);
			list($fileadd_name_5,$fileadd4_size,$fileadd4_org)=$common->Fileadd($new_uid."_4", $tablefile, $fileadd4, $fileadd4_name);
			
		
			 
			$tran_query[0] = "INSERT INTO $tablename (uid,mid,title,title1,title2,title3,title4,title5,mode,viewtype,uname,content,ref,fileadd_name,fileadd_org,fileadd1_name,fileadd1_org,reg_date,fileadd2_name,fileadd2_org,fileadd3_name,fileadd3_org,fileadd4_name,fileadd4_org) VALUES ('$new_uid','$SITE_ADMIN_MID','$title','$title1','$title2','$title3','$title4','$title5','$mode','$viewtype','$uname','$content','$ref','$fileadd_name_1','$fileadd_org','$fileadd_name_2','$fileadd1_org','$reg_date','$fileadd_name_3','$fileadd2_org','$fileadd_name_4','$fileadd3_org','$fileadd_name_5','$fileadd4_org')";

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
		

			$query= "SELECT fileadd_name,fileadd1_name,fileadd2_name,fileadd3_name,fileadd4_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
			$row = $db->row( $query );
				$delimg = "$ROOT_PATH/$tablefile/$row[fileadd_name]";				
				$delimg1 = "$ROOT_PATH/$tablefile/$row[fileadd1_name]";
				$delimg2 = "$ROOT_PATH/$tablefile/$row[fileadd2_name]";
				$delimg3 = "$ROOT_PATH/$tablefile/$row[fileadd3_name]";
				$delimg4 = "$ROOT_PATH/$tablefile/$row[fileadd4_name]";

			####  파일을 다시 등록 했으면 저장한다. ####
			if ($fileadd != ""){	
				############ 첨부화일 저장 하기 ######################
				list($fileadd_name_1,$fileadd_size,$fileadd_org)=$common->Fileadd($uid,$tablefile, $fileadd, $fileadd_name);
				$file_sql = ",fileadd_name='$fileadd_name_1',fileadd_org='$fileadd_org'";
			} else {
				$file_sql = "";
			} 
			if ($fileadd1 != ""){	
				############ 첨부화일 저장 하기 ######################
				list($fileadd_name_2,$fileadd1_size,$fileadd1_org)=$common->Fileadd($uid."_1",$tablefile, $fileadd1, $fileadd1_name);
				$file_sql_1 = ",fileadd1_name='$fileadd_name_2',fileadd1_org='$fileadd1_org'";
			} else {
				$file_sql_1 = "";
			} 

			if ($fileadd2 != ""){	
				############ 첨부화일 저장 하기 ######################
				list($fileadd_name_3,$fileadd2_size,$fileadd2_org)=$common->Fileadd($uid."_2",$tablefile, $fileadd2, $fileadd2_name);
				$file_sql_2 = ",fileadd2_name='$fileadd_name_3',fileadd2_org='$fileadd2_org'";
			} else {
				$file_sql_2 = "";
			} 

			if ($fileadd3 != ""){	
				############ 첨부화일 저장 하기 ######################
				list($fileadd_name_4,$fileadd3_size,$fileadd3_org)=$common->Fileadd($uid."_3",$tablefile, $fileadd3, $fileadd3_name);
				$file_sql_3 = ",fileadd3_name='$fileadd_name_4',fileadd3_org='$fileadd3_org'";
			} else {
				$file_sql_3 = "";
			} 

			if ($fileadd4 != ""){	
				############ 첨부화일 저장 하기 ######################
				list($fileadd_name_5,$fileadd4_size,$fileadd4_org)=$common->Fileadd($uid."_4",$tablefile, $fileadd4, $fileadd4_name);
				$file_sql_4 = ",fileadd4_name='$fileadd_name_5',fileadd4_org='$fileadd4_org'";
			} else {
				$file_sql_4 = "";
			} 
			#### 파일 삭제 체크한 경우 실행 ########
			if($delimg_1=="Y") {				
					######## 이미지 파일들을 삭제 한다 ###################
					if($row[fileadd_name]){ 
						######## 이미지 파일들 삭제 한다 ###################
						if(file_exists($delimg)) {
							if(!unlink($delimg)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				$tran_query[0] = "UPDATE $tablename SET  fileadd_name='',fileadd_org='' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			} 
			if($delimg_2=="Y") {				
					######## 이미지 파일들을 삭제 한다 ###################
					if($row[fileadd1_name]){ 
						######## 이미지 파일들 삭제 한다 ###################
						if(file_exists($delimg1)) {
							if(!unlink($delimg1)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				$tran_query[0] = "UPDATE $tablename SET  fileadd1_name='',fileadd1_org='' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			} 
			if($delimg_3=="Y") {				
					######## 이미지 파일들을 삭제 한다 ###################
					if($row[fileadd2_name]){ 
						######## 이미지 파일들 삭제 한다 ###################
						if(file_exists($delimg2)) {
							if(!unlink($delimg2)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				$tran_query[0] = "UPDATE $tablename SET  fileadd2_name='',fileadd2_org='' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			} 

			if($delimg_4=="Y") {				
					######## 이미지 파일들을 삭제 한다 ###################
					if($row[fileadd3_name]){ 
						######## 이미지 파일들 삭제 한다 ###################
						if(file_exists($delimg3)) {
							if(!unlink($delimg3)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				$tran_query[0] = "UPDATE $tablename SET  fileadd3_name='',fileadd3_org='' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			} 

			if($delimg_5=="Y") {				
					######## 이미지 파일들을 삭제 한다 ###################
					if($row[fileadd4_name]){ 
						######## 이미지 파일들 삭제 한다 ###################
						if(file_exists($delimg4)) {
							if(!unlink($delimg4)) {
								$common->error("파일삭제가 실패 되었습니다","previous","");
							}
						}
					}
				$tran_query[0] = "UPDATE $tablename SET  fileadd4_name='',fileadd4_org='' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			} 


			if($CONTENT2TYPE=="Y") {
				$content_slq = ",content1='$content1'";
			}


			$tran_query[0] = "UPDATE $tablename SET mid='$SITE_ADMIN_MID',title='$title',title1='$title1',title2='$title2',title3='$title3',title4='$title4',title5='$title5',mode='$mode',viewtype='$viewtype',uname='$uname',content='$content',ref='$ref',reg_date='$reg_date' $file_sql $file_sql_1 $file_sql_2 $file_sql_3 $file_sql_4 $content_slq WHERE uid='$uid'";
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

			$query= "SELECT  fileadd_name,fileadd1_name,fileadd2_name,fileadd3_name,fileadd4_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
			$row = $db->row( $query );
				$delimg = "$ROOT_PATH/$tablefile/$row[fileadd_name]";				
				$delimg1 = "$ROOT_PATH/$tablefile/$row[fileadd1_name]";
				$delimg2 = "$ROOT_PATH/$tablefile/$row[fileadd2_name]";
				$delimg3 = "$ROOT_PATH/$tablefile/$row[fileadd3_name]";
				$delimg4 = "$ROOT_PATH/$tablefile/$row[fileadd4_name]";

			

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

			if($row[fileadd2_name]){ 
				######## 이미지 파일들 삭제 한다 ###################
				if(file_exists($delimg2)) {
					if(!unlink($delimg2)) {
						$common->error("파일삭제가 실패 되었습니다","previous","");
					}
				}
			}

			if($row[fileadd3_name]){ 
				######## 이미지 파일들 삭제 한다 ###################
				if(file_exists($delimg3)) {
					if(!unlink($delimg3)) {
						$common->error("파일삭제가 실패 되었습니다","previous","");
					}
				}
			}
			if($row[fileadd4_name]){ 
				######## 이미지 파일들 삭제 한다 ###################
				if(file_exists($delimg4)) {
					if(!unlink($delimg4)) {
						$common->error("파일삭제가 실패 되었습니다","previous","");
					}
				}
			}

			########## 선택한 글을 삭제 한다 ################
			$tran_query[0] = "DELETE FROM  $tablename WHERE uid='$uid'";
			$tran_result = $db->tran_query( $tran_query );

			if($MEMOUSETYPE=="Y") {
				########## 선택한 글을 메모글 삭제 한다 ################
				$tran_query[0] = "DELETE FROM  $memo_tablename WHERE board_uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
			}


			$common->error("삭제 되었습니다.","goto_no_alert","$_SERVER[PHP_SELF]?bmain=list&conf=$conf");
			

        break;

        case 'delete_all' :  
		########### 선택 삭제하기 하기 처리 ##################		
			if(!$uid) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

			$uid_value = explode(",",$uid);	//선택한 메세지를 배열로 저장 해서 순서대로 지운다		

			while(list($key,$uid) = each($uid_value)) {				

				$query= "SELECT fileadd_name,fileadd1_name,fileadd2_name,fileadd3_name,fileadd4_name FROM $tablename WHERE uid='$uid' ORDER BY uid DESC LIMIT 1";
				$row = $db->row( $query );
					$delimg = "$ROOT_PATH/$tablefile/$row[fileadd_name]";				
					$delimg1 = "$ROOT_PATH/$tablefile/$row[fileadd1_name]";
					$delimg2 = "$ROOT_PATH/$tablefile/$row[fileadd2_name]";
					$delimg3 = "$ROOT_PATH/$tablefile/$row[fileadd3_name]";
					$delimg4 = "$ROOT_PATH/$tablefile/$row[fileadd4_name]";


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

				if($row[fileadd2_name]){ 
					######## 이미지 파일들 삭제 한다 ###################
					if(file_exists($delimg2)) {
						if(!unlink($delimg2)) {
							$common->error("파일삭제가 실패 되었습니다","previous","");
						}
					}
				}

				if($row[fileadd3_name]){ 
					######## 이미지 파일들 삭제 한다 ###################
					if(file_exists($delimg3)) {
						if(!unlink($delimg3)) {
							$common->error("파일삭제가 실패 되었습니다","previous","");
						}
					}
				}
				if($row[fileadd4_name]){ 
					######## 이미지 파일들 삭제 한다 ###################
					if(file_exists($delimg4)) {
						if(!unlink($delimg4)) {
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


        case 'chviewtype' :  
		########### 선택 숨김처리하기 ##################		
			if(!$uid) {
				$common->error("데이터가 없습니다. 정상적으로 접근해 주세요.","previous","");	
			}

			$uid_value = explode(",",$uid);	//선택한 메세지를 배열로 저장 해서 순서대로 지운다		
			while(list($key,$uid) = each($uid_value)) {				

				$tran_query[0] = "UPDATE $tablename SET viewtype='N' WHERE uid='$uid'";
				$tran_result = $db->tran_query( $tran_query );
				//echo "<br><Br> $tran_query[0] <br>";
				$suss_msg = "숨기기 상태로 변경 되었습니다.";	

			}
		?>


<?
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
