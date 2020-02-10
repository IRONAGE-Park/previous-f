<?php include "../inc/header.php"; ?>
<?
########## 게시판설정파일 #########
if (!$bmain) $bmain="list";

include "../sadmin/conf/conf_main.php";

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
      <td class="sidebar_tit"><img src="../img/sidebar/title0<?=$code?>.png" alt="<?=$title_code?>"></td>     
     </tr>   

     <!--menu08 Material-- -->
     <tr><td class="sidebar_menu"><a href="/product/list01.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0801_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0801.png'"><img src="../img/sidebar/0801<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list01.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0802_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0802.png'"><img src="../img/sidebar/0802<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list01.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0803_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0803.png'"><img src="../img/sidebar/0803<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
    
	<?php include "../inc/sidebar_bottom.php"; ?>
    </table>
		<!--//sidebar-->
		</td>
    <td class="sidebar-e">&nbsp;</td>
		<!--contents-->
    <td valign="top" class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td><img src="../img/visual/visual0<?=$code?>.jpg"></td>
	     <!--menu01 Chair--
				<img src="../img/visual/visual01.jpg">
	     <!--menu02 Sofa--
				<img src="../img/visual/visual02.jpg">
	     <!--menu03 Tbale--
				<img src="../img/visual/visual03.jpg">
	     <!--menu04 Office--
				<img src="../img/visual/visual04.jpg">
	     <!--menu05 Outdoor--
				<img src="../img/visual/visual05.jpg">
	     <!--menu06 Storage--
				<img src="../img/visual/visual06.jpg">
	     <!--menu07 Home Funiture--
				<img src="../img/visual/visual07.jpg">
	     <!--menu08 Material--
				<img src="../img/visual/visual08.jpg">
			-->
     </tr>
     <tr>
      <td class="border-n"><span class="list_tit"><?=$ARR_BOARD_TYPE[$mode]?></span></td>
     </tr>
     <tr>
      <td valign="top">
	  
	  <? include "include_pro.php";?>	
	
	
	</td>
		<!--//contents-->
   </tr>
  </table>
	</td>
 </tr>
</table>
<?php include "../inc/footer.php"; ?>