<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// Function to add custom numbering and styling
function addNumbersToList($content)
{
    // Convert <ol> lists to numbered lists with custom styling
    $content = preg_replace_callback(
        '/<ol>(.*?)<\/ol>/is', // Match <ol>...</ol>
        function ($matches) {
            // The list can be <ol> or <ul>, so check which one matched
            $listItems = '';
            $itemsContent = $matches[1] ?: $matches[2];  // Get content inside <ol> or <ul>

            preg_match_all('/<li>(.*?)<\/li>/is', $itemsContent, $items); // Extract <li> items

            foreach ($items[1] as $index => $item) {
                $number = $index + 1;
                // Create a table row for each list item
                $listItems .= "<tr><td style='width: 3%; vertical-align: top; border: 0;'>$number.</td><td style='width: 92%; border: 0;'>$item</td></tr>";
            }

            // Wrap the <tr> rows inside a <table> tag
            return "<table style='width: 100%; margin-left: 5%; border: 0;'>$listItems</table>";
        },
        $content
    );

    return $content;
}

$html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array('25mm', '20mm', '10mm', '20mm'));
$css = file_get_contents(__DIR__ . '/../styles/pdf.css');

ob_start();

include __DIR__ . '/pdfTemplate.php';

$htmlContent = ob_get_clean();

// Preprocess the template content
$htmlContentChanged = addNumbersToList($htmlContent);

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

$bla = "
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: \'timesnewromancyr\';
            font-size: 14pt;
        }
        $highlighting
        $css
    </style>
    $htmlContentChanged
";
// echo $bla;

$html2pdf->writeHTML($bla);



$html2pdf->output();
