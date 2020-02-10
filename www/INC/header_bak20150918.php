<?php
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/get_session.php");
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/dbConn.php");
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/Function.php");
    require_once $_SERVER[DOCUMENT_ROOT]."/INC/arr_data.php";

    require_once($_SERVER[DOCUMENT_ROOT]."/INC/func_other.php");
	require_once($_SERVER[DOCUMENT_ROOT]."/INC/down.php");			//파일 다운로드
?>
<!DOCTYPE html>
<html lang="kr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<title>the F</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<script language="JavaScript" type="text/javascript" src="../js/link.js"></script>
	<script language="JavaScript" type="text/javascript" src="../js/flashWrite.js"></script>
	<!-- <script language="JavaScript" type="text/javascript" src="../js/openlayer.js"></script> -->
	<!-- <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
	<script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>  
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script language="JavaScript" type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
	<script language="JavaScript" type="text/javascript" src="../js/slider3.js"></script>

	<script  type="text/javascript" src="<?=$PATH_INFO?>/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=$PATH_INFO?>/js/head.js"></script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--gnb-->
 <tr>
  <td height="170" align="center">
		<table width="1100" border="0" cellspacing="0" cellpadding="0">
		 <tr>
			<td height="134" align="left" class="gnb-bg01"><a href="javascript:go_main()"><img src="../img/gnb/logo.png" alt="logo" /></a></td>
		  <td align="right" valign="top" class="gnb-bg01" style="padding:16px 48px 0 0">
				<table border="0" cellspacing="0" cellpadding="0">
		 		 <tr>
		       <td style="padding:0 20px 0 0"><a href="javascript:go_09();" onMouseOver="top01.src='../img/gnb/top01_over.png'" onMouseOut="top01.src='../img/gnb/top01.png'"><img src="../img/gnb/top01.png" alt="About the F" name="top01" id="top01" /></a></td>
		       <td style="padding:0 20px 0 0"><a href="javascript:go_09_01();" onMouseOver="top02.src='../img/gnb/top02_over.png'" onMouseOut="top02.src='../img/gnb/top02.png'"><img src="../img/gnb/top02.png" alt="Portfolio" name="top02" id="top02" /></a></td>
		       <td><a href="javascript:go_09_02();" onMouseOver="top03.src='../img/gnb/top03_over.png'" onMouseOut="top03.src='../img/gnb/top03.png'"><img src="../img/gnb/top03.png" alt="QnA" name="top03" id="top03" /></a></td>
		      </tr>
		    </table>
			</td>
		 </tr>
		 <tr>
		  <td height="36" colspan="2" class="gnb-bg02">
				<table width="1100" border="0" cellspacing="0" cellpadding="0">
		     <tr>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=1" onMouseOver="gnb01.src='../img/gnb/gnb01_over.png'" onMouseOut="gnb01.src='../img/gnb/gnb01.png'"><img src="../img/gnb/gnb01.png" alt="Chair" name="gnb01" id="gnb01" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=2" onMouseOver="gnb02.src='../img/gnb/gnb02_over.png'" onMouseOut="gnb02.src='../img/gnb/gnb02.png'"><img src="../img/gnb/gnb02.png" alt="Sofa" name="gnb02" id="gnb02" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=3" onMouseOver="gnb03.src='../img/gnb/gnb03_over.png'" onMouseOut="gnb03.src='../img/gnb/gnb03.png'"><img src="../img/gnb/gnb03.png" alt="Table" name="gnb03" id="gnb03" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=4" onMouseOver="gnb04.src='../img/gnb/gnb04_over.png'" onMouseOut="gnb04.src='../img/gnb/gnb04.png'"><img src="../img/gnb/gnb04.png" alt="Office" name="gnb04" id="gnb04" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=5" onMouseOver="gnb05.src='../img/gnb/gnb05_over.png'" onMouseOut="gnb05.src='../img/gnb/gnb05.png'"><img src="../img/gnb/gnb05.png" alt="Outdoor" name="gnb05" id="gnb05" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=6" onMouseOver="gnb06.src='../img/gnb/gnb06_over.png'" onMouseOut="gnb06.src='../img/gnb/gnb06.png'"><img src="../img/gnb/gnb06.png" alt="Storage" name="gnb06" id="gnb06" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=7" onMouseOver="gnb07.src='../img/gnb/gnb07_over.png'" onMouseOut="gnb07.src='../img/gnb/gnb07.png'"><img src="../img/gnb/gnb07.png" alt="Home Furniture" name="gnb07" id="gnb07" /></a></td>
		      <td class="gnb"><a href="/product/list.php?mode=1&code=12" onMouseOver="gnb09.src='../img/gnb/gnb09_over.png'" onMouseOut="gnb09.src='../img/gnb/gnb09.png'"><img src="../img/gnb/gnb09.png" alt="ACC" name="gnb09" id="gnb09" /></a></td>
		      <td class="gnb"><a href="/product/list01.php?mode=1&code=8" onMouseOver="gnb08.src='../img/gnb/gnb08_over.png'" onMouseOut="gnb08.src='../img/gnb/gnb08.png'"><img src="../img/gnb/gnb08.png" alt="Material" name="gnb08" id="gnb08" /></a></td>
		     </tr>
		    </table>
			</td>
		 </tr>
		</table>
  </td>
 </tr>
</table>
<!--//gnb-->