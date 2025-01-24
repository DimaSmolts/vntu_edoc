<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../helpers/pdf/generateTopicForPDF.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array('25mm', '20mm', '10mm', '20mm'));
$html2pdf->pdf->setTitle("$details->disciplineName (документ)");
$html2pdf->pdf->SetAutoPageBreak(true, 20); // 20mm bottom margin
$css = file_get_contents(__DIR__ . '/../styles/pdf.css');

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

ob_start();

include __DIR__ . '/../components/pdfTemplate/titlePage.php';

$titlePage = ob_get_clean();

$content = "
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
    $titlePage
";

ob_start();

include __DIR__ . '/../components/pdfTemplate/approvedPage.php';

$approvedPage = ob_get_clean();

// Додаємо сторінку з таблицею з посадами, іменами та підписами всіх хто розробив, схвалив та затвердив
$content .= "
    $approvedPage
";

ob_start();

include __DIR__ . '/../components/pdfTemplate/educationalDisciplineDescriptionPage.php';

$educationalDisciplineDescriptionPage = ob_get_clean();

// Додаємо розділ 1. Опис навчальної дисципліни
$content .= "
    $educationalDisciplineDescriptionPage
";

$html2pdf->writeHTML($content);

// Додаємо розділ 2. Передумови для вивчення дисципліни
generateTopicForPDF($html2pdf, 'prerequisitesTopic', $details);

// Додаємо розділ 3. Мета та завдання навчальної дисципліни
generateTopicForPDF($html2pdf, 'goalAndTasksTopic', $details);

// Додаємо розділ 4. Програма навчальної дисципліни
generateTopicForPDF($html2pdf, 'educationalDisciplineProgramTopic', $details);

// Додаємо розділ 5. Структура навчальної дисципліни (5. Теми лекцій)
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'educationalDisciplineStructureTopic',
    details: $details,
    isLesson: true
);

// Додаємо розділ 6. Теми семінарських занять
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'seminarsStructureTopic',
    details: $details,
    structure: $structure,
    isLesson: true
);

// Додаємо розділ 7. Теми практичних занять
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'practicalsStructureTopics',
    details: $details,
    structure: $structure,
    isLesson: true
);

// Додаємо розділ 8. Теми лабораторних занять
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'labsStructureTopics',
    details: $details,
    structure: $structure,
    isLesson: true
);

// Додаємо розділ 9. Самостійна робота
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'selfworkTopic',
    details: $details,
    structure: $structure,
    selfworkData: $selfworkData,
    isSelfwork: true
);

// Додаємо розділ 10. Індивідуальні завдання
generateTopicForPDF($html2pdf, 'individualTaskNotesTopic', $details);

// Додаємо розділ 11. Методи навчання
generateTopicForPDF($html2pdf, 'studingMethodsTopic', $details);

// Додаємо розділ 12. Методи контролю
generateTopicForPDF($html2pdf, 'examingMethodsTopic', $details);

// Додаємо розділ 13. Розподіл балів, які отримують студенти
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'pointsDistributionTopic',
    details: $details,
    structure: $structure,
    pointsDistributionSemestersData: $pointsDistributionSemestersData,
    pointsDistributionRelatedData: $pointsDistributionRelatedData,
    semestersIdsByControlType: $semestersIdsByControlType,
    isPointsDistribution: true
);

// Додаємо розділ 14. Методичне забезпечення
generateTopicForPDF($html2pdf, 'methodologicalSupportTopic', $details);

// Додаємо розділ 15. Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти
generateTopicForPDF(
    html2pdf: $html2pdf,
    topicName: 'assessmentCriteriaTopic',
    details: $details,
    structure: $structure,
    pointsDistributionRelatedData: $pointsDistributionRelatedData,
    isAssessmentCriteria: true
);

// Додаємо розділ 16. Академічні права та обов’язки
generateTopicForPDF($html2pdf, 'academicRightsAndResponsibilitiesTopic', $details);

// Додаємо розділ 17. Рекомендована література
generateTopicForPDF($html2pdf, 'literatureTopic', $details);

$html2pdf->output("$details->disciplineName.pdf");
