<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        // $imagePath = public_path('storage/images/fj-logo.png');
        // $htmlContent = "<img src='{$imagePath}' width='200' />";
        $htmlContent= '
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                h1 {
                    color: #333;
                }
                .content {
                    border: 2px solid #333;
                    padding: 20px;
                    margin: 20px 0;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid #333;
                    padding: 8px;
                    text-align: left;
                }
                .page-break {
                    page-break-after: always;
                }
            </style>
        ';

        $htmlContent .= "
         <div class='content'>
        <h1>PDF Generation with DomPDF in Laravel - FreakyJolly.com</h1>
        <p>This is an example of how to generate PDF files using DomPDF in Laravel.</p>


        <table>
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                </tr>
                <tr>
                    <td>Data 3</td>
                    <td>Data 4</td>
                </tr>
            </tbody>
        </table>
    </div>

    <pagebreak />

    <div class='content'>
        <h1>Second Page</h1>
        $htmlContent
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget lectus in diam vehicula bibendum. Quisque commodo odio quis interdum hendrerit.</p>
    </div>";
        $htmlContent = "<div style='padding: 20px; border: 1px solid #000;'>{$htmlContent}</div>";
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($htmlContent);
        $mpdf->Output('example.pdf', 'I');
    }
}
