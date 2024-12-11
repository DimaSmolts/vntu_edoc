<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array('25mm', '20mm', '10mm', '20mm'));
$css = file_get_contents(__DIR__ . '/../styles/pdf.css');

ob_start();

include __DIR__ . '/pdfTemplate.php';

$htmlContent = ob_get_clean();

$html2pdf->setDefaultFont('timesnewromancyr', '', 14);

$highlighting = $isHighlighting ? "
.import {
	background-color: antiquewhite;
}
    
.inserted {
	background-color: lightgreen;
}
  
.not-inserted {
}

.global {
	background-color: cadetblue;
}

.calculated {
	background-color: orange;
}

.change {
	background-color: #CC5500;
}
" : "";

$html2pdf->writeHTML("
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: \'timesnewromancyr\';
            font-size: 14pt;
        }
        ol.numbered-list {
            font-family: \'timesnewromancyr\';
            font-size: 14pt;
        }
        $highlighting
        $css
    </style>
    $htmlContent
");

$html2pdf->output();
