<?php
@extract($_GET);
@extract($_POST);

    $get_sdate = escape_string($_REQUEST['sdate']);
    $get_city  = escape_string($_REQUEST['city_1']);
    $get_county= escape_string($_REQUEST['county_1']);
    $get_field = escape_string($_REQUEST['find_field']);
    $get_word  = escape_string($_REQUEST['find_word'],'1');
    $get_ordby = escape_string($_REQUEST['ordby']);
    if(empty($get_ordby)){ $get_ordby = escape_string($_REQUEST['find_ordby']); }
	$get_viewtype = escape_string($_REQUEST['find_viewtype']);

    $get_page  = escape_string($_GET['page']);
    $get_plist = escape_string($_REQUEST['plist']);

	$pagePerBlock = "10";
    empty($get_plist) ? $pagesize = "20" :  $pagesize = $get_plist; /// 페이지출력수
    empty($get_page) ? $page = 1 : $page = $get_page;  /// 페이지번호

    $pageurl = $_SERVER['PHP_SELF'];
    $perpage = ($page-1) * $pagesize;
    $search = "plist=".$get_plist."&find_field=".$get_field."&find_word=".$get_word."&find_state=".$find_state."&find_ordby=".$get_ordby."&conf=".$conf."&get_viewtype=".$viewtype;

    ///정렬
    if(empty($get_ordby)){
        $ORDER_BY = "";
    }else{
        $ORDER_BY = str_replace("__"," ",$get_ordby).",";
     }

    ///검색정보
    $where_add ="";

    if(!empty($get_field) && !empty($get_word)){
        $where_add .= " AND ".$get_field." like '%".$get_word."%'";
    }

    if(!empty($get_sdate) && !empty($get_edate)){
		//날자검색
        $where_add .= " AND substring(reg_date,1,10) between '".$get_sdate."' AND '".$get_edate."'";
    }

    if(!empty($get_viewtype)){
		//상태정보
        $where_add .= " AND viewtype = '".$get_viewtype."'";
    }

     /// 갯수뽑기용 쿼리
    $query = "SELECT * FROM  $tablename  WHERE 1 ".$where_add." ORDER BY ".$ORDER_BY." reg_date DESC";
	//echo "$query /<br>";
    $result_cnt = $db->fetch_array( $query );
    $total_num = count($result_cnt) ;

    if(!empty($total_num)){
        //연결 URL, 총번호, 한페이지갯수, 최대페이지번호, 현재페이지, 서치
        $pageNavi = $common->paging( $pageurl, $total_num, $pagesize, $pagePerBlock, $page, $search);
        $pageNaviHTML = '<div class="paging-box"><ul>'.$pageNavi.'</ul></div>'; ///페이징

        //목록 출력 적용
        $limit = "limit $perpage, $pagesize";
        $numbers = $total_num - $perpage;

    // 전체 쿼리에 제한 걸기
    $query = $query ." ".$limit;
	//echo "$query ///<br>";

        $result = $db->fetch_array( $query );
        $rcount = count($result) ;
    }
?>

       <!-- 본문컨텐츠부분 시작 -->
      <br />
	  <form name="listform" method="post"> 	
      <table width="880" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="10"><img src="img/admin_12.gif" /></td>
		  <td width="33" align="center" background="img/admin_14.gif"><input type="checkbox" name="allCheck" value="all" onclick="checkall(this.form)"></td>
          <td width="66" align="center" background="img/admin_14.gif"><font  class="T4">번호</font></td>
          <td align="center" background="img/admin_14.gif"><font  class="T4">제목</font></td>
          <td width="105" align="center" background="img/admin_14.gif"><font  class="T4">등록일</font></td>
          <td width="10"><img src="img/admin_13.gif" /></td>
        </tr>
	<?
        for ( $i=0 ; $i<$rcount ; $i++ ) {
		$link_page = "$_SERVER[PHP_SELF]?bmain=write&uid=".$result[$i][uid];
	?>

        <tr>
          <td height="33">&nbsp;</td>
		  <td align="center"><input type="checkbox" name="chklist" class=border value="<?=$result[$i][uid]?>"></td>
          <td align="center"><?=$numbers?></td>
          <td><a href="<?=$link_page?>" class="L4"><?=$row_board_mode?><?=$result[$i][title]?></a></td>
          <td align="center"><a href="<?=$link_page?>"><?=substr($result[$i][reg_date],0,10)?></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="1" colspan="7" bgcolor="#ebebeb"></td>
        </tr>
	<?
		$numbers--; //paging에 따른 번호
		} //end for ?>         
        <tr> 
          <td height="1" colspan="7" bgcolor="#b1b1b1"></td>
        </tr>
      </table>
	  </form>
      <br />
      <br />
      <table width="880" height="25" border="0" cellpadding="0" cellspacing="0">
        <tr>
		  <td width="55"><!-- 삭제 --><a href="javascript:select_member_change('board_delete','boardok.php?conf=<?=$conf?>&formmode=delete_all');"><img src="./img/btn_7.gif"  border="0" alt='삭제' /></a></td>
          <td align=center><?=$pageNaviHTML;?></td>
          <td width="55"><a href="<?echo"$_SERVER[PHP_SELF]?bmain=write"?>"><img src="img/btn_3.gif" width="55" height="25" border="0" /></a></td>
        </tr>
      </table>
      <br />
      <br />

	  <form method="POST" action="?" id="searchForm">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="img/admin_28.gif">
        <tr>
          <td width="1%"><img src="img/admin_27.gif" width="20" height="53" /></td>
          <td width="98%" valign="top">
			<table width="317" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
				
                <td width="67" height="42">
					<select name="find_field" class="FORM3">
						<option value="title" <?=($get_field=="title"  )?"selected":"";?> >제목</option>
					</select>
                </td>
                <td width="203"><input name="find_word" type="text" size="30" class="FORM1" value="<?=$get_word;?>" />
                </td>
                <td width="47"><input type="image" src="img/admin_29.gif" border="0" /></td>
              </tr>
          </table></td>
          <td width="1%"><img src="img/admin_26.gif" width="20" height="53" /></td>
        </tr>
      </table>

		<input type="hidden" name="plist">
		<input type="hidden" name="ordby">
		<input type="hidden" name="conf" value="<?=$conf?>"><!-- 환경설정파일  -->
	</form>


	<SCRIPT type="text/javascript">
		$(document).ready(function(){
			//한페이지에 커서
			$('select[name="selectRow"]').val("<?=$pagesize;?>").attr("selected", "selected");

			//한페이지에 검색폼으로 값보내기
			$('select[name="selectRow"]').change(function(){
				var selectRowVal = $(this).val();
				$('input[name="plist"]').val(selectRowVal);
				$("#searchForm").submit();
			});
	
		});
	</SCRIPT>
