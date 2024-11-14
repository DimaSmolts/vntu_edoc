<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// Initialize Html2Pdf instance
$html2pdf = new Html2Pdf();

// Set the font manually
$fontFileBI = __DIR__ . '/../fonts/times-new-roman-cyr-bold-italic.ttf';
$fontFileB = __DIR__ . '/../fonts/times-new-roman-cyr-bold.ttf';
$fontFileI = __DIR__ . '/../fonts/times-new-roman-cyr-italic.ttf';
$fontFile = __DIR__ . '/../fonts/times-new-roman-cyr.ttf';

$fontNameBI = \TCPDF_FONTS::addTTFfont($fontFileBI, 'TrueTypeUnicode', '', 32);
$fontNameB = \TCPDF_FONTS::addTTFfont($fontFileB, 'TrueTypeUnicode', '', 32);
$fontNameI = \TCPDF_FONTS::addTTFfont($fontFileI, 'TrueTypeUnicode', '', 32);
$fontName = \TCPDF_FONTS::addTTFfont($fontFile, 'TrueTypeUnicode', '', 32);

if ($fontNameBI) {
	echo "Font converted successfully: $fontNameBI\n";
} else {
	echo "Font conversion failed.\n";
}

if ($fontNameB) {
	echo "Font converted successfully: $fontNameB\n";
} else {
	echo "Font conversion failed.\n";
}

if ($fontNameI) {
	echo "Font converted successfully: $fontNameI\n";
} else {
	echo "Font conversion failed.\n";
}

if ($fontName) {
	echo "Font converted successfully: $fontName\n";
} else {
	echo "Font conversion failed.\n";
}
