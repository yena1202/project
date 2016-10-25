<?php
require_once './GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
// $secret 코드를 직접 google authernicator 앱에 입력하거나,
echo "Secret is: ".$secret."\n\n";
// 'Blog'에 서비스 이름 같은걸 넣어주면 될듯.
$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
// QR코드 이미지를 스캔하여 자동 입력한다.
echo "Google Charts URL for the QR-Code: <img src=".$qrCodeUrl."/>\n\n";
// 사용자 데이터베이스에 $secret을 저장한다.
?>