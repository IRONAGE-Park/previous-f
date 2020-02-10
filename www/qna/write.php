<?php include "../inc/header.php"; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td align="center" valign="top">
	<table width="1100" border="0" cellspacing="0" cellpadding="0">
   <tr>
		<!--sidebar-->
    <td valign="top" class="sidebar">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td class="sidebar_tit"><img src="../img/sidebar/title11.png" alt="QnA"></td>
     </tr>
     <tr>
      <td class="sidebar_menu"><a href="javascript:go_11();"><img src="../img/sidebar/1101_over.png" alt="QnA" /></a></td>
     </tr>
<?php include "../inc/sidebar_bottom.php"; ?>
    </table>
		<!--//sidebar-->
		</td>
    <td class="sidebar-e">&nbsp;</td>
		<!--contents-->
    <td valign="top" class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td><img src="../img/visual/visual11.jpg"></td>
     </tr>
     <tr>
      <td class="border-n"><span class="list_tit">Q&amp;A</span></td>
     </tr>
     <tr>
      <td valign="top">
	  
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
        <td width="70" class="qna_write01"><span class="b c333">제목</span></td>
        <td colspan="3" class="qna_write01"><input name="textfield" type="text" class="input" id="" style="width:700px"></td>
        </tr>
       <tr>
        <td width="70" class="qna_write02"><span class="b c333">작성자</span></td>
        <td class="qna_write02"><input name="textfield2" type="text" class="input" id="textfield" style="width:200px;"></td>
        <td width="70" class="qna_write02"><span class="b c333">비밀번호</span></td>
        <td class="qna_write02"><input name="textfield3" type="password" class="input" id="textfield2" style="width:200px;"></td>
        </tr>
       <tr>
        <td width="70" class="qna_write02"><span class="b c333">내용</span></td>
        <td colspan="3" class="qna_write02"><textarea cols="" rows="" class="textarea" style="width:680px; height:200px">에디터 툴이 들어가는 자리입니다.
</textarea></td>
        </tr>
       <tr>
        <td width="70" class="qna_write03"><span class="b c333">첨부파일1</span></td>
        <td colspan="3" class="qna_write03"><input type="file" name="" id="" style="width:400px">
         <a href="#"><img src="../img/button/file_search.gif" alt="파일찾기" hspace="2"></a><a href="#"><img src="../img/button/file_add.gif" alt="추가" hspace="2"></a><a href="#"><img src="../img/button/file_del.gif" alt="첨부삭제" hspace="2"></a></td>
        </tr>
      </table></td>
     </tr>
     <tr>
      <td align="center" style="padding:20px 0 50px 0"><a href="pw.php"><img src="../img/button/modify.gif" alt="수정" hspace="2"></a><a href="pw.php"><img src="../img/button/delete.gif" alt="삭제" hspace="2"></a><a href="list.php"><img src="../img/button/list.gif" hspace="2"></a></td>
     </tr>
    </table></td>
		<!--//contents-->
   </tr>
  </table>
	</td>
 </tr>
</table>
<?php include "../inc/footer.php"; ?>