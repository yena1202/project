<?php

	include("../dbconfig.php");  //DB������ ���� dbconfig.php�� �ε�

	session_start();

require_once './GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
// ����� �����ͺ��̽����� secret ������ �����ͼ� $secret ������ �ִ´�.
if($_SESSION['login_user']!='admin'){
	$secret = 'EVTT2CO5HTJZIHH4';//����
}
else{
	$secret = '4GM5YC22AFAETZKL';//����
}
// ����ڷκ��� code�� POST�� �޴´�.
$oneCode=  $var = $_POST["code"];
// $secret�� $oneCode�� ���Ѵ�.
$checkResult = $ga->verifyCode($secret, $oneCode);
if ($checkResult) {
    // �α��� ����
    echo 'OK';
	$myusername = $_SESSION['login_user'];
	$ip = $_SERVER['REMOTE_ADDR']; // ���� ip

	$a = localtime();
    $datetime = ($a[5]+1900)."/".($a[4]+1)."/".($a[3])." ".($a[2]).":".$a[1].":".$a[0];
	$a = "INSERT INTO PatternAnalysis SET UserID ='".$myusername."', IP_Addr = '".$ip."', Time='".$datetime."'";

	$sql2 = mysql_query("INSERT INTO PatternAnalysis SET UserID ='".$myusername."', IP_Addr = '".$ip."', Time='".$datetime."'");
	echo $sql2;
	header("location: ../newui.php?mode=home");//newui.php �������� �ѱ�
} else {
    // �α��� ����
    echo 'FAILED';
}
?>
