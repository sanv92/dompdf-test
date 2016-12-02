<?php

require 'vendor/autoload.php';

//def("DOMPDF_ENABLE_JAVASCRIPT", true);

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;



// instantiate and use the dompdf class
$options = new Options();

$options->set('isFontSubsettingEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isJavascriptEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('fontHeightRatio', true);
$options->set('defaultFont', 'Courier');

$dompdf = new Dompdf($options);

/*
<style type="text/css">
@font-face {
  font-family: \'Firefly Sung\';
  font-style: normal;
  font-weight: 400;
  src: url(http://eclecticgeek.com/dompdf/fonts/cjk/fireflysung.ttf) format(\'truetype\');
}

* { font-family: font-family: firefly, DejaVu Sans, sans-serif; }
* {
  font-family: Firefly Sung, DejaVu Sans, sans-serif, arial;
}
* { font-family: DejaVu Sans, sans-serif; }
</style>
*/

$htmlx = <<<HTML
<div>foo</div>
    <span id="insertHere"></span>
<div>bar</div>

<script type="text/javascript">
print({bUI : false, nStart : pageNum, nEnd : pageNum});
</script>
HTML;

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "https://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
@font-face {
  font-family: \'Firefly\';
  font-style: normal;
  font-weight: normal;
  src: url(http://example.com/fonts/firefly.ttf) format(\'truetype\');
}

* { font-family: font-family: Firefly Sung, firefly, DejaVu Sans, sans-serif, arial; }
</style>
</head>
<body>
&#33;&#33;&#33;&#33;&#33;&#33;


<h1>h1 - 图路迪斯尼亚克</h1>
<p>p - 图路迪斯尼亚克</p>

<h1 style="font-family: firefly, DejaVu Sans, sans-serif;">h1 -- 献给母亲的爱</h1>
<p style="font-family: firefly, DejaVu Sans, sans-serif;">p -- 献给母亲的爱</p>

<hr>

<h1>Hozzáférés a pénzügyi piacokhoz. Egyszerűen.</h1>
<p>Hozzáférés a pénzügyi piacokhoz. Egyszerűen.</p>
<h1>Русские буквы</h1>
<p>лалалал аддадад дда да да</p>
<h1>Įspėjimas apie riziką: Jūs rizikuojate savo kapitalu. Prekybos nuostoliai gali viršyti depozitą.</h1>
<p>Įspėjimas apie riziką: Jūs rizikuojate savo kapitalu. Prekybos nuostoliai gali viršyti depozitą.</p>
<h1>Tutvu finantsteenuste tingimustega ja konsulteerige asjatundjaga. Kauplemistegevuse kogukahjum võib ületada esialgset investeeringut.</h1>
<h1>เพิ่มเงินทุนกับโบรกเกอร์ที่เหมาะสม รับโบนัสเพิ่มขึ้นกว่า50%ของบัญชีซื้อขายหลักจากการเปิดบัญชีใหม่.</h1>
<p>เพิ่มเงินทุนกับโบรกเกอร์ที่เหมาะสม รับโบนัสเพิ่มขึ้นกว่า50%ของบัญชีซื้อขายหลักจากการเปิดบัญชีใหม่.</p>
<h1>نوفر لك إمكانية الدخول والتداول بشفافية في أكثر الأسواق سيولة و إثارة </h1>
<p>نوفر لك إمكانية الدخول والتداول بشفافية في أكثر الأسواق سيولة و إثارة </p>

<hr>

<p>Tutvu finantsteenuste tingimustega ja konsulteerige asjatundjaga. Kauplemistegevuse kogukahjum võib ületada esialgset investeeringut.</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<h1>Test test test</h1>
<p>sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander sander</p>
<script type="text/javascript">
print({bUI : false, nStart : pageNum, nEnd : pageNum});
</script>
</body>
</html>';

$dompdf->loadHtml(($html));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream( 'file.pdf' , array( 'Attachment'=>0 ) );
