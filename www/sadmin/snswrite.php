<?
@extract($_GET); 
@extract($_POST); 

############### DB 정보를 가지고 온다 ####################
for($j=1;$j<=2;$j++) {
	$uid = $j;
	  if($uid) {		 
		 $row_board = get_tb_popup($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 
		 if(!$row_board[uid]) {
			 $common->error("관련된 정보가 없습니다.","previous","");
		 }
	  }

	  if($j=="1") {
		  echo "<b>$j. 트위터 관리</b>";
	  } else if($j=="2") {
		  echo "<b>$j. 유투브 관리</b>";
	  }
	  ?>
	 
		  <!-- 수정인경우 -->
		   <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>" onsubmit="return frmCheck('title');"  ENCTYPE="multipart/form-data">
		  <input type="hidden" name="formmode" value="modify">
		  <input type="hidden" name="uid" value="<?=$uid?>">
		  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
		  <input type="hidden" name="bmain" value="ok">
		  <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td height="1" colspan="2" bgcolor="#b1b1b1"></td>
			</tr>

			<tr> 
			  <td height="35"  width="150"><font class="T4">내용</font></td>
			  <td  width="730"><input type="text" name="title" size="80"  id="title" title="제목" maxlength="250" class="FORM1"  value="<?=$row_board[title]?>"></td>
			</tr>
			<tr>
			  <td height="1" colspan="2" bgcolor="#ebebeb"></td>
			</tr>
			<tr> 
			  <td height="35"  width="150"><font class="T4">연결주소</font></td>
			  <td  width="730"><input type="text" name="moveurl" size="80"  id="moveurl" title="연결주소" maxlength="250" class="FORM1"  value="<?=$row_board[moveurl]?>">
			  </td>
			</tr>
			<tr>
			  <td height="1" colspan="2" bgcolor="#ebebeb"></td>
			</tr>

			
			<tr>
			  <td height="1" colspan="2" bgcolor="#b1b1b1"></td>
			</tr>

		  </table>
		  <br /> <br /> 
		  <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr> 
			  <td width="55" align=right><input type="image" src="./img/btn_9.gif" width="55" height="25" border="0" />
				  <a href="<?echo"$_SERVER[PHP_SELF]?bmain=list"?>"><img src="./img/btn_2.gif" width="55" height="25" border="0" /> 
				  </a></div></td>
			</tr>
		  </table></form>
	  <br><br><br><br>
<?}?>