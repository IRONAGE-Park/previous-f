<?
@extract($_GET); 
@extract($_POST); 

############### DB 정보를 가지고 온다 ####################
  if($uid) {		 
	 $row_board = get_tb_popup($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 
	 if(!$row_board[uid]) {
		 $common->error("관련된 정보가 없습니다.","previous","");
	 }
  }
  ?>
  <?if(!$row_board[uid]) {?>
	  <!-- 등록인경우 -->
	   <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>" onsubmit="return frmCheck('title,sdate,edate,top_v,left_v');"  ENCTYPE="multipart/form-data">
	  <input type="hidden" name="formmode" value="save">	  
	  <input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	  <input type="hidden" name="bmain" value="ok">
  <?} else {?>
	  <!-- 수정인경우 -->
	   <form name="signform" method="post" action="<?echo"$_SERVER[PHP_SELF]"?>" onsubmit="return frmCheck('title,sdate,edate,top_v,left_v');"  ENCTYPE="multipart/form-data">
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
          <td height="35"  width="150"><font class="T4">제목</font></td>
          <td  width="730"><input type="text" name="title" size="80"  id="title" title="제목" maxlength="250" class="FORM1"  value="<?=$row_board[title]?>"></td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
		<?if($MODEUSETYPE=="Y"){?>
        <tr> 
          <td width="20%" height="35"><font class="T4">사이트 지정 분류</font></td>
          <td width="80%">
				<? for($j=1;$j<=count($ARR_BOARD_TYPE);$i++,$j++) { ?>
					<input type="radio" name="mode" value="<?=$j?>" <?if($row_board[mode]=="$j") echo"checked"; else if(!$row_board[mode]) echo "checked";?>><?=$ARR_BOARD_TYPE[$j]?>
				<?}?>
			</td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
		<?}?>
        <!-- <tr> 
          <td width="20%" height="35"><font class="T4">내용입력 선택</font></td>
          <td width="80%">
			<input type="radio" name="conttype" value="img" <?if($row_board[conttype]=="img") echo"checked"; else if(!$row_board[conttype]) echo "checked";?> />
            이미지등록 &amp; 링크걸기 
            <input type="radio" name="conttype" value="link"  <?if($row_board[conttype]=="link") echo"checked";?> />
            HTML로 입력</td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr> -->
        <tr> 
          <td width="20%" height="35"><font class="T4">이동주소</font></td>
          <td width="80%"><input name="moveurl" type="text" class="FORM1" id="textfield44" size="80" value="<?=$row_board[moveurl]?>" /></td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td width="20%" height="35"><font class="T4">이동타겟</font></td>
          <td width="80%">
			<input name="actiontype" type="radio" id="textfield44" size="50" value="close" <?if($row_board[actiontype]=="close") echo"checked"; else if(!$row_board[actiontype]) echo "checked";?> />새창
			<input name="actiontype" type="radio" id="textfield44" size="50" value="move" <?if($row_board[actiontype]=="move") echo"checked";?> />본창
		  </td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
       <!--  <tr> 
          <td width="20%" height="35"><font class="T4">팝업창 크기</font></td>
          <td width="80%"><input name="w_size" type="text" class="FORM1" id="w_size" size="10" title="가로사이즈" value="<?=$row_board[w_size]?>" onKeyUp="if(isNaN(this.value)) {alert('숫자만 입력해 주세요.');this.value=''};" />
            가로 X
            <input name="h_size" type="text" class="FORM1" id="h_size" size="10"  title="세로사이즈"  value="<?=$row_board[h_size]?>" onKeyUp="if(isNaN(this.value)) {alert('숫자만 입력해 주세요.');this.value=''};" /> 세로
            (width x height 를 사이즈 픽셀 수치만 입력하세요.)</td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr> -->
        <tr> 
          <td width="20%" height="35"><font class="T4">팝업창 위치</font></td>
		  <?
		  if(!$row_board[top_v]) $row_board[top_v] = "100";
		  if(!$row_board[left_v]) $row_board[left_v] = "100";
		  ?>
          <td width="80%"><input name="top_v" type="text" class="FORM1" id="top_v" size="10"  title="X축 위치정보" value="<?=$row_board[top_v]?>" onKeyUp="if(isNaN(this.value)) {alert('숫자만 입력해 주세요.');this.value=''};" />
            x 
            <input name="left_v" type="text" class="FORM1" id="left_v" size="10" title="Y축 위치정보"  value="<?=$row_board[left_v]?>" onKeyUp="if(isNaN(this.value)) {alert('숫자만 입력해 주세요.');this.value=''};"  />
            (100*100)</td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td width="20%" height="35"><font class="T4">출력여부</font></td>
          <td width="80%"><input type="radio" name="viewtype" value="Y"  <?if($row_board[viewtype]=="Y") echo"checked"; else if(!$row_board[viewtype]) echo "checked";?> />
            출력
            <input type="radio" name="viewtype" value="N"  <?if($row_board[viewtype]=="N") echo"checked"; ?> />
            숨기기</td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td width="20%" height="35"><font class="T4">팝업기간</font></td>
          <td width="80%">
			<input type="text" id="view_sdate1" name="sdate" title="팝업기간" size="15" maxlength="10" readonly value="<?=$row_board[sdate]?>" class="FORM1" /> ~ 
			<input type="text" id="view_edate1" name="edate" title="팝업기간" size="15" maxlength="10" readonly value="<?=$row_board[edate]?>"  class="FORM1" />
		  </td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <!-- <tr> 
          <td colspan=2>
			<textarea id="editor1" name="content" class="ckeditor"><?=$row_board[content]?></textarea>
			<script>
			CKEDITOR.replace('editor1', {
			customConfig : '/ckeditor/config.js',
			width:'870',
			height:'350',
			filebrowserImageUploadUrl: '/ckeditor/ckeditor_upload.php?type=Images&CKEditor=editor1&CKEditorFuncNum=1&langCode=ko'
			});
			</script>
		  </td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr> -->
        <tr> 
          <td height="50"><font class="T4">첨부이미지</font></td>
          <td>
			<script type="text/javascript">
				$(document).ready(function() {		
					//이미지 팝업
					$(".fancybox-effects-d").fancybox({
						closeClick : true,
						openEffect  : 'none',
						closeEffect	: 'none',

						helpers : {
							title : {
								type : 'over'
							}
						}
					});
				});
			</script>
			<?if($row_board[fileadd_name]) {
				$row_board[fileadd_size] = filesize("$ROOT_PATH/$tablefile/$row_board[fileadd_name]");	
				echo "<a class='fancybox-effects-d' href='$HOME_PATH/$tablefile/$row_board[fileadd_name]' title='$row_board[title]'><img src='$HOME_PATH/$tablefile/$row_board[fileadd_name]' width=80 border=0></a><br>";
			?><?}?>
			<input type="file" name="fileadd" size=50 id="fileadd" title="첨부이미지"> 
			 <?if($row_board[fileadd_name]) { ?>
				삭제 <input type="checkbox" name="delimg_1" value="Y" class="border"> <?echo"<a href='$PHP_SELF?down=$row_board[fileadd_name]&file_name=$row_board[fileadd_name]&size=$row_board[fileadd_size]&board_name=$tablefile'>"?><?=$row_board[fileadd_name]?></a><br><?}?>
		  </td>
        </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#ebebeb"></td>
        </tr>
        <tr> 
          <td height="35"><font class="T4">등록일자</font></td>
          <td><input type="text" name="reg_date" size="20" maxlength="70" <?if($row_board[reg_date]){?>value="<?=$row_board[reg_date]?>"<?} else {?>value="<?=date("Y-m-d H:i:s");?>"<?}?> class="FORM1" readonly></td>
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
 
