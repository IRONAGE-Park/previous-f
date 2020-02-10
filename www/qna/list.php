<?php include "../inc/header.php"; ?>
<?
########## 게시판설정파일 #########
if (!$bmain) $bmain="list";
include "../sadmin/conf/conf_board.php";
?>
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
      <td class="border-n">


	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td><span class="list_tit">Q&amp;A</span></td>
		</tr>
	  </table>
			<br>
			<? 
			if(($bmain=="view") or ($bmain=="modify")){

			 $row_board = get_tb_board($uid,$tablename); //func_other.php 에서 호출 해서 게시판 정보 가지고 온다 
		
				if(($row_board[keytype]=="Y") and (($S_USER_ID!=$row_board[pass]) or ($S_USER_NUM!=$uid) or ($S_USER_TABLE!=$tablename) ) AND  ($SITE_ADMIN_UID!=$row_board[pass]) ) { 
					include "../Bboard/boardlogin.php";
				} else { 
					include "../Bboard/board${bmain}.php";
				}
			} else {
				include "../Bboard/board${bmain}.php";

			}
			?>

	
	</td>
		<!--//contents-->
   </tr>
  </table>
	</td>
 </tr>
</table>
<?php include "../inc/footer.php"; ?>