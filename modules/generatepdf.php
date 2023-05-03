<?php

// Load the PDFlib library
if (!extension_loaded('pdf')) {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        dl('php_pdf.dll');
    } else {
        dl('pdf.so');
    }
}

// Create a new PDF object
$pdf = new PDFlib();

// Open a new document
$pdf->begin_document("example.pdf");

// Set the document info
$pdf->set_info("Creator", "My PHP script");
$pdf->set_info("Author", "John Doe");
$pdf->set_info("Title", "My PDF Document");

// Add a new page
$pdf->begin_page_ext(0, 0, "A4");

// Set the font
$pdf->set_font("Helvetica-Bold", 18);

// Write some text
$pdf->show_xy("Hello, World!", 50, 700);

// End the page and the document
$pdf->end_page_ext("");
$pdf->end_document("");

// Output the PDF file
header('Content-type: application/pdf');
readfile('example.pdf');
 