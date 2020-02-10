
<?php

    $get_field = escape_string($_REQUEST['find_field']);
    $get_word  = escape_string($_REQUEST['find_word'],'1');
    $get_ordby = escape_string($_REQUEST['ordby']);
    $get_viewtype = escape_string($_REQUEST['find_viewtype']);

    $get_page  = escape_string($_GET['page']);
    $get_plist = escape_string($_REQUEST['plist']);

    $pagePerBlock = "10";
    empty($get_plist) ? $pagesize = "16" :  $pagesize = $get_plist; /// 페이지출력수
    empty($get_page) ? $page = 1 : $page = $get_page;  /// 페이지번호

    $pageurl = $_SERVER['PHP_SELF'];
    $perpage = ($page-1) * $pagesize;
    $search = "plist=".$get_plist."&find_field=".$get_field."&find_word=".$get_word."&find_state=".$find_state."&find_ordby=".$get_ordby."&conf=".$conf."&code=".$code."&mode=".$mode;


    ///검색정보
    $where_add ="";

    if(!empty($get_field) && !empty($get_word)){
        $where_add .= " AND ".$get_field." like '%".$get_word."%'";
    }

     /// 갯수뽑기용 쿼리
    $query = "SELECT * FROM  $tablename  WHERE 1 and viewtype!='N' $w_sql and mode='$mode' ".$where_add." ORDER BY ".$ORDER_BY." reg_date DESC";
	//echo "$query /<br>";
    $result_cnt = $db->fetch_array( $query );
    $total_num = count($result_cnt) ;

    if(!empty($total_num)){
        //연결 URL, 총번호, 한페이지갯수, 최대페이지번호, 현재페이지, 서치
        $pageNavi = $common->paging_new( $pageurl, $total_num, $pagesize, $pagePerBlock, $page, $search);
        $pageNaviHTML = $pageNavi; ///페이징

        //목록 출력 적용
        $limit = "limit $perpage, $pagesize";
        $numbers = $total_num - $perpage;

    // 전체 쿼리에 제한 걸기
    $query = $query ." ".$limit;
	//echo "$query ///<br>";

        $result = $db->fetch_array( $query );
        $rcount = count($result) ;
    }
	$totalNumOfPage = ceil($total_num/$pagesize);
?>


	  <table width="100%" border="0" cellspacing="0" cellpadding="0">

	<?
        for ( $i=0 ; $i<$rcount ; $i++ ) {		
			
		if($tablename=="tb_main") {
			$link_page = "#";
		} else {
			$link_page = "view.php?uid=".$result[$i][uid]."&mode=".$result[$i][mode]."&code=$code&page=$page";
		}

		if($MEMOUSETYPE=="Y") {
			#### 댓글 사용하는 경우 갯수 조회 ########
			$query_tot = "SELECT uid FROM  $memo_tablename  WHERE board_uid='".$result[$i][uid]."'";			
			$result_memo_count = $db->num_rows( $query_tot );
			if($result_memo_count) $result_memo_count = "(".$result_memo_count.")"; else $result_memo_count="";
		}

		if($MODEUSETYPE=="Y"){	//분류사용인경우
			$row_board_mode = "[".$ARR_BOARD_TYPE[$result[$i][mode]]."] ";
		}

		$today = date("Y-m-d");

		$my_fileadd_name = $result[$i][fileadd_name];
	?>
	<? 		
		if($td == 0 ) { 
			echo("<tr> ");
		}
		if(($td%4) == 0) {
			echo("<tr>  ");
		} 		
	?>
        <td valign="top">
			<table width="200" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<a href="<?=$link_page?>">
						<? 
						if($my_fileadd_name) {
							echo "<img src='$HOME_PATH/$tablefile/$my_fileadd_name' border=0 height=200 width='200'></a></td>";
							} else {
							echo "<img src=$HOME_PATH/Bimg/no_image.gif border=0  height=200 width='200'></a></td>";
							}
						?>
					
				</tr>
				<tr>
					<td style="padding:10px 0 60px 0" align="center">
						<a href="<?=$link_page?>"><?=$common->cut_string($result[$i][title],43)?></a>
					</td>
				</tr>
			</table>
		</td>
        <td width="10"></td>

    
	<?
		$td += 1;
		if($td == 0) {
			echo("</tr> ");
		}
		if(($td%4) == 0) {
			echo("</tr>");
		} 

	?>

	<?
	$numbers--; //paging에 따른 번호
	}?>


      </table></td>
     </tr>
     <tr>
      <td align="center" class="last_border">
		  <!--pagenum-->
			<table border="0" cellspacing="8" cellpadding="0">
			 <tr>		
				<?=$pageNaviHTML;?>
			</tr>
			</table>
		  <!--//pagenum-->
	   </td>
     </tr>
    </table>
	