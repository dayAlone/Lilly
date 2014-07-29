<?
$html = file_get_contents("http://".$_SERVER[HTTP_HOST]."/test_man/print.php");
include("./mpdf/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->charset_in = 'cp1251'; /*не забываем про русский*/

$stylesheet = file_get_contents('style.css'); /*подключаем css*/
$mpdf->WriteHTML($stylesheet, 1);

$mpdf->list_indent_first_level = 0; 

$css = "http://".$_SERVER[HTTP_HOST]."/layout/css/bootstrap.min.css";
$stylesheet = file_get_contents($css);
$mpdf->WriteHTML($stylesheet,1);

$css = "http://".$_SERVER[HTTP_HOST]."/layout/css/style.css";
$stylesheet = file_get_contents($css);
$mpdf->WriteHTML($stylesheet,1);

$mpdf->WriteHTML($html, 2); /*формируем pdf*/
$mpdf->Output('mpdf.pdf', 'I');
?>