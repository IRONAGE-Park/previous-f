<?php include "../inc/header.php"; ?>
<?
########## 게시판설정파일 #########
if (!$bmain) $bmain="list";
if (!$code) $code="1";
if (!$mode) $mode="1";

if($code=="1") {
	include "../sadmin/conf/conf_pro.php";
	$title_code = "Chaire";
} else if($code=="2") {
	include "../sadmin/conf/conf_pro1.php";	
	$title_code = "Sofa";
} else if($code=="3") {
	include "../sadmin/conf/conf_pro2.php";	
	$title_code = "Table";
} else if($code=="4") {
	include "../sadmin/conf/conf_pro3.php";	
	$title_code = "Office";
} else if($code=="5") {
	include "../sadmin/conf/conf_pro4.php";	
	$title_code = "Outdoor";
} else if($code=="6") {
	include "../sadmin/conf/conf_pro5.php";	
	$title_code = "Storage";
} else if($code=="7") {
	include "../sadmin/conf/conf_pro6.php";	
	$title_code = "Home Furniture";
} else if($code=="12") {
	include "../sadmin/conf/conf_pro7.php";	
	$title_code = "ACC";
}
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
      <!--sidebar title
      <td class="sidebar_tit"><img src="../img/sidebar/title01.png" alt="Chair"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title02.png" alt="Sofa"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title03.png" alt="Table"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title04.png" alt="Office"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title05.png" alt="Outdoor"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title06.png" alt="Storage"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title07.png" alt="Home Furniture"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title08.png" alt="Material"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title09.png" alt="About The F"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title10.png" alt="Portfolio"></td>
      <td class="sidebar_tit"><img src="../img/sidebar/title11.png" alt="QnA"></td>
      -->
     </tr>
     <!--menu01 Chair-->
<?if($code=="1") { ?>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0101_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0101_over.png'"><img src="../img/sidebar/0101<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0102_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0102.png'"><img src="../img/sidebar/0102<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0103_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0103.png'"><img src="../img/sidebar/0103<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0104_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0104.png'"><img src="../img/sidebar/0104<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=5&code=<?=$code?>" onMouseOver="sidebar05.src='../img/sidebar/0105_over.png'" onMouseOut="sidebar05.src='../img/sidebar/0105.png'"><img src="../img/sidebar/0105<?if($mode=="5")echo"_over";?>.png" name="sidebar05" id="sidebar05" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=6&code=<?=$code?>" onMouseOver="sidebar06.src='../img/sidebar/0106_over.png'" onMouseOut="sidebar06.src='../img/sidebar/0106.png'"><img src="../img/sidebar/0106<?if($mode=="6")echo"_over";?>.png" name="sidebar06" id="sidebar06" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=7&code=<?=$code?>" onMouseOver="sidebar07.src='../img/sidebar/0107_over.png'" onMouseOut="sidebar07.src='../img/sidebar/0107.png'"><img src="../img/sidebar/0107<?if($mode=="7")echo"_over";?>.png" name="sidebar07" id="sidebar07" /></a></td></tr>
<?} else if($code=="2") { ?>     
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0201_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0201.png'"><img src="../img/sidebar/0201<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0202_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0202.png'"><img src="../img/sidebar/0202<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>

<?} else if($code=="3") { ?>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0301_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0301.png'"><img src="../img/sidebar/0301<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0302_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0302.png'"><img src="../img/sidebar/0302<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0303_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0303.png'"><img src="../img/sidebar/0303<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>

<?} else if($code=="4") { ?>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0401_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0401.png'"><img src="../img/sidebar/0401.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0402_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0402.png'"><img src="../img/sidebar/0402.png" name="sidebar02" id="sidebar02" /></a></td></tr>

<?} else if($code=="5") { ?>

     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0501_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0501.png'"><img src="../img/sidebar/0501<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0502_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0502.png'"><img src="../img/sidebar/0502<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0503_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0503.png'"><img src="../img/sidebar/0503<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>

<?} else if($code=="6") { ?>

     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0601_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0601.png'"><img src="../img/sidebar/0601<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0602_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0602.png'"><img src="../img/sidebar/0602<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0603_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0603.png'"><img src="../img/sidebar/0603<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0604_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0604.png'"><img src="../img/sidebar/0604<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>

<?} else if($code=="7") { ?>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0701_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0701.png'"><img src="../img/sidebar/0701<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0702_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0702.png'"><img src="../img/sidebar/0702<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0703_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0703.png'"><img src="../img/sidebar/0703<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0704_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0704.png'"><img src="../img/sidebar/0704<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=5&code=<?=$code?>" onMouseOver="sidebar05.src='../img/sidebar/0705_over.png'" onMouseOut="sidebar05.src='../img/sidebar/0705.png'"><img src="../img/sidebar/0705<?if($mode=="5")echo"_over";?>.png" name="sidebar05" id="sidebar05" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=6&code=<?=$code?>" onMouseOver="sidebar06.src='../img/sidebar/0706_over.png'" onMouseOut="sidebar06.src='../img/sidebar/0706.png'"><img src="../img/sidebar/0706<?if($mode=="6")echo"_over";?>.png" name="sidebar06" id="sidebar06" /></a></td></tr>
<?} else if($code=="12") { ?>

     <!--menu12 ACC---->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/1201_over.png'" onMouseOut="sidebar01.src='../img/sidebar/1201<?if($mode=="1")echo"_over";?>.png'"><img src="../img/sidebar/1201.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/1202_over.png'" onMouseOut="sidebar02.src='../img/sidebar/1202<?if($mode=="2")echo"_over";?>.png'"><img src="../img/sidebar/1202.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/1203_over.png'" onMouseOut="sidebar03.src='../img/sidebar/1203<?if($mode=="3")echo"_over";?>.png'"><img src="../img/sidebar/1203.png" name="sidebar03" id="sidebar03" /></a></td></tr>


     <!--menu08 Material--
     <tr><td class="sidebar_menu"><a href="javascript:go_08_01();" onMouseOver="sidebar01.src='../img/sidebar/0801_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0801.png'"><img src="../img/sidebar/0801.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="javascript:go_08_02();" onMouseOver="sidebar02.src='../img/sidebar/0802_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0802.png'"><img src="../img/sidebar/0802.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="javascript:go_08_03();" onMouseOver="sidebar03.src='../img/sidebar/0803_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0803.png'"><img src="../img/sidebar/0803.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     -->
<?}?>
<?php include "../inc/sidebar_bottom.php"; ?>
    </table>
		<!--//sidebar-->
		</td>
    <td class="sidebar-e">&nbsp;</td>
		<!--contents-->
    <td valign="top" class="content">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
      <td class="border-n"><span class="list_tit"><?if($MODEUSETYPE=="Y"){?><?=$ARR_BOARD_TYPE[$mode]?><?} else {?>STORAGE<?}?></span></td>
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