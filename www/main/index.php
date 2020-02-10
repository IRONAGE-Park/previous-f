<?php include "../inc/header.php"; ?>
<?
#### 레이어 팝업 창 ##########
//$pop_wsql = " and mode='1'";
include "../include_popup.php";
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td>

	<div class="visual-wrap">
		<div class="visual-posi-01">
			<img src="../img/main/img1.jpg" alt="">
		</div>
		<div class="visual-posi-02">
			<img src="../img/main/img2.jpg" alt="">
		</div>
		<div class="visual-posi-03">
			<img src="../img/main/img3.jpg" alt="">
		</div>
	</div>
  </td>
 </tr>
<!--new products-->
 <tr>
  <td class="newp" align="center">
	<table width="1100" border="0" cellspacing="0" cellpadding="0">
   <colgroup>
    <col width="204"/><col width="20"/><col width="204"/><col width="20"/><col width="204"/><col width="20"/><col width="204"/><col width="20"/><col width="204"/><col width="20"/><col width="204"/>
   </colgroup>
   <tr>
    <td colspan="9" style="padding:0 0 40px 0" align="left"><img src="../img/main/text01.png"></td>
    </tr>

<?

    //$query = "select uid,title,fileadd_name,reg_date,mode,'tb_pro' as tablename from tb_pro  where viewtype!='N' union select uid,title,fileadd_name,reg_date,mode,'tb_pro1' as tablename from tb_pro1 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro2' as tablename  from tb_pro2 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro3' as tablename  from tb_pro3 where viewtype!='N'   union select uid,title,fileadd_name,reg_date,mode,'tb_pro4' as tablename  from tb_pro4 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro5' as tablename  from tb_pro5 where viewtype!='N' union select uid,title,fileadd_name,reg_date,mode,'tb_pro6' as tablename  from tb_pro6 where viewtype!='N' union select uid,title,fileadd_name,reg_date,mode,'tb_main' as tablename  from tb_main where viewtype!='N'  ORDER BY reg_date DESC limit 10";

	$query = "select uid,title,fileadd_name,reg_date,mode,'tb_pro' as tablename from tb_pro  where viewtype!='N' union select uid,title,fileadd_name,reg_date,mode,'tb_pro1' as tablename from tb_pro1 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro2' as tablename  from tb_pro2 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro3' as tablename  from tb_pro3 where viewtype!='N'   union select uid,title,fileadd_name,reg_date,mode,'tb_pro4' as tablename  from tb_pro4 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro5' as tablename  from tb_pro5 where viewtype!='N' union select uid,title,fileadd_name,reg_date,mode,'tb_pro6' as tablename  from tb_pro6 where viewtype!='N'  union select uid,title,fileadd_name,reg_date,mode,'tb_pro8' as tablename  from tb_pro8 where viewtype!='N'   ORDER BY reg_date DESC limit 10";
	//echo "$query /<br>";
    $result = $db->fetch_array( $query );
    $rcount = count($result) ;
	for ( $i=0 ; $i<$rcount ; $i++ ) {		

	$my_fileadd_name = $result[$i][fileadd_name];
	$aa = $result[$i][tablename];

	if($result[$i][tablename]=="tb_pro") {
		$tablefile = "pro";
		$code = "1";
	} else if($result[$i][tablename]=="tb_pro1") {
		$tablefile = "pro1";
		$code = "2";
	} else if($result[$i][tablename]=="tb_pro2") {
		$tablefile = "pro2";
		$code = "3";
	} else if($result[$i][tablename]=="tb_pro3") {
		$tablefile = "pro3";
		$code = "4";
	} else if($result[$i][tablename]=="tb_pro4") {
		$tablefile = "pro4";
		$code = "5";
	} else if($result[$i][tablename]=="tb_pro5") {
		$tablefile = "pro5";
		$code = "6";
	} else if($result[$i][tablename]=="tb_pro6") {
		$tablefile = "pro6";
		$code = "7";
	} else if($result[$i][tablename]=="tb_pro8") {
		$tablefile = "pro8";
		$code = "12";
	} else if($result[$i][tablename]=="tb_main") {
		$tablefile = "main";
		$code = "8";
	}

	if($tablefile=="main") {
		$link_page = "/product/list01.php?uid=".$result[$i][uid]."&mode=".$result[$i][mode]."&code=$code";
	} else {
		$link_page = "/product/view.php?uid=".$result[$i][uid]."&mode=".$result[$i][mode]."&code=$code";
	}
?>
	<? 		
		if($td == 0 ) { 
			echo("<tr> ");
		}
		if(($td%5) == 0) {
			echo("<tr>  ");
		} 		
	?>
    <td valign="top">
		<table width="204" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><a href="<?=$link_page?>">
				<? 
				if($my_fileadd_name) {
					echo "<img src='$HOME_PATH/upload/$tablefile/$my_fileadd_name' border=0 height=204 width='204'></a></td>";
					} else {
					echo "<img src=$HOME_PATH/Bimg/no_image.gif border=0  height=204 width='204'></a></td>";
					}
				?>
				
			</tr>
			<tr>
				<td style="padding:20px 0 70px 0" align="center"><a href="<?=$link_page?>"><?=$common->cut_string($result[$i][title],43)?></a></td>
			</tr>
		</table>
	</td>
	<?
		$td += 1;
		if($td == 0) {
			echo("</tr> ");
		}
		if(($td%5) == 0) {
			echo("</tr>");
		} 

	?>

	<?
	$numbers--; //paging에 따른 번호
	}?>


  </table>
  
  
  </td>
 </tr>
<!--//new products-->
<!--portfolio-->
 <tr>
  <td class="port" align="center"><table width="1100" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td rowspan="2" align="left" valign="top">
		<table border="0" cellspacing="0" cellpadding="0">
     <colgroup>
      <col width="234"/><col width="234"/><col width=""/>
     </colgroup>
     <tr>
      <td colspan="3" style="padding:0 0 10px 0"><a href="javascript:go_09_01()"><img src="../img/main/text02.png" alt="Portfolio"></a></td>
     </tr>
     <tr>
<?
    $query1 = "SELECT * FROM  tb_board1  WHERE 1 and viewtype!='N'  ORDER BY reg_date DESC limit 3";
    $result1 = $db->fetch_array( $query1 );
    $rcount1 = count($result1) ;
       for ( $i=0 ; $i<$rcount1; $i++ ) {		
		   $my_fileadd_name = $result1[$i][fileadd_name];
		   $result1[$i][content] = strip_tags($result1[$i][content]);
		   $link_page = "/portfolio/list.php?bmain=view&uid=".$result1[$i][uid]."&mode=".$result1[$i][mode]."&code=$code";
?>
      <td align="left" valign="top">
		<table width="191" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
				<? 
				if($my_fileadd_name) {
					echo "<img src='$HOME_PATH/upload/board1/$my_fileadd_name' border='0' height='131' width='191'></a></td>";
					} else {
					echo "<img src='$HOME_PATH/Bimg/no_image.gif' border='0'  height='131' width='191'></a></td>";
					}
				?>		
			</tr>
			<tr>
				<td height="50"><a href="<?=$link_page?>" class="main01"><?=$common->cut_string($result1[$i][title],13)?></a></td>
			</tr>
			<tr>
				<td><?=$common->cut_string($result1[$i][content],60)?></td>
			</tr>
			<tr>
				<td height="40"><a href="<?=$link_page?>" class="main02">자세히보기 &gt;</a></td>
			</tr>
		</table>
	  </td>
<?
	$numbers--; //paging에 따른 번호
	}
?>



     </tr>
    </table></td>
    <td width="330" align="left" valign="top">
		<table width="330" border="0" cellspacing="0" cellpadding="0">
     <colgroup>
      <col width="242"/><col width="88"/>
     </colgroup>
     <tr>
      <td colspan="2" style="padding:0 0 10px 0"><a href="javascript:go_09_02()"><img src="../img/main/text03.png" alt="QnA"></a></td>
      </tr>
<?
    $query1 = "SELECT * FROM  tb_board  WHERE 1 and viewtype!='N'  ORDER BY reg_date DESC limit 5";
    $result1 = $db->fetch_array( $query1 );
    $rcount1 = count($result1) ;
       for ( $i=0 ; $i<$rcount1; $i++ ) {		
		   $my_fileadd_name = $result1[$i][fileadd_name];
		   $result1[$i][content] = strip_tags($result1[$i][content]);
		   $link_page = "/qna/list.php?bmain=view&uid=".$result1[$i][uid]."&mode=".$result1[$i][mode]."&code=$code";
?>
     <tr>
      <td><a href="<?=$link_page?>" class="main03">&middot; <?=$common->cut_string($result1[$i][title],33)?></a></a></td>
      <td align="right" class="f14 c666"><?=substr($result1[$i][reg_date],0,10)?></td>
     </tr>
<?
	$numbers--; //paging에 따른 번호
	}
?>   
    </table></td>
   </tr>
   <tr>
    <td style="padding:50px 0 0 0"><img src="../img/main/text04.png"></td>
   </tr>
  </table></td>
 </tr>
<!--//portfolio-->
</table>
<?php include "../inc/footer.php"; ?>
