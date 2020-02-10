<?php include "../inc/header.php"; ?>
<?
########## 게시판설정파일 #########
if (!$bmain) $bmain="list";
include "../sadmin/conf/conf_board1.php";

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
      <td class="sidebar_tit"><img src="../img/sidebar/title10.png" alt="Portfolio"></td>
     </tr>
     <tr>
      <td class="sidebar_menu"><a href="javascript:go_10();"><img src="../img/sidebar/1001_over.png" alt="Portfolio" /></a></td>
     </tr>
<?php include "../inc/sidebar_bottom.php"; ?>
    </table>
		<!--//sidebar-->
		</td>
    <td class="sidebar-e" height=550>&nbsp;</td>
		<!--contents-->
    <td valign="top" class="content">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td class="border-n"><span class="list_tit">Portfolio</span></td>
     </tr>
	</table>

	<?
		include "../Bboard/photo${bmain}.php";
	?>


	</td>
		<!--//contents-->
   </tr>
  </table>
	</td>
 </tr>
</table>
<?php include "../inc/footer.php"; ?>