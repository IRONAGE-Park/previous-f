
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
?>

<div class="quick-b-box" id="quick" style="top:600px; right:20px;">



  <div class="quick-box">
    <div class="quick-con">

      <div class="quick-top">
        <h5 class="quick-title" style="margin: 0;">오늘본 상품</h5>
      </div>

      <div class="quick-content">
        <ul class="bxslider">
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>
	
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>
          
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="quick-img-box">
                <img src='/img/ex-01.jpg' alt="">
              </div>
            </a>
          </li>


        </ul>
      </div>

       <div class="quick-top-go">
        <a href="#header"><img src="/img/quick-top-btn.png" alt="최상단 이동"></a>
      </div> 
    </div>
  </div>

</div>


<!--footer-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td class="footer" align="center"><table width="1150" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="200"><a href="javascipt:go_main()"><img src="../img/footer/logo.png" alt="logo"></a></td>
    <!--<td align="left"><a href="#" class="footer_f01">&middot; 회사위치</a><a href="#" class="footer_f01">&middot; 서비스이용약관</a><a href="#" class="footer_f01">&middot; 개인보호정책</a></td>-->
    <td width="950" class="footer_f02">경기도 남양주시 진전읍 내각1로73번안길 6, 104호&nbsp;&nbsp;&nbsp;TEL.070-7844-1701~2&nbsp;&nbsp;&nbsp;FAX. 031-527-1703<br>
    Copyright ⓒ 2014 the F.com. All Right Reserved.</td>
   </tr>
  </table></td>
 </tr>
</table>
<!--//footer-->
</body>
</html>



