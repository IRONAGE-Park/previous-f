<?
@extract($_GET); 
@extract($_POST); 
############### DB 정보를 가지고 온다 ####################
  if($uid) {	
	  
	 $row_board = get_tb_board($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 

	 if(!$row_board[uid]) {
		 $common->error("관련된 정보가 없습니다.","previous","");
	 }

	 if($MODEUSETYPE=="Y") {
		 $row_board_mode = "[".$ARR_BOARD_TYPE[$row_board[mode]]."]";
	 }
  }
?>

	  <!-- 수정인경우 -->
	  <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>" onSubmit="return onlineWritecheck()"  ENCTYPE="multipart/form-data">
	  <input type="hidden" name="formmode" value="modify">
	  <input type="hidden" name="uid" value="<?=$uid?>">
	  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	  <input type="hidden" name="bmain" value="ok">

      <!-- 본문컨텐츠부분 시작 -->
      <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		  <td height="1" colspan="8" bgcolor="#b1b1b1"></td>
	  </tr>
        <tr> 
          <td width="10%" height="35"><font class="T4">ㆍ등록자</font></td>
          <td width="40%"><?=$row_board[uname]?> <?if($MEMBER_WRITE=="N") echo "(비밀번호:$row_board[pass])";?></td>
          <td width="10%"><font class="T4">ㆍ등록일자</font></td>
          <td width="40%"><?=$row_board[reg_date]?></td>
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
        <tr> 
          <td width="12%" height="35"><font class="T4">ㆍ이메일</font></td>
          <td ><?=$row_board[uemail]?></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
        <tr> 
          <td width="12%" height="35"><font class="T4">ㆍ연락처</font></td>
          <td ><?=$row_board[utel]?></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>		
        <tr> 
          <td height="30"><font class="T4">ㆍ내용</font></td>
          <td width="86%"><div align="justify"><br />
              <?=nl2br($row_board[content])?>
            <br><br></div></td>
        </tr>
	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>		

        <tr> 
          <td width="12%" height="35"><font class="T4">ㆍ상태</font></td>
          <td>
			<select name="mode">
				<? for($j=1;$j<=count($ARR_BOARD_TYPE);$j++) { ?>
					<option value="<?=$j?>" <?if($row_board[mode]=="$j") echo"selected";?>><?=$ARR_BOARD_TYPE[$j]?></option>
				<?}?>
			</select>

		  </td>
        </tr>

	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>		
        <tr> 
          <td height="130"><font class="T4">ㆍ관리자메모</font></td>
          <td width="86%">
			<textarea name="content1" rows="6" cols="80"><?=nl2br($row_board[content1])?></textarea>
		  </td>
        </tr>


	    <tr>
			<td height="1" colspan="4" bgcolor="#ebebeb"></td>
	    </tr>
		<?if($row_board[fileadd_name]) {?>
        <tr> 
          <td height="35"><font class="T4">ㆍ첨부파일</font></td>
          <td>		
		  	<?			
			// 첨부화일
			$row_file = explode("|",$row_board[fileadd_name]);
				for($f=0;$f<count($row_file);$f++) {
					if($row_file[$f]) {				
					$fileadd_size = filesize("$ROOT_PATH/$tablefile/$row_file[$f]");	
			?>
				<?echo"<a href='$PHP_SELF?down=$row_file[$f]&file_name=$row_file[$f]&size=$fileadd_size&board_name=$tablefile' class='L3'>"?><?echo"$row_file[$f]";?> (<?=number_format($fileadd_size)?>k)</a>
			<?
					}
				}
			// 첨부화일
			?>
		  
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
            <!-- 수정 --><input type="image"  src="img/btn_6.gif" border="0" />
            <!-- 삭제 --><a href="javascript: onClick=contentDel('<?echo"$_SERVER[PHP_SELF]?bmain=ok&conf=$conf&uid=$uid&formmode=delete"?>');"><img src="./img/btn_7.gif" border="0" /></a>
			</td>
        </tr>
      </table>
      <br />
    </form>

