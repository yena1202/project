<?php
require_once './GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
// $secret �ڵ带 ���� google authernicator �ۿ� �Է��ϰų�,
echo "Secret is: ".$secret."\n\n";
// 'Blog'�� ���� �̸� ������ �־��ָ� �ɵ�.
$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
// QR�ڵ� �̹����� ��ĵ�Ͽ� �ڵ� �Է��Ѵ�.
echo "Google Charts URL for the QR-Code: <img src=".$qrCodeUrl."/>\n\n";
// ����� �����ͺ��̽��� $secret�� �����Ѵ�.
?>