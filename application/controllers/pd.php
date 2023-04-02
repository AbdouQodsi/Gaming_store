<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/tcpdf/src/Tcpdf.php');

class Pdf_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load any necessary models or helpers
    }

    public function generate_pdf()
    {
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('John Doe');
        $pdf->SetTitle('My PDF Document');
        $pdf->SetSubject('A sample PDF document');

        // add a page
        $pdf->AddPage();

        // set font
        $pdf->SetFont('helvetica', '', 12);

        // add some content
        $pdf->Write(0, 'Hello, world!');

        // output the PDF as a string
        $pdf_data = $pdf->Output('my_document.pdf', 'S');

        // send the PDF as a download
        $this->load->helper('download');
        force_download('my_document.pdf', $pdf_data);
    }
}
