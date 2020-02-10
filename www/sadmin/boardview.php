<?
@extract($_GET); 
@extract($_POST); 
############### DB 정보를 가지고 온다 ####################
  if($uid) {	
	  
	 $row_board = get_tb_board($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 

	 if(!$row_board[uid]) {
		 $common->error("관련된 정보가 없습니다.","previous","");
	 }

	 ##### 게시물 조회수 올림 #########
	 get_tb_ref($tablename,"ref",$uid);

	 if($MODEUSETYPE=="Y") {
		 $row_board_mode = "[".$ARR_BOARD_TYPE[$row_board[mode]]."]";
	 }
  }
?>

	<script type="text/javascript">
		$(document).ready(function() {		
			//Remove padding, set opening and closing animations, close if clicked and disable overlay  이미지 팝업
			$(".fancybox-effects-d").fancybox({
				closeClick : true,
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
				/*	
				padding: 0,
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				closeClick : true,
				helpers : {
					overlay : null
				}*/
			});
		});
	</script>

      <!-- 본문컨텐츠부분 시작 -->
      <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		  <td height="1" colspan="8" bgcolor="#b1b1b1"></td>
	  </tr>
        <tr> 
          <td width="10%" height="35"><font class="T4">ㆍ등록자</font></td>
          <td width="25%"><?=$row_board[uname]?> <?if($MEMBER_WRITE=="Y") echo "(비밀번호:$row_board[pass])";?></td>
          <td width="10%"><font class="T4">ㆍ등록일자</font></td>
          <td width="20%"><?=$row_board[reg_date]?></td>
          <td width="10%"><font class="T4">ㆍ게시상태</font></td>
          <td>
			<?if($row_board[viewtype]=="Y") echo "출력"; else echo"숨기기";?>
		  </td>
		  <?if($REFUSETYPE=="Y") {?>
          <td width="10%"><font class="T4">ㆍ조회수</font></td>
          <td>
			<?=$row_board[ref]?>
		  </td>
		  <?}?>
        </tr>
	  <tr>
		  <td height="1" colspan="8" bgcolor="#b1b1b1"></td>
	  </tr>
      </table>
      
	  <br>
	   <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		  <td height="1" colspan="4" bgcolor="#b1b1b1"></td>
	  </tr>
        <tr> 
          <td width="12%" height="35"><font class="T4">ㆍ제목</font></td>
          <td ><strong><?=$row_board_mode?> <?=$row_board[title]?></strong></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
		<?if($CONTENT2TYPE=="Y") { ?>
        <tr> 
          <td width="12%" height="35" style="padding-top:5px;padding-bottom:5px;"><font class="T4">ㆍ요약글</font></td>
          <td ><strong><?=$row_board_mode?> <?=nl2br($row_board[content1])?></strong></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
		<?}?>
        <tr> 
          <td height="30"><font class="T4">ㆍ내용</font></td>
          <td width="86%"><div align="justify"><br />
			<?//if($BOARD_TYPE=="PHOTO") {
				###### 포토게시판인 경우 이미지 출력 ######
				if($row_board[fileadd_name]) {
					$file_size=GetImageSize("$ROOT_PATH/$tablefile/$row_board[fileadd_name]");
					if($file_size[0] > 650) $img_width = "650";
					else  $img_width = "$file_size[0]";
					$board_img = "<a class=\"fancybox-effects-d\" href=\"$HOME_PATH/$tablefile/$row_board[fileadd_name]\" title=\"$row_board[title]\"><img src='$HOME_PATH/$tablefile/$row_board[fileadd_name]' border=0  width='$img_width'><br><br>";
					echo "$board_img";
				}
				if($row_board[fileadd1_name]) {
					$file_size=GetImageSize("$ROOT_PATH/$tablefile/$row_board[fileadd1_name]");
					if($file_size[0] > 650) $img_width1 = "650";
					else  $img_width1 = "$file_size[0]";
					$board_img = "<a class=\"fancybox-effects-d\" href=\"$HOME_PATH/$tablefile/$row_board[fileadd1_name]\" title=\"$row_board[title]\"><img src='$HOME_PATH/$tablefile/$row_board[fileadd1_name]' border=0  width='$img_width1'></a><br><br>";
					echo "$board_img";
				}
			//}?>

              <?=stripslashes($row_board[content])?>
            <br><br></div></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
		<?if($row_board[fileadd_name] OR $row_board[fileadd1_name]) {
			if($row_board[fileadd_name]) $row_board[fileadd_size] = filesize("$ROOT_PATH/$tablefile/$row_board[fileadd_name]");	
			if($row_board[fileadd1_name]) $row_board[fileadd1_size] = filesize("$ROOT_PATH/$tablefile/$row_board[fileadd1_name]");	
		?>
        <tr> 
          <td height="35"><font class="T4">ㆍ첨부파일</font></td>
          <td>
		  <? if($row_board[fileadd_name]) { echo"<a href='$PHP_SELF?down=$row_board[fileadd_name]&file_name=$row_board[fileadd_name]&size=$row_board[fileadd_size]&board_name=$tablefile' class='L3'>"?><?=$row_board[fileadd_org]?> (<?=number_format($row_board[fileadd_size])?>k)</a><?}?>
		  
		   <? if($row_board[fileadd1_name]) { echo"<a href='$PHP_SELF?down=$row_board[fileadd1_name]&file_name=$row_board[fileadd1_name]&size=$row_board[fileadd1_size]&board_name=$tablefile' class='L3'>"?><?=$row_board[fileadd1_org]?> (<?=number_format($row_board[fileadd1_size])?>k)</a><?}?>
		  
		  </td>
        </tr>
		  <tr>
			  <td height="1" colspan="4" bgcolor="#b1b1b1"></td>
		  </tr>

		<?}?>
      </table>
      <br />  <br /> 
	  
	  <!-- 각종버튼 -->
	  <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="55" align="right">
			<!-- 목록 --><a href="<?echo"$_SERVER[PHP_SELF]?bmain=list"?>"><img src="./img/btn_10.gif" border="0" /></a>
            <!-- 등록 --><a href="<?echo"$_SERVER[PHP_SELF]?bmain=write"?>"><img src="./img/btn_9.gif" border="0" /></a> 
		<?if($SITE_ADMIN_LEVEL=="1") {?>
			<!-- 수정 --><a href="<?echo"$_SERVER[PHP_SELF]?bmain=write&uid=$uid"?>"><img src="./img/btn_6.gif" border="0" /></a> 
		<?} else {?>	
			<?if($row_board[pass]==$SITE_ADMIN_MID) {?>
            <!-- 수정 --><a href="<?echo"$_SERVER[PHP_SELF]?bmain=write&uid=$uid"?>"><img src="./img/btn_6.gif" border="0" /></a> 
			<?} else {?>
            <!-- 삭제 --><a href="javascript: onClick=alert('수정 권한이 없습니다.');"><img src="./img/btn_6.gif" border="0" /></a>
			<?}?>
		<?}?>	
		<?if($MODEREPLY=="Y") {?>
			<!-- 답변 --><a href="<?echo"$_SERVER[PHP_SELF]?bmain=reply&uid=$uid"?>"><img src="./img/btn_157.gif" border="0" alt='답변' /></a> 
		<?}?>
		<?if($SITE_ADMIN_LEVEL=="1") {?>
            <!-- 삭제 --><a href="javascript: onClick=contentDel('<?echo"$_SERVER[PHP_SELF]?bmain=ok&conf=$conf&uid=$uid&formmode=delete"?>');"><img src="./img/btn_7.gif" border="0" /></a>
		<?} else {?>	
			<?if($row_board[pass]==$SITE_ADMIN_MID) {?>
            <!-- 삭제 --><a href="javascript: onClick=contentDel('<?echo"$_SERVER[PHP_SELF]?bmain=ok&conf=$conf&uid=$uid&formmode=delete"?>');"><img src="./img/btn_7.gif" border="0" /></a>
			<?} else {?>
            <!-- 삭제 --><a href="javascript: onClick=alert('삭제 권한이 없습니다.');"><img src="./img/btn_7.gif" border="0" /></a>
			<?}?>
		<?}?>
			</td>
        </tr>
      </table>
      <br />

<!-- 답변 달기 ================ -->		
<?if($VIEWREPLY=="Y") {?>

	<form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>?<?echo"uid=$uid&page=$link_page&search=$search&key=$encoded_key"?>" onSubmit="return boardWritecheck()"  ENCTYPE="multipart/form-data">
	  <input type="hidden" name="formmode" value="modify1">
	  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	  <input type="hidden" name="bmain" value="ok">
      <!--== 메인 테이블 시작 == -->
      <table width="90%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
	  <tr> 
		<td colspan="6" height=30>  <br />  <br /> 
		 <font color="#000000"><strong>답변하기</strong>  <?if($row_board[reply_date] and $row_board[content1]){?><b>[답변날짜 : <?=$row_board[reply_date]?>]</b><?}?></font>  <br />  <br /> 
		</td>
	  </tr>
	  <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
		<tr> 
		  <td align="center"> 
			<!--== 글쓰기 시작== -->
			<textarea id="editor1" name="content" class="ckeditor"><?=stripslashes($row_board[content1])?></textarea>
			<script>
			CKEDITOR.replace('editor1', {
			customConfig : '/ckeditor/config.js',
			width:'870',
			height:'200',
			filebrowserImageUploadUrl: '/ckeditor/ckeditor_upload.php?type=Images&CKEditor=editor1&CKEditorFuncNum=1&langCode=ko'
			});
			</script>
			
			<!--== 글쓰기 끝== -->
		  </td>
		</tr>
		<tr> 
		  <td align="center"> 
			<!--==버튼 시작== --> <br /> 
			<table border="0" cellspacing="0" cellpadding="0" height="30" width=100%>
			  <tr> 
				<td width="50%" valign="bottom" align="left"></td>
				<td width="50%" align="right" valign="bottom">
					<input type="image" src="./img/btn_9.gif" border="0" class=border></td>
			  </tr>
			</table>
			<!--==버튼 끝== -->
			<br>
		  </td>
		</tr>


      </table>
      <!--== 메인 테이블 끝 == -->
</form>
<?}?>


		<? if($MEMOUSETYPE=="Y") { ?>
		<!-- 댓글게시판 ========= -->
		<iframe src="iframe_memo.html?conf=<?=$conf?>&board_uid=<?=$uid?>" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0" width='100%'   id="boardmemo_1" name="boardmemo_1"></iframe>
		<?}?>
      <br />
      <br />
      <!-- 본문컨텐츠부분 끝 -->
