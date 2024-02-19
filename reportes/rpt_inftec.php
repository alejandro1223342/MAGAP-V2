<?php
require('../fdpdf/fpdf.php');

class PDF extends FPDF
{
    // Encabezado
    function Header()
    {
        // Selecciona la fuente y establece el tamaño
        $this->SetLeftMargin(10);
        $this->SetRightMargin(10);

        // Seleccionar la fuente y establecer el tamaño
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(35, 5, 'DISPUESTO POR:', 1, 0, 'L', false, '', 2);
        $this->Cell(155, 5, '', 1, 0, 'L', false, '', 2); //POST

        $this->Ln(5);
        $this->Cell(35, 5, 'MEDIANTE:', 1, 0, 'L', false, '', 2);
        $this->Cell(155, 5, '', 1, 0, 'L', false, '', 2); //POST

        $this->Ln(5);
        $this->Cell(90, 10, 'APELLIDOS Y NOMBRES DE LAS (LOS) SOLICITANTE (S):', 1, 0, 'L', false, '', 2);
        $this->Cell(100, 10, '', 1, 0, 'L', false, '', 2); //POST

        $this->Ln(10);
        $this->Cell(70, 5, ' CÉDULA (S) DE CIUDADANÍA No (S):', 1, 0, 'L', false, '', 2);
        $this->Cell(30, 5, '1050518594', 1, 0, 'C', false, '', 2); //POST
        $this->Cell(30, 5, '', 1, 0, 'C', false, '', 2); //POST
        $this->Cell(30, 5, '', 1, 0, 'C', false, '', 2); //POST
        $this->Cell(30, 5, '', 1, 0, 'C', false, '', 2); //POST

    }

    // Pie de página
    function Footer()
    {
        // Posiciona a 1.5 cm del final
        $this->SetY(-15);

        // Selecciona la fuente y establece el tamaño
        $this->SetFont('Arial', 'I', 8);

        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de la clase PDF
$pdf = new PDF();

// Agregar una página
$pdf->AddPage();

// Aquí puedes agregar el contenido de tu PDF

// Salida del PDF
$pdf->Output();
