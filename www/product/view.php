<?
	############## 오늘본 상품 ##################	
	if($uid) {
	 $my_userid1 = $uid;
	 $my_usercode = $code;
	 if($S_USER_ID_1) {
		 $view_arr = explode(",",$S_USER_ID_1); 	
		 $arr_true = false;
		 for($c=0;$c<count($view_arr);$c++) {
			 if($view_arr[$c]==$my_userid1) {
				$arr_true = true;
			 }
		 }
		 /*
		 if(!$arr_true)  {
			 $my_userid1 = $S_USER_ID_1.",".$my_userid1;
		 } else {
			 $my_userid1 = $S_USER_ID_1;
		 }
		 */
		 $my_userid1 = $S_USER_ID_1.",".$my_userid1;
		 $my_usercode = $S_USER_CODE.",".$my_usercode;
	 }
	 //session_register("my_userid1");	
	 setcookie( "S_USER_ID_1", $my_userid1, 0, "/");			//회원아이디
	 setcookie( "S_USER_CODE", $my_usercode, 0, "/");			//회원아이디
	//setcookie("pro_view", $_COOKIE['pro_view'].",".$_GET['uid'],0,"/"); 
	//setcookie( "pro_view", $result1[mid], 0, "/", $cookie_server );			//회원아이디
	############## END 오늘본 상품 ##################	
	}

	include "../inc/header.php"; 
?>
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
<?
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td align="center" valign="top">
	<table width="1100" border="0" cellspacing="0" cellpadding="0">
   <tr>
		<!--sidebar-->
    <td valign="top" class="sidebar">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td class="sidebar_tit"><img src="../img/sidebar/title0<?=$code?>.png" alt="Chaire"></td>
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
<?if($code=="1") { ?>
     <!--menu01 Chair-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0101_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0101_over.png'"><img src="../img/sidebar/0101<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0102_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0102.png'"><img src="../img/sidebar/0102<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0103_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0103.png'"><img src="../img/sidebar/0103<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0104_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0104.png'"><img src="../img/sidebar/0104<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=5&code=<?=$code?>" onMouseOver="sidebar05.src='../img/sidebar/0105_over.png'" onMouseOut="sidebar05.src='../img/sidebar/0105.png'"><img src="../img/sidebar/0105<?if($mode=="5")echo"_over";?>.png" name="sidebar05" id="sidebar05" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=6&code=<?=$code?>" onMouseOver="sidebar06.src='../img/sidebar/0106_over.png'" onMouseOut="sidebar06.src='../img/sidebar/0106.png'"><img src="../img/sidebar/0106<?if($mode=="6")echo"_over";?>.png" name="sidebar06" id="sidebar06" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=7&code=<?=$code?>" onMouseOver="sidebar07.src='../img/sidebar/0107_over.png'" onMouseOut="sidebar07.src='../img/sidebar/0107.png'"><img src="../img/sidebar/0107<?if($mode=="7")echo"_over";?>.png" name="sidebar07" id="sidebar07" /></a></td></tr>
<?} else if($code=="2") { ?>  
     <!--menu02 Sofa-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0201_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0201.png'"><img src="../img/sidebar/0201<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0202_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0202.png'"><img src="../img/sidebar/0202<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
<?} else if($code=="3") { ?>  
     <!--menu03 Tbale-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0301_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0301.png'"><img src="../img/sidebar/0301<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0302_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0302.png'"><img src="../img/sidebar/0202<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0303_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0303.png'"><img src="../img/sidebar/0303<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
<?} else if($code=="4") { ?>  
     <!--menu04 Office-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0401_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0401.png'"><img src="../img/sidebar/0401.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0402_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0402.png'"><img src="../img/sidebar/0402.png" name="sidebar02" id="sidebar02" /></a></td></tr>

<?} else if($code=="5") { ?>  
     <!--menu05 Outdoor-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0401_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0401.png'"><img src="../img/sidebar/0401<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0402_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0402.png'"><img src="../img/sidebar/0402<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0403_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0403.png'"><img src="../img/sidebar/0403<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>

<?} else if($code=="6") { ?>  
      <!--menu06 Storage-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0601_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0601.png'"><img src="../img/sidebar/0601<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0602_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0602.png'"><img src="../img/sidebar/0602<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0603_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0603.png'"><img src="../img/sidebar/0603<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0604_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0604.png'"><img src="../img/sidebar/0604<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>

<?} else if($code=="7") { ?>  
     <!--menu07 Home Funiture-->
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/0701_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0701.png'"><img src="../img/sidebar/0701<?if($mode=="1")echo"_over";?>.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/0702_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0702.png'"><img src="../img/sidebar/0702<?if($mode=="2")echo"_over";?>.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/0703_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0703.png'"><img src="../img/sidebar/0703<?if($mode=="3")echo"_over";?>.png" name="sidebar03" id="sidebar03" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=4&code=<?=$code?>" onMouseOver="sidebar04.src='../img/sidebar/0704_over.png'" onMouseOut="sidebar04.src='../img/sidebar/0704.png'"><img src="../img/sidebar/0704<?if($mode=="4")echo"_over";?>.png" name="sidebar04" id="sidebar04" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=5&code=<?=$code?>" onMouseOver="sidebar05.src='../img/sidebar/0705_over.png'" onMouseOut="sidebar05.src='../img/sidebar/0705.png'"><img src="../img/sidebar/0705<?if($mode=="5")echo"_over";?>.png" name="sidebar05" id="sidebar05" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=6&code=<?=$code?>" onMouseOver="sidebar06.src='../img/sidebar/0706_over.png'" onMouseOut="sidebar06.src='../img/sidebar/0706.png'"><img src="../img/sidebar/0706<?if($mode=="6")echo"_over";?>.png" name="sidebar06" id="sidebar06" /></a></td></tr>
<?} else if($code=="8") { ?>  
     <!--menu08 Material-->
     <tr><td class="sidebar_menu"><a href="javascript:go_08_01();" onMouseOver="sidebar01.src='../img/sidebar/0801_over.png'" onMouseOut="sidebar01.src='../img/sidebar/0801.png'"><img src="../img/sidebar/0801.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="javascript:go_08_02();" onMouseOver="sidebar02.src='../img/sidebar/0802_over.png'" onMouseOut="sidebar02.src='../img/sidebar/0802.png'"><img src="../img/sidebar/0802.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="javascript:go_08_03();" onMouseOver="sidebar03.src='../img/sidebar/0803_over.png'" onMouseOut="sidebar03.src='../img/sidebar/0803.png'"><img src="../img/sidebar/0803.png" name="sidebar03" id="sidebar03" /></a></td></tr>

<?} else if($code=="12") { ?>  
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=1&code=<?=$code?>" onMouseOver="sidebar01.src='../img/sidebar/1201_over.png'" onMouseOut="sidebar01.src='../img/sidebar/1201<?if($mode=="1")echo"_over";?>.png'"><img src="../img/sidebar/1201.png" name="sidebar01" id="sidebar01" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=2&code=<?=$code?>" onMouseOver="sidebar02.src='../img/sidebar/1202_over.png'" onMouseOut="sidebar02.src='../img/sidebar/1202<?if($mode=="2")echo"_over";?>.png'"><img src="../img/sidebar/1202.png" name="sidebar02" id="sidebar02" /></a></td></tr>
     <tr><td class="sidebar_menu"><a href="/product/list.php?mode=3&code=<?=$code?>" onMouseOver="sidebar03.src='../img/sidebar/1203_over.png'" onMouseOut="sidebar03.src='../img/sidebar/1203<?if($mode=="3")echo"_over";?>.png'"><img src="../img/sidebar/1203.png" name="sidebar03" id="sidebar03" /></a></td></tr>

<?}?>

<?php include "../inc/sidebar_bottom.php"; ?>
    </table>
		<!--//sidebar-->
		</td>
    <td class="sidebar-e">&nbsp;</td>
		<!--contents-->
    <td valign="top" class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td height="30">&nbsp;</td>
     </tr>
     <tr>
      <td class="border-b"><span class="list_tit"><?=$ARR_BOARD_TYPE[$mode]?></span></td>
     </tr>
     <tr>
      <td align="center" class="view_thumb">
	  <table border="0" cellspacing="0" cellpadding="0">
       <tr>
        <td colspan="2" align="left" class="view_tit"><?=$row_board[title]?></td>
       </tr>
       <tr>
        <td rowspan="2"><img src="<?echo"$HOME_PATH/$tablefile/$row_board[fileadd1_name]";?>" width="476" height="476" id='photo'></td>
        <td height="230" align="left" class="view_cont01">- Code : <?=$row_board[title1]?><br>- Size : <?=$row_board[title2]?><br>- 원산지 : <?=$row_board[title3]?><br>
		<?if($row_board[title4]){?>- 판매가 : <?=$row_board[title4]?><br><?}?>
		<?if($row_board[title5]){?>- 할인가 : <?=$row_board[title5]?><br><?}?>
		
		</td>
       </tr>
       <tr>
        <td valign="bottom">
		<table border="0" cellspacing="8" cellpadding="0">
         <tr>		 
          <td width="88" height="88" ><?if($row_board[fileadd1_name]){?><img src="<?echo"$HOME_PATH/$tablefile/$row_board[fileadd1_name]";?>" width="88" height="88"  onmouseover="javascript:document.getElementById('photo').src='<?echo"$HOME_PATH/$tablefile/$row_board[fileadd1_name]";?>'"><?}?></td>

          <td width="88"><?if($row_board[fileadd2_name]){?><img src="<?echo"$HOME_PATH/$tablefile/$row_board[fileadd2_name]";?>" width="88" height="88" onmouseover="javascript:document.getElementById('photo').src='<?echo"$HOME_PATH/$tablefile/$row_board[fileadd2_name]";?>'"><?}?></td>
         </tr>
         <tr>
          <td width="88" height="88" ><?if($row_board[fileadd3_name]){?><img src="<?echo"$HOME_PATH/$tablefile/$row_board[fileadd3_name]";?>" width="88" height="88" onmouseover="javascript:document.getElementById('photo').src='<?echo"$HOME_PATH/$tablefile/$row_board[fileadd3_name]";?>'"><?}?></td>
          <td width="88"><?if($row_board[fileadd4_name]){?><img src="<?echo"$HOME_PATH/$tablefile/$row_board[fileadd4_name]";?>" width="88" height="88" onmouseover="javascript:document.getElementById('photo').src='<?echo"$HOME_PATH/$tablefile/$row_board[fileadd4_name]";?>'"><?}?></td>
         </tr>
         <!--
         <tr>
          <td><img src="../img/sample/16.jpg" width="88" height="88"></td>
          <td><img src="../img/sample/17.jpg" width="88" height="88"></td>
         </tr>
         -->
        </table></td>
       </tr>
      </table></td>
     </tr>
     <tr>
      <td class="border-b"><span class="list_tit">Detail View</span></td>
     </tr>
     <tr>
      <td align="center" class="view_detail">
	  <?
		if($row_board[tegtype]=="N") {
			$row_board[content] = nl2br($row_board[content]);
		}

		$row_board[content] = stripslashes($row_board[content]);
	  ?>
	  <?=$row_board[content]?>	  
	  
	  </td>
     </tr>
     <tr>
      <td align="center" class="last_border"><a href="list.php?mode=<?=$mode?>&code=<?=$code?>&page=<?=$page?>"><img src="../img/button/list.gif"></a></td>
     </tr>
    </table></td>
    <!--//contents-->
   </tr>
  </table>
	</td>
 </tr>
</table>
<?php include "../inc/footer.php"; ?>