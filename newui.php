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
/*  ���̺� ��Ÿ��  */
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


//1. �ʼ� ������ �Է� ���ΰ���
   if(Name == null | Name.length == 0) {
      alert("������ �Է����ֽñ� �ٶ��ϴ�.");
      document.a_register_form.userName.focus();
      return false;
   }

   if(AccID == null | AccID.length == 0) {
      alert("���ID�� �Է����ֽñ� �ٶ��ϴ�.");
      document.a_register_form.AccID.focus();
      return false;
   }

   if( AccPW == null |  AccPW.length == 0) {
      alert("��й�ȣ�� �Է����ֽñ� �ٶ��ϴ�.");
      document.a_register_form.AccPW.focus();
      return false;
   }

   if(renewDate == null | renewDate.length == 0) {
      alert("�������� �Է����ֽñ� �ٶ��ϴ�.");
      document.a_register_form.renewDate.focus();
      return false;
   }
	
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(Name)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    a_register_form.Name.focus();
	return false;
	}
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(AccID)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    a_register_form.AccID.focus();
	return false;
	}
	if ((new RegExp(/[^a-z|^0-9]/gi)).test(AccPW)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    a_register_form.AccPW.focus();
	return false;
	}
} 

function searchValidate(theForm){
	var keyword = document.a_search_form.keyword.value;

	if(keyword == null | keyword.length == 0) {
      alert(" �� ���� �˻������ �����ϴ�.");
      document.a_search_form.keyword.focus();
      return false;
    } 

   if ((new RegExp(/[^a-z|^0-9]/gi)).test(keyword)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
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

	//1.�ʼ� �Է� ������ ����
	if(!userID | !userID.length){
		alert("�ʼ��Է�����(���̵�) �Դϴ�.");
		document.u_register_form.userID.focus();
		return false;
	}
	if(userPW == null | userPW.length == 0){
		alert("�ʼ��Է�����(��й�ȣ) �Դϴ�.");
		document.u_register_form.userPW.focus();
		return false;
	}
	if(userPW_confirm == null | userPW_confirm.length == 0){
		alert("�ʼ��Է�����(��й�ȣ Ȯ��) �Դϴ�.");
		document.u_register_form.userPW_confirm.focus();
		return false;
	}
	if(AccessGroup == null | AccessGroup.length == 0){
		alert("�ʼ��Է�����(�׷��) �Դϴ�.");
		document.u_register_form.AccessGroup.focus();
		return false;
	}

	//2. SQL ������ ���
   if ((new RegExp(/[^a-z|^0-9]/gi)).test(userID)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    u_register_form.userID.focus();
	return false;
	}

    if ((new RegExp(/[^a-z|^0-9]/gi)).test(userPW)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    u_register_form.userPW.focus();
	return false;
	}
 
    if ((new RegExp(/[^a-z|^0-9]/gi)).test(userPW_confirm)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    u_register_form.userPW_confirm.focus();
	return false;
	}

}

function searchValidate(theForm){
	var keyword = document.search_form.keyword.value;

	if(keyword == null | keyword.length == 0) {
      alert(" �� ���� �˻������ �����ϴ�.");
      document.search_form.keyword.focus();
      return false;
    } 

   if ((new RegExp(/[^a-z|^0-9]/gi)).test(keyword)) {
    alert("Ư�����ڴ� �Է��� �� �����ϴ�. �ٽ� �Է����ּ���."); 
    search_form.keyword.focus();
	return false;
	}
}

//3. ��й�ȣ�� ��й�ȣ ���Է� ��ġ ���� ����
function mappingUserpw() {

   var userPW = document.u_register_form.userPW.value;
   var userPW_confirm = document.u_register_form.userPW_confirm.value;
   var displayUserpwElement = document.getElementById("displayUserPW");
   
   // ��ȣ, ��ȣȮ�� �Է�
   if (userPW != null & userPW.length > 0 & userPW_confirm != null & userPW_confirm.length > 0) {
      // ��ȣ, ��ȣȮ�� ��ġ
      if (userPW == userPW_confirm) {
         displayUserpwElement.innerHTML = "��ȣ ��ġ";
      } else { // ��ȣ, ��ȣȮ�� ����ġ
         displayUserpwElement.innerHTML = "��ȣ ����ġ";
      }
   }
} 

function mappingUserpwCheck() {
   var takeElementSpan = document.getElementById("displayUserPW");
   var takeTextNode = takeElementSpan.firstChild;
   var mappingMsg = takeTextNode.nodeValue;
   if (mappingMsg == "��ȣ ����ġ") {
      document.u_register_form.userPW_confirm.focus();
      document.u_register_form.userPW_confirm.value = "";
      takeElementSpan.innerHTML = "";
   } else {
      takeElementSpan.innerHTML = "";
   }
}

</script>
<script>
/*    // html dom �� �� �ε��� �� ����ȴ�.
    $(document).ready(function(){
        // menu Ŭ���� �ٷ� ������ �ִ� a �±׸� Ŭ��������
        $(".menu>a").click(function(){
            var submenu = $(this).next("ul");
 
            // submenu �� ȭ��� ���϶��� ���� ������� ���� �ƴϸ� �Ʒ��� ������� ��ġ��
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
	include("dbconfig.php");  //DB����

	$flag=$_GET[flag];//����� �����ϴ� �÷��� 1:�Ϲ� ����� 2:������
	//mode
	$mode=$_REQUEST['mode'];
	$keyword=$_POST[keyword];

	if($_SESSION['login_user']=='admin'){
		$ispermission=1;
	}
	else{
		$ispermission=0;
	}
	
	$scale=8;//��ȭ�� ǥ�� �� ��
	$start=0;
	$page=$_GET['page'];
	$ppage=$page-1;
	$npage=$page+1;
	$page_scale=5;//��ȭ�� ǥ�� ������ ��

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


		if($keyword){//Ű����
			$query = "select * from Accounts where $sort like '%$keyword%'";
			if($_SESSION['login_user']!='admin'){//�����ڰ� �ƴҰ�쿣 �׷���� ����
				$query .= " and AccessGroup='$group'";
			}
			$query .= " order by AccNo asc";
		}
		else{
			$query = "select * from Accounts";
			if($_SESSION['login_user']!='admin'){//�����ڰ� �ƴҰ�쿣 �׷���� ����
				$query .= " where AccessGroup='$group'";
			}
			$query .= " order by AccNo asc";
		}
		$result = mysql_query($query);
		$total_record = mysql_num_rows($result);//��ü �� ��
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
				$total_record = mysql_num_rows($result);//��ü �� ��
				$result = mysql_query("select * from Users where $sort like '%$keyword%' order by userNo asc limit $limit_num, $scale");
		}
		else{
			$result = mysql_query("select * from Users order by userNo asc");
			$total_record = mysql_num_rows($result);//��ü �� ��
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
		<a class="list" href="newui.php?flag=1"><img src="list.png" height="24px" align="absmiddle"> &nbsp; ���� ����</a>
		<ul class="hide">
			<li><a href="newui.php?mode=a_register&flag=1">�� ���</a></li>
			<li><a href="newui.php?mode=a_search&flag=1">�� �˻�</a></li>
		</ul>
	</li>
<?
	if($ispermission==1){
?>
	<li class="menu">
		<a class="list" href="newui.php?flag=2"><img src="user.png" height="24px" align="absmiddle"> &nbsp; ����� ����</a>
		<ul class="hide">
			<li><a href="newui.php?mode=u_register&flag=2">�� ���</a></li>
			<li><a href="newui.php?mode=u_search&flag=2">�� �˻�</a></li>
		</ul>
	</li>
<?
	}
?>
	<li><a class="list"><img src="signs.png" height="24px" align="absmiddle"> &nbsp; �̷� ����</a>
	</li>
	<li><a class="list"><img src="file.png" height="24px" align="absmiddle"> &nbsp; �Խ��� / �ڷ��</a>	
	</li>
	<li><a class="list"><img src="settings.png" height="24px" align="absmiddle"> &nbsp; � ����</a>
		<ul class="hide">
			<li><a href="newui.php?mode=manual">�� ����� �Ŵ���</a></li>
			<li><a href="newui.php?mode=manual">�� ������ �Ŵ���</a></li>
		</ul>
	</li>

</ul>
</div>
<!--##############################                    top                      ##############################-->
<div id="top">

<?



	if($_SESSION['mygroup']=='A')
		echo "�λ��";
	else if($_SESSION['mygroup']=='B')
		echo "�繫/ȸ���";
	else if($_SESSION['mygroup']=='C')
		echo "����/�����";
	else if($_SESSION['mygroup']=='D')
		echo "�����";
	else if($_SESSION['mygroup']=='E')
		echo "������";
	else
		echo "������";

?>


<?=$_SESSION['login_user']?>��  <a href="logout.php" class="logout">�α׾ƿ�</a>
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

<!--##############################                   ����                    ##############################-->

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
<!--##############################                   ���                    ##############################-->

<?
if($mode=="a_register"){
?>
	<form name="a_register_form" method="post" onsubmit ="return joinConfirm(this)" action="#">
		�������� <input type="text" size="8" name="Name" id="Name" MAXLENGTH="10">
		���̵� <input type="text" size="10" name="AccID" id="AccID" MAXLENGTH="10">
		�н����� <input type="password" size="10" name="AccPW" id="AccPW" MAXLENGTH="10">
		������ <input type="text" size="10" name="renewDate" id="renewDate">
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
		���̵� <input type="text" size="10" name="userID" id="userID" maxLENGTH="10"> 
		�н����� <input type="password" size="10" name="userPW" id="userPW" maxLENGTH="10">
		�н�����Ȯ�� <input type="password" size="10" name="userPW_confirm" id="userPW_confirm" MAXLENGTH="10" onKeyUP="mappingUserpw()" onBlur="mappingUserpwCheck()" onFocus="mappingUserpw()">
		�μ� <select id="AccessGroup" name="AccessGroup">
		<option value="A">�λ�</option>
		<option value="B">�繫/ȸ��</option>
		<option value="C">����/����</option>
		<option value="D">����</option>
		<option value="E">����</option> 
		</select>
		<input type="submit" value="���" class="button"><br>
		<span id="displayUserPW">��ȣȮ�θ޼���</span>
		<input type="hidden" name="mode" value="save">
	</form>
<?
}
?>
<!--##############################                 -----                  ##############################-->	
<!--##############################                   �˻�                    ##############################-->	
<?
	if($mode=="a_search"){
?>	
	<form name="a_search_form" method="post" onsubmit="return searchValidate(this)" action="#">
		<select name="s_select">
			<option value="s_name">��������</option>
			<option value="s_id">���̵�</option>
		</select>
		<input type="text" name="keyword" SIZE="8">
		<input type="submit" value="�˻�">
	</form>
<?
	}
?>
<?
	if($mode=="u_search"){
?>
	<form name="u_search_form" method="post" onsubmit ="return searchValidate(this)" action="#">
	
		<select name="s_select">
			<option value="s_id">���̵�</option>
			<option value="s_group">�μ�</option>
		</select>
		<input type="text" name="keyword" SIZE="8">
		<input type="submit" class="button" value="�˻�">
	</form>
<?
	}
?>
<!--##############################                 -----                  ##############################-->	
</td></tr>
</table>
<!--##############################                   ����                   ##############################-->
<?
	if($mode=="u_modify"){
		$result = mysql_query("select * from Users where userNo=$_GET[userNo] ");
		$row = mysql_fetch_array($result);

	}
?>
<!--##############################                 -----                  ##############################-->
<!--##############################                  ����                    ##############################-->
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
<!--##############################                   ����                    ##############################-->
<?
	if($mode=="u_reset"){
		$result = mysql_query("update Users set userPW='0000' where userNo=$_GET[userNo]");

		echo "<script>location.href = 'newui.php?flag=2';</script>";
	}
?>
<!--##############################                 -----                  ##############################-->	
<!--##############################                  ����                    ##############################-->
<?
if($flag==1){
?>
<?

// ��ü ������ ��($total_page) ��� 
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
			<th>��������</th>
            <th>���̵�</th>
            <th>�н�����</th>
            <th>������</th>
			<th>����</th>
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
				<a href="newui.php?mode=a_modify&AccNo=<?=$row[AccNo]?>"><input class="btn" type="button" width="30" value="����" class="button"></a>
				<a href="newui.php?mode=a_delete&AccNo=<?=$row[AccNo]?>"><input class="btn" type="button" value="����" class="button"></a>
			</td>
         </tr>
	<?
		}
	?>
     </table>
�� ��� ��� ������
<?

}
if($flag==2){
?>

<table border="2px" style="border: 0px solid white;" class="tg">
         <br>
         <tr>
            <th>No.</th>
            <th>���̵�</th>
            <th>�н�����</th>
            <th>�μ�</th>
			<th>IP</th>
			<th>���</th>
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
		echo "�λ�";
	else if($group_name=='B')
		echo "�繫/ȸ��";
	else if($group_name=='C')
		echo "����/����";
	else if($group_name=='D')
		echo "����";
	else if($group_name=='E')
		echo "����";
	else
		echo "������";
	?>
			
			
			</td>
			<td><?=$row[IP_Addr]?></td>
			<td>
				<a href="newui.php?mode=u_modify&userNo=<?=$row[userNo]?>"><input type="button" class="btn" width="30" value="����" class="button"></a>
				<a href="newui.php?mode=u_delete&userNo=<?=$row[userNo]?>"><input type="button" class="btn" width="30" value="����" class="button"></a>
				
				<a href="newui.php?mode=u_reset&userNo=<?=$row[userNo]?>"><input type="button" class="btn" value="����" class="button"></a>
			</td>
         </tr>
	<?
		}
	?>
     </table>
�� ��ϵ� ����� ��
<?
}
?>
<!--##############################                 -----                  ##############################-->
 <?=$total_record?> ���������� <?=$page?> / <?=$total_page?> �������� <?=$total_page?> <br>
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