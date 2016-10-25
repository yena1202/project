<?php

	include("../dbconfig.php");  //DB연결을 위한 dbconfig.php를 로드

	session_start();

require_once './GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
// 사용자 데이터베이스에서 secret 정보를 가져와서 $secret 변수에 넣는다.
if($_SESSION['login_user']!='admin'){
	$secret = 'EVTT2CO5HTJZIHH4';//은녕
}
else{
	$secret = '4GM5YC22AFAETZKL';//예나
}
// 사용자로부터 code를 POST로 받는다.
$oneCode=  $var = $_POST["code"];
// $secret과 $oneCode를 비교한다.
$checkResult = $ga->verifyCode($secret, $oneCode);
if ($checkResult) {
    // 로그인 성공
    echo 'OK';
	$myusername = $_SESSION['login_user'];
	$ip = $_SERVER['REMOTE_ADDR']; // 현재 ip

	$a = localtime();
    $datetime = ($a[5]+1900)."/".($a[4]+1)."/".($a[3])." ".($a[2]).":".$a[1].":".$a[0];
	$a = "INSERT INTO PatternAnalysis SET UserID ='".$myusername."', IP_Addr = '".$ip."', Time='".$datetime."'";

	$sql2 = mysql_query("INSERT INTO PatternAnalysis SET UserID ='".$myusername."', IP_Addr = '".$ip."', Time='".$datetime."'");
	echo $sql2;
	header("location: ../newui.php?mode=home");//newui.php 페이지로 넘김
} else {
    // 로그인 실패
    echo 'FAILED';
}
?>
