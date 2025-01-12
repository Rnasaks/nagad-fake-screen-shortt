<?php
header('Content-Type: image/png');

$number = isset($_GET['number']) ? htmlspecialchars($_GET['number']) : '01986-343907';
$transactionId = isset($_GET['transaction']) ? htmlspecialchars($_GET['transaction']) : '730MGQGC';
$amount = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : '9999';
$charge = isset($_GET['charge']) ? htmlspecialchars($_GET['charge']) : '5';
$total = isset($_GET['total']) ? htmlspecialchars($_GET['total']) : '9999';

date_default_timezone_set('Asia/Dhaka');

/*** <-- Antik Developed 

Iam Gui Developer 

Antik Developed -->***/

$time = date('d F Y, h:i A');
$timeeee = date('h:i A');
$background = imagecreatefromjpeg('ss.jpg');
$grey = imagecolorallocate($background, 128, 128, 128);
$white = imagecolorallocate($background, 255, 255, 255);  // Allocate white color
$Antik = __DIR__ . '/roboto.ttf';
$fontSize = 50;
$fontSizeBold = 55;
$trim = 47;
$textStyles = [
    'number' => ['x' => 1199, 'y' => 1090, 'size' => $fontSizeBold, 'font' => $Antik, 'color' => $grey],
    'transactionId' => ['x' => 1790, 'y' => 1280, 'size' => $fontSize, 'font' => $Antik, 'color' => $grey],
    'amount' => ['x' => 1630, 'y' => 1385, 'size' => $fontSize, 'font' => $Antik, 'color' => $grey],
    'charge' => ['x' => 1630, 'y' => 1505, 'size' => $fontSize, 'font' => $Antik, 'color' => $grey],
    'total' => ['x' => 1630, 'y' => 1620, 'size' => $fontSize, 'font' => $Antik, 'color' => $grey],
    'time' => ['x' => 1790, 'y' => 1740, 'size' => $fontSize, 'font' => $Antik, 'color' => $grey],
    'timeeee' => ['x' => 370, 'y' => 105, 'size' => $trim, 'font' => $Antik, 'color' => $white],  // Use white color for timeeee
];

function getRightAlignedX($text, $size, $font, $rightX) {
    $bbox = imagettfbbox($size, 0, $font, $text);
    $textWidth = $bbox[2] - $bbox[0];
    return $rightX - $textWidth;
}

foreach ($textStyles as $key => $style) {
    $text = $$key;
    $x = getRightAlignedX($text, $style['size'], $style['font'], $style['x']);
    imagettftext($background, $style['size'], 0, $x, $style['y'], $style['color'], $style['font'], $text);
}

imagepng($background);
imagedestroy($background);
?>
