<?
@extract($_GET); 
@extract($_POST); 

############### DB 정보를 가지고 온다 ####################
  if($uid) {		 
	 $row_board = get_tb_board($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 
	 if(!$row_board[uid]) {
		 $common->error("관련된 정보가 없습니다.","previous","");
	 }

  }
  ?>
  <?if(!$row_board[uid]) {?>
	  <!-- 등록인경우 -->
	  <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>"  onSubmit="return jumpoWritecheck()" ENCTYPE="multipart/form-data">
	  <input type="hidden" name="formmode" value="save">	  
	  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	  <input type="hidden" name="bmain" value="ok">
  <?} else {?>
	  <!-- 수정인경우 -->
	  <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>" onSubmit="return jumpoWritecheck()"  ENCTYPE="multipart/form-data">
	  <input type="hidden" name="formmode" value="modify">
	  <input type="hidden" name="uid" value="<?=$uid?>">
	  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	  <input type="hidden" name="bmain" value="ok">
  <?}?>

      <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="1" colspan="2" bgcolor="#b1b1b1"></td>
        </tr>

        <tr> 
          <td height="35"  width="150"><font class="T4">ㆍ매장명</font></td>
          <td  width="730"><input type="text" name="title" size="80" maxlength="250" class="FORM1"  value="<?=$row_board[title]?>"></td>
        </tr>
		<tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>		
        <tr> 
          <td height="35"><font class="T4">ㆍ와이파이</font></td>
          <td>	
			<input type="radio" name="icon1" value="Y" <?if($row_board[icon1]=="Y") echo"checked"; if(!$row_board[icon1])echo"checked";?> > 사용
			<input type="radio" name="icon1" value="N" <?if($row_board[icon1]=="N") echo"checked"; ?>> 사용불가
		  </td>
        </tr>
		<tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td height="35"><font class="T4">ㆍ흡연</font></td>
          <td>	
			<input type="radio" name="icon2" value="Y" <?if($row_board[icon2]=="Y") echo"checked"; if(!$row_board[icon2])echo"checked";?> > 흡연가능
			<input type="radio" name="icon2" value="N" <?if($row_board[icon2]=="N") echo"checked"; ?>> 흡연불가
		  </td>
        </tr>
		<tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td height="35"><font class="T4">ㆍ주차</font></td>
          <td>	
			<input type="radio" name="icon3" value="Y" <?if($row_board[icon3]=="Y") echo"checked"; if(!$row_board[icon2])echo"checked";?> > 주차가능
			<input type="radio" name="icon3" value="N" <?if($row_board[icon3]=="N") echo"checked"; ?>> 주차불가
		  </td>
        </tr>
		<tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
		
        <tr> 
          <td height="100"  width="150"><font class="T4">ㆍ내용</font></td>
          <td  width="730"><textarea name="content" rows=5 cols=60><?=stripslashes($row_board[content])?></textarea></td>
        </tr>
		<tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
		
        <tr> 
          <td height="35"><font class="T4">ㆍ등록일자</font></td>
          <td><input type="text" name="reg_date" size="20" maxlength="70" <?if($row_board[reg_date]){?>value="<?=$row_board[reg_date]?>"<?} else {?>value="<?=date("Y-m-d H:i:s");?>"<?}?> class="FORM1" readonly></td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td height="35"><font class="T4">ㆍ첨부파일 <a href='javascript:add_file()'>[추가]</a></font></td>
          <td>			
		  	<?			
			// 첨부화일
			$row_file = explode("|",$row_board[fileadd_name]);
				for($f=0;$f<count($row_file);$f++) {
					if($row_file[$f]) {
					$fname_value .= "<img src='../$tablefile/$row_file[$f]' width='50' height=40> <input type='checkbox' class=border name='fdel[$f]' value='$row_file[$f]' align='absmiddle'>";
					}
				}
				if($row_board[fileadd_name]) echo "$fname_value <br>";
			// 첨부화일
			$file_count = count($row_file)+1;
			if(!$file_count) $file_count=1;
			?>
				<input type="hidden" name="file_num" value="<?=$file_count?>">
			<?if($file_count<31){?>
				<input type="file" name="in_file[]" size=40>
			<?}?>
			<span id='fname_span'></span>
			
		  </td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#b1b1b1"></td>
        </tr>
      </table>
      <br /> <br /> 
	  <table width="880" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="55" align=right><input type="image"  src="img/btn_9.gif" width="55" height="25" border="0" /> 
              <a href="<?echo"$_SERVER[PHP_SELF]?bmain=list"?>"><img src="img/btn_2.gif" width="55" height="25" border="0" /> 
              </a></div></td>
        </tr>
      </table></form>
 
