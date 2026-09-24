<?php


require_once('TCPDF/tcpdf.php');



$pdf = new TCPDF(
    'P',
    'mm',
    'A4',
    true,
    'UTF-8',
    false
);



$pdf->SetCreator(
    'Duta Riau Konsultan'
);



$pdf->SetTitle(
    'Test PDF'
);



$pdf->AddPage();



$pdf->SetFont(
    'helvetica',
    '',
    16
);



$pdf->Write(
    0,
    'TCPDF BERHASIL'
);



$pdf->Output(
    'test.pdf',
    'I'
);


?>