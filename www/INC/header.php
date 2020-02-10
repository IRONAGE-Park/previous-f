<?php
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/get_session.php");
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/dbConn.php");
    require_once($_SERVER[DOCUMENT_ROOT]."/INC/Function.php");
    require_once $_SERVER[DOCUMENT_ROOT]."/INC/arr_data.php";

    require_once($_SERVER[DOCUMENT_ROOT]."/INC/func_other.php");
	require_once($_SERVER[DOCUMENT_ROOT]."/INC/down.php");			//파일 다운로드

$url=$_SERVER["PHP_SELF"];
$file_arr=explode("/",$url);
$file_path=$file_arr[sizeof($file_arr)-1];
$file_path_1=$file_arr[sizeof($file_arr)-2];
//echo "$file_path /";
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

	<script src="/js/lib/jquery-scrolltofixed.js"></script>
	<script src="/js/lib/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			var mainSlider = {
			    init: function() {
			        this.slider_01();
			    },
			    slider_01: function() {
			        $('.quick-content .bxslider').bxSlider({
			            mode: 'vertical',    //horizontal, fade, vertical
			            captions: true,
			            auto: false,
			            autoControls: false,
			            controls: true,
			            startText: '재생하기',
			            stopText: '멈추기',
			            autoHover:true,
			            touchEnabled:true,  //스크린 손가락 터치
			            autoControlsCombine:true,  //재생하기와 멈추기 버튼 번갈아가면서 동작
			            pager:false,
			            minSlides: 4,
                  		    maxSlides: 4,
                  		    moveSlides: 1,
                  		    infiniteLoop:false
			            
			        });
			    }
			};

			mainSlider.init(); //메인슬라이드
		});
	</script>
	
<!-- AceCounter Log Gathering Script V.7.5.2013010701 --><!--2015.10.14삽입-->
<script language='javascript'>
	var _AceGID=(function(){var Inf=['dgc15.acecounter.com','8080','BP5N39909814114','CW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src =( location.protocol=="https:"?"https://"+Inf[0]:"http://"+Inf[0]+":"+Inf[1]) +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
	var _AceCounter=(function(){var G=_AceGID;if(G.o!=0){var _A=G.val[G.o-1];var _G=( _A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];	var _U=( _A[5]).replace(/\,/g,'_');var _S=((['<scr','ipt','type="text/javascr','ipt"></scr','ipt>']).join('')).replace('tt','t src="'+location.protocol+ '//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime())+'" t');document.writeln(_S); return _S;} })();
</script>
<noscript><img src='http://dgc15.acecounter.com:8080/?uid=BP5N39909814114&je=n&' border='0' width='0' height='0' alt=''></noscript>	
<!-- AceCounter Log Gathering Script End --> 
</head>

<body>


<!-- 오늘쪽 퀵메뉴 ======================= -->
<script>
// dom 이 로드된 다음 실행해야할 스크립트
$(document).ready(function() {    
   // quick 메뉴 픽시드 효과 주기
   $('#quick').scrollToFixed();
});
</script>
<? 
$view_arr = explode(",",$S_USER_ID_1); 
$arr_count = count($view_arr);
for($c=$arr_count;0<=$c;$c--) {
	if($view_arr[$c]) {
	$view_arr_1 .= $view_arr[$c].",";
	}
}

$code_arr = explode(",",$S_USER_CODE); 
$code_count = count($code_arr);
for($c=$code_count;0<=$c;$c--) {
	if($code_arr[$c]) {
	$code_arr_1 .= $code_arr[$c].",";
	}
}

?>


<div style="width:1100px; margin:0 auto; position:relative;">

<?//echo "$S_USER_ID_1 ///// $view_arr_1";?>
<?if($file_path=="index.php") {?>
<div class="quick-b-box" id="quick" style="top:665px; right:-130px;">
<?} else {?>
<div class="quick-b-box" id="quick" style="top:140px; right:-130px;">
<?}?>

  <div class="quick-box">
    <div class="quick-con">

      <div class="quick-top">
        <h5 class="quick-title" style="margin: 0;">오늘본 상품</h5>
      </div>

      <div class="quick-content">
        <ul class="bxslider">

		<?

		//for($c=0;$c<count($view_arr);$c++) {
		$s=1;
		for($c=$arr_count;0<=$c;$c--) {
		if($view_arr[$c]!="$view_img") {
			$view_img = $view_arr[$c];
			$code_img = $code_arr[$c];
			$row_board = get_tb_board($view_arr[$c],"tb_pro");

			if($code_img=="1") {
				$table_code = "pro";
			} else if($code_img=="2") {
				$table_code = "pro1";
			} else if($code_img=="3") {
				$table_code = "pro2";
			} else if($code_img=="4") {
				$table_code = "pro3";
			} else if($code_img=="5") {
				$table_code = "pro4";
			} else if($code_img=="6") {
				$table_code = "pro5";
			} else if($code_img=="12") {
				$table_code = "pro8";
			}

			$link_page = "/product/view.php?uid=".$view_arr[$c]."&code=$code_img";
			  if($row_board[fileadd_name]) {
				  $pro_img = "<img src='/upload/$table_code/".$row_board[fileadd_name]."' width='50' height='50' border=0 alt='".$row_board[pname]."'>";
			  } else {
				  $pro_img = "<img src='/img/product-ex-01.jpg' width='50' height='50'  border=0 alt='".$row_board[pname]."'>";
			  }    
			  

		?>
            <li>
              <a href="<?=$link_page?>">
                <div class="quick-img-box">
                  <?=$pro_img?>
                </div>
                <!-- <p class="mt_05"><?=$common->cut_string($row_board[title],5)?></p> -->
              </a>
            </li>
		<?
		}
		}?>

      
        </ul>
      </div>

       <div class="quick-top-go">
        <a href="#header"><img src="/img/quick-top-btn.png" alt="최상단 이동"></a>
      </div> 
    </div>
  </div>

</div>

</div>
<!-- END 오늘쪽 퀵메뉴 ======================= -->

<a name="header"></a>
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
		     <!--  <td class="gnb"><a href="/product/list.php?mode=1&code=7" onMouseOver="gnb07.src='../img/gnb/gnb07_over.png'" onMouseOut="gnb07.src='../img/gnb/gnb07.png'"><img src="../img/gnb/gnb07.png" alt="Home Furniture" name="gnb07" id="gnb07" /></a></td> -->
		      <td class="gnb"><a href="/product/list.php?mode=1&code=12" onMouseOver="gnb09.src='../img/gnb/gnb09_over.png'" onMouseOut="gnb09.src='../img/gnb/gnb09.png'"><img src="../img/gnb/gnb09.png" alt="ACC" name="gnb09" id="gnb09" /></a></td>
		      <td class="gnb"><a href="/product/list01.php?mode=1&code=8" onMouseOver="gnb08.src='../img/gnb/gnb08_over.png'" onMouseOut="gnb08.src='../img/gnb/gnb08.png'"><img src="../img/gnb/gnb08.png" alt="Material" name="gnb08" id="gnb08" /></a></td>
			   <td class="gnb"><a href="/portfolio/list.php" onMouseOver="gnb10.src='../img/gnb/gnb10_over.png'" onMouseOut="gnb10.src='../img/gnb/gnb10.png'"><img src="../img/gnb/gnb10.png" alt="Material" name="gnb10" id="gnb10" /></a></td>
		     </tr>
		    </table>
			</td>
		 </tr>
		</table>
  </td>
 </tr>
</table>
<!--//gnb-->