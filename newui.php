<?
    include('check.php');
    
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>

@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);
@import url(http://fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);
*{margin:0;padding:0}

#root{
	font-family: 'Nanum Gothic', serif;
	margin:auto;
	width:100%;
	height:100%;
	background-color:#F4F4F4;
}

/*------------     MENU     ------------*/
#menu{
	font-family: 'Nanum Gothic', serif;
	font-size:14px;
	background-color:#404040;
	color:white;
	width:250px;
	height:100%;
	line-height:40px;
	float:left;
}
a:link {text-decoration: none; color: white;}
a:visited {text-decoration: none; color: white;}
a:active {text-decoration: none; color: white;}
a:hover {text-decoration: underline; background-color:#b9c9fe;}
li{padding:5px;}
ul{list-style:none;}
.list{margin:15px;}
/*.menu .hide{display:none;}*/
.hide{padding-left:55px;line-height:20px;}

/*------------      TOP      ------------*/
#top{
	background-color:white;
	width:auto;
	height:25px;
	padding-top:10px;
	text-align:right;
	padding-right:50px;
}
a.logout:link{color:black;}
a.logout:visited {text-decoration: none; color: black;}
a.logout:active {text-decoration: none; color: black;}
a.logout:hover {text-decoration: underline; background-color:#b9c9fe;}

/*------------    CONTENT    ------------*/
.sub{color:white;width:700px; 	font-family: 'Nanum Gothic', serif;
font-size:14px;}
#content{
	padding-top:30px;
	padding-left:270px;
	background-color: #F4F4F4;
	width:auto;
/*	min-width:450px;*/
	height:500px;
}
/*  테이블 스타일  */
.tg{border-collapse: collapse;width:700px; 	font-family: 'Nanum Gothic', serif;}
th{padding:4px;background-color:#2b2b2b;color:white;}
td{padding:4px;text-align:center;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;border-top-width:1px;border-bottom-width:1px;}

.btn {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background-color:#b9c9fe;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #84bbf3;
	display:inline-block;
	cursor:pointer;
	color:#669;
	font-family:Arial;
	font-size:15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
}
.btn:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff));
	background-color:#378de5;
}
.btn:active {
	position:relative;
	top:1px;
}


input{	font-family: 'Nanum Gothic', serif;}
</style>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">

function joinConfirm(theForm){
   var Name = document.a_register_form.Name.value;
   var AccID = document.a_register_form.AccID.value;
   var AccPW = document.a_register_form.AccPW.value;
   var renewDate = document.a_register_form.renewDate.value;


//1. 필수 데이터 입력 여부검증
   if(Name == null | Name.length == 0) {
      alert("장비명을 입력해주시기 바랍니다.");
      document.a_register_form.userName.focus();
      return false;
   }

   if(AccID == null | AccID.length == 0) {
      alert("장비ID를 입력해주시기 바랍니다.");
      document.a_register_form.AccID.focus();
      return false;
   }

   if( AccPW == null |  AccPW.length == 0) {
      alert("비밀번호를 입력해주시기 바랍니다.");
      document.a_register_form.AccPW.focus();
      return false;
   }

   if(renewDate == null | renewDate.length == 0) {
      alert("갱신일을 입력해주시기 바랍니다.");
      document.a_register_form.renewDate.focus();
      return false;
   }
	
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(Name)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    a_register_form.Name.focus();
	return false;
	}
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(AccID)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    a_register_form.AccID.focus();
	return false;
	}
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(AccPW)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    a_register_form.AccPW.focus();
	return false;
	}
} 

function searchValidate(theForm){
	var keyword = document.a_search_form.keyword.value;

	if(keyword == null | keyword.length == 0) {
      alert(" 에 대한 검색결과가 없습니다.");
      document.a_search_form.keyword.focus();
      return false;
    } 

   if ((new RegExp(/[^a-z|^0-9]/gi)).test(keyword)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    a_search_form.keyword.focus();
	return false;
	}
}

function joinValidate(theForm)
{
	var userID = document.u_register_form.userID.value;
	var userPW = document.u_register_form.userPW.value;
	var userPW_confirm = document.u_register_form.userPW_confirm.value;
	var AccessGroup = document.u_register_form.AccessGroup.value;

	//1.필수 입력 데이터 검증
	if(!userID | !userID.length){
		alert("필수입력정보(아이디) 입니다.");
		document.u_register_form.userID.focus();
		return false;
	}
	if(userPW == null | userPW.length == 0){
		alert("필수입력정보(비밀번호) 입니다.");
		document.u_register_form.userPW.focus();
		return false;
	}
	if(userPW_confirm == null | userPW_confirm.length == 0){
		alert("필수입력정보(비밀번호 확인) 입니다.");
		document.u_register_form.userPW_confirm.focus();
		return false;
	}
	if(AccessGroup == null | AccessGroup.length == 0){
		alert("필수입력정보(그룹명) 입니다.");
		document.u_register_form.AccessGroup.focus();
		return false;
	}

	//2. SQL 인젝션 방어
   if ((new RegExp(/[^a-z|^0-9]/gi)).test(userID)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    u_register_form.userID.focus();
	return false;
	}

    if ((new RegExp(/[^a-z|^0-9]/gi)).test(userPW)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    u_register_form.userPW.focus();
	return false;
	}
 
    if ((new RegExp(/[^a-z|^0-9]/gi)).test(userPW_confirm)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    u_register_form.userPW_confirm.focus();
	return false;
	}

}

function searchValidate(theForm){
	var keyword = document.search_form.keyword.value;

	if(keyword == null | keyword.length == 0) {
      alert(" 에 대한 검색결과가 없습니다.");
      document.search_form.keyword.focus();
      return false;
    } 

   if ((new RegExp(/[^a-z|^0-9]/gi)).test(keyword)) {
    alert("특수문자는 입력할 수 없습니다. 다시 입력해주세요."); 
    search_form.keyword.focus();
	return false;
	}
}

//3. 비밀번호와 비밀번호 재입력 일치 여부 검증
function mappingUserpw() {

   var userPW = document.u_register_form.userPW.value;
   var userPW_confirm = document.u_register_form.userPW_confirm.value;
   var displayUserpwElement = document.getElementById("displayUserPW");
   
   // 암호, 암호확인 입력
   if (userPW != null & userPW.length > 0 & userPW_confirm != null & userPW_confirm.length > 0) {
      // 암호, 암호확인 일치
      if (userPW == userPW_confirm) {
         displayUserpwElement.innerHTML = "암호 일치";
      } else { // 암호, 암호확인 불일치
         displayUserpwElement.innerHTML = "암호 불일치";
      }
   }
} 

function mappingUserpwCheck() {
   var takeElementSpan = document.getElementById("displayUserPW");
   var takeTextNode = takeElementSpan.firstChild;
   var mappingMsg = takeTextNode.nodeValue;
   if (mappingMsg == "암호 불일치") {
      document.u_register_form.userPW_confirm.focus();
      document.u_register_form.userPW_confirm.value = "";
      takeElementSpan.innerHTML = "";
   } else {
      takeElementSpan.innerHTML = "";
   }
}

</script>
<script>
/*    // html dom 이 다 로딩된 후 실행된다.
    $(document).ready(function(){
        // menu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $(".menu>a").click(function(){
            var submenu = $(this).next("ul");
 
            // submenu 가 화면상에 보일때는 위로 보드랍게 접고 아니면 아래로 보드랍게 펼치기
            if( submenu.is(":visible") ){
                submenu.slideUp();
            }else{
                submenu.slideDown();
            }
        });
    });*/
</script>
</head>
<body>
<?
	include("dbconfig.php");  //DB연결

	$flag=$_GET[flag];//사용자 구분하는 플래그 1:일반 사용자 2:관리자
	//mode
	$mode=$_REQUEST['mode'];
	$keyword=$_POST[keyword];

	if($_SESSION['login_user']=='admin'){
		$ispermission=1;
	}
	else{
		$ispermission=0;
	}
	
	$scale=8;//한화면 표시 글 수
	$start=0;
	$page=$_GET['page'];
	$ppage=$page-1;
	$npage=$page+1;
	$page_scale=5;//한화면 표지 페이지 수

	$block=$_GET['block'];
	$pblock=$block-1;
	$nblock=$block+1;
	if(!$page) $page=1;
	if(!$block) $block=1;

	$start_page=($block-1)*$page_scale+1;
	$end_page=$start_page+$page_scale-1;

	$limit_num=$scale*($page-1);

	if($flag==1){
		$group=$_SESSION['mygroup'];

		$result = mysql_query("select * from Accounts order by AccNo asc");

		if($_POST[s_select]=="s_name"){
			$sort="Name";
		}
		else if($_POST[s_select]=="s_id"){
			$sort="AccId";
		}


		if($keyword){//키워드
			$query = "select * from Accounts where $sort like '%$keyword%'";
			if($_SESSION['login_user']!='admin'){//관리자가 아닐경우엔 그룹권한 설정
				$query .= " and AccessGroup='$group'";
			}
			$query .= " order by AccNo asc";
		}
		else{
			$query = "select * from Accounts";
			if($_SESSION['login_user']!='admin'){//관리자가 아닐경우엔 그룹권한 설정
				$query .= " where AccessGroup='$group'";
			}
			$query .= " order by AccNo asc";
		}
		$result = mysql_query($query);
		$total_record = mysql_num_rows($result);//전체 글 수
		$query .=" limit $limit_num, $scale";	
		$result = mysql_query($query);
	}
	if($flag==2){
		$result = mysql_query("select * from Users order by userNo asc");

		if($_POST[s_select]=="s_id"){
			$sort="userID";
		}
		else if($_POST[s_select]=="s_group"){
			$sort="AccessGroup";
		}

		if($keyword){
				$result = mysql_query("select * from Users where $sort like '%$keyword%' order by userNo asc");
				$total_record = mysql_num_rows($result);//전체 글 수
				$result = mysql_query("select * from Users where $sort like '%$keyword%' order by userNo asc limit $limit_num, $scale");
		}
		else{
			$result = mysql_query("select * from Users order by userNo asc");
			$total_record = mysql_num_rows($result);//전체 글 수
			$result = mysql_query("select * from Users order by userNo asc limit $limit_num, $scale");
		}
	}
	//$row = mysql_fetch_array($result);



?>

<div id="root">

<div id="menu">
<a href="newui.php?mode=home"><img src="logo.png" height="70px"></a>
<br>
<ul>

	<li class="menu">
		<a class="list" href="newui.php?flag=1"><img src="list.png" height="24px" align="absmiddle"> &nbsp; 계정 관리</a>
		<ul class="hide">
			<li><a href="newui.php?mode=a_register&flag=1">ㄴ 등록</a></li>
			<li><a href="newui.php?mode=a_search&flag=1">ㄴ 검색</a></li>
		</ul>
	</li>
<?
	if($ispermission==1){
?>
	<li class="menu">
		<a class="list" href="newui.php?flag=2"><img src="user.png" height="24px" align="absmiddle"> &nbsp; 사용자 관리</a>
		<ul class="hide">
			<li><a href="newui.php?mode=u_register&flag=2">ㄴ 등록</a></li>
			<li><a href="newui.php?mode=u_search&flag=2">ㄴ 검색</a></li>
		</ul>
	</li>
<?
	}
?>
	<li><a class="list"><img src="signs.png" height="24px" align="absmiddle"> &nbsp; 이력 관리</a>
	</li>
	<li><a class="list"><img src="file.png" height="24px" align="absmiddle"> &nbsp; 게시판 / 자료실</a>	
	</li>
	<li><a class="list"><img src="settings.png" height="24px" align="absmiddle"> &nbsp; 운영 관리</a>
		<ul class="hide">
			<li><a href="newui.php?mode=manual">ㄴ 사용자 매뉴얼</a></li>
			<li><a href="newui.php?mode=manual">ㄴ 관리자 매뉴얼</a></li>
		</ul>
	</li>

</ul>
</div>
<!--##############################                    top                      ##############################-->
<div id="top">

<?



	if($_SESSION['mygroup']=='A')
		echo "인사부";
	else if($_SESSION['mygroup']=='B')
		echo "재무/회계부";
	else if($_SESSION['mygroup']=='C')
		echo "정보/전산부";
	else if($_SESSION['mygroup']=='D')
		echo "생산부";
	else if($_SESSION['mygroup']=='E')
		echo "영업부";
	else
		echo "관리자";

?>


<?=$_SESSION['login_user']?>님  <a href="logout.php" class="logout">로그아웃</a>
</div>

<!--##############################                  content                    ##############################-->
<div id="content">
<?
if($mode=="home"){

include "home.php";
}
else if($mode=="board"){
include "board.php";

}
else{
?>
<table class="sub" bgcolor="#404040" height="50px">
<tr>
<td>

<!--##############################                   저장                    ##############################-->

<?
	if($mode=="save"){

		$Name = $_POST[Name];
        $AccID = $_POST[AccID];
        $AccPW = $_POST[AccPW];
        $AccessGroup = $_POST[AccessGroup];
        $renewDate=$_POST[renewDate];

		$userID = $_POST[userID];
		$userPW = $_POST[userPW];
		$AccessGroup = $_POST[AccessGroup];

		if($flag==1){
			$result = mysql_query("insert into Accounts set Name='$Name', AccID='$AccID', AccPW='$AccPW', AccessGroup='$AccessGroup', renewDate='$renewDate'");
			echo "<script>location.href = 'newui.php?mode=a_register&flag=$flag';</script>";
		}
		if($flag==2){
			$result = mysql_query("insert into Users set userID='$userID', userPW='$userPW', AccessGroup='$AccessGroup'");
			echo "<script>location.href = 'newui.php?mode=u_register&flag=$flag';</script>";
		}

	}
?>
<!--##############################                   등록                    ##############################-->

<?
if($mode=="a_register"){
?>
	<form name="a_register_form" method="post" onsubmit ="return joinConfirm(this)" action="#">
		장비계정명 <input type="text" size="8" name="Name" id="Name" MAXLENGTH="10">
		아이디 <input type="text" size="10" name="AccID" id="AccID" MAXLENGTH="10">
		패스워드 <input type="password" size="10" name="AccPW" id="AccPW" MAXLENGTH="10">
		갱신일 <input type="text" size="10" name="renewDate" id="renewDate">
		<input type="hidden" name="AccessGroup" id="AccessGroup" value="<?=$group?>">
		<input type="hidden" name="mode" value="save">
		<input type="submit" value="register" class="button" onsubmit="joinConfirm()">
	</form>

<?
}
?>
<?
if($mode=="u_register"){
?>
	<form name="u_register_form" method="post" onsubmit="return joinValidate(this)" action="#">
		아이디 <input type="text" size="10" name="userID" id="userID" maxLENGTH="10"> 
		패스워드 <input type="password" size="10" name="userPW" id="userPW" maxLENGTH="10">
		패스워드확인 <input type="password" size="10" name="userPW_confirm" id="userPW_confirm" MAXLENGTH="10" onKeyUP="mappingUserpw()" onBlur="mappingUserpwCheck()" onFocus="mappingUserpw()">
		부서 <select id="AccessGroup" name="AccessGroup">
		<option value="A">인사</option>
		<option value="B">재무/회계</option>
		<option value="C">정보/전산</option>
		<option value="D">생산</option>
		<option value="E">영업</option> 
		</select>
		<input type="submit" value="등록" class="button"><br>
		<span id="displayUserPW">암호확인메세지</span>
		<input type="hidden" name="mode" value="save">
	</form>
<?
}
?>
<!--##############################                 -----                  ##############################-->	
<!--##############################                   검색                    ##############################-->	
<?
	if($mode=="a_search"){
?>	
	<form name="a_search_form" method="post" onsubmit="return searchValidate(this)" action="#">
		<select name="s_select">
			<option value="s_name">장비계정명</option>
			<option value="s_id">아이디</option>
		</select>
		<input type="text" name="keyword" SIZE="8">
		<input type="submit" value="검색">
	</form>
<?
	}
?>
<?
	if($mode=="u_search"){
?>
	<form name="u_search_form" method="post" onsubmit ="return searchValidate(this)" action="#">
	
		<select name="s_select">
			<option value="s_id">아이디</option>
			<option value="s_group">부서</option>
		</select>
		<input type="text" name="keyword" SIZE="8">
		<input type="submit" class="button" value="검색">
	</form>
<?
	}
?>
<!--##############################                 -----                  ##############################-->	
</td></tr>
</table>
<!--##############################                   수정                   ##############################-->
<?
	if($mode=="u_modify"){
		$result = mysql_query("select * from Users where userNo=$_GET[userNo] ");
		$row = mysql_fetch_array($result);

	}
?>
<!--##############################                 -----                  ##############################-->
<!--##############################                  삭제                    ##############################-->
<?
	if($mode=="a_delete"){
		$d_AccNo=	$_GET['AccNo'];

		$result = mysql_query("delete from Accounts where AccNo=$d_AccNo");
		mysql_close();

		echo "<script>location.href = 'newui.php?flag=1';</script>";
	}


	if($mode=="u_delete"){
		$d_userNo=	$_GET['userNo'];

		$result = mysql_query("delete from Users where userNo=$d_userNo");
		mysql_close();

		echo "<script>location.href = 'newui.php?flag=2';</script>";
	}
?>
<!--##############################                 -----                  ##############################-->	
<!--##############################                   리셋                    ##############################-->
<?
	if($mode=="u_reset"){
		$result = mysql_query("update Users set userPW='0000' where userNo=$_GET[userNo]");

		echo "<script>location.href = 'newui.php?flag=2';</script>";
	}
?>
<!--##############################                 -----                  ##############################-->	
<!--##############################                  보기                    ##############################-->
<?
if($flag==1){
?>
<?

// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);  
	else
		$total_page = floor($total_record/$scale) + 1;

	if($page_scale%$total_page==0){
			$total_block=$total_page/$page_scale;
	}
	else{
			$total_block=$total_page/$page_scale+1;
	}
	if($start_page+$page_scale<=$total_page){
				$end_page=$start_page+$page_scale;
	}
	else{
			$end_page=$total_page+1;
	}	
?>

<table border="2px" style="border: 0px solid white;" class="tg">
         <br>
         <tr>
            <th>No.</th>
			<th>장비계정명</th>
            <th>아이디</th>
            <th>패스워드</th>
            <th>만료일</th>
			<th>관리</th>
         </tr>
	<?
		$no=0;
		while($row = mysql_fetch_array($result)){
			$no++;
	?>
         <tr>
            <td><?=$no?></td>
			<td><?=$row[Name]?></td>
            <td><?=$row[AccID]?></td>
            <td><?=$row[AccPW]?></td>
            <td id="showRenewDate" class="renew">
			<?
				if(strtotime($row[renewDate])<time()){
			?>
			<font color="red"><?=$row[renewDate]?></font>
			<?
				}
				else {
					echo($row[renewDate]);
				}
			?>
			</td>
			<td>
				<a href="newui.php?mode=a_modify&AccNo=<?=$row[AccNo]?>"><input class="btn" type="button" width="30" value="수정" class="button"></a>
				<a href="newui.php?mode=a_delete&AccNo=<?=$row[AccNo]?>"><input class="btn" type="button" value="삭제" class="button"></a>
			</td>
         </tr>
	<?
		}
	?>
     </table>
총 등록 장비 계정수
<?

}
if($flag==2){
?>

<table border="2px" style="border: 0px solid white;" class="tg">
         <br>
         <tr>
            <th>No.</th>
            <th>아이디</th>
            <th>패스워드</th>
            <th>부서</th>
			<th>IP</th>
			<th>기능</th>
         </tr>
	<?
		$no=0;
		while($row = mysql_fetch_array($result)){
			$no++;
	?>
         <tr>
            <td><?=$no?></td>
            <td><?=$row[userID]?></td>
            <td><?=$row[userPW]?></td>
            <td><?$group_name=$row[AccessGroup];
	if($group_name=='A')
		echo "인사";
	else if($group_name=='B')
		echo "재무/회계";
	else if($group_name=='C')
		echo "정보/전산";
	else if($group_name=='D')
		echo "생산";
	else if($group_name=='E')
		echo "영업";
	else
		echo "관리자";
	?>
			
			
			</td>
			<td><?=$row[IP_Addr]?></td>
			<td>
				<a href="newui.php?mode=u_modify&userNo=<?=$row[userNo]?>"><input type="button" class="btn" width="30" value="수정" class="button"></a>
				<a href="newui.php?mode=u_delete&userNo=<?=$row[userNo]?>"><input type="button" class="btn" width="30" value="삭제" class="button"></a>
				
				<a href="newui.php?mode=u_reset&userNo=<?=$row[userNo]?>"><input type="button" class="btn" value="리셋" class="button"></a>
			</td>
         </tr>
	<?
		}
	?>
     </table>
총 등록된 사용자 수
<?
}
?>
<!--##############################                 -----                  ##############################-->
 <?=$total_record?> 현재페이지 <?=$page?> / <?=$total_page?> 총페이지 <?=$total_page?> <br>
<?
		for($i=$start_page;$i<$end_page;$i++)
		{
			if($i==$page){
?>
				<font color="red"><?=$i;?></font>
<?			}
			else{
?>					
			<a class="logout" href="newui.php?flag=<?=$flag?>&page=<?=$i?>&block=<?=$block?>&keyword=<?=$keyword?>&s_select=<?=$s_select?>"><?=$i?></a>
<?
			}
		}

?>


<?
		
}
?>

</div>
</div>
</body>
</html>