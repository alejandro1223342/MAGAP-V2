<?php
require('../fdpdf/fpdf.php');

class PDF extends FPDF
{
    // Encabezado
    function Header()
    {
        // Selecciona la fuente y establece el tamaño
        $this->SetFont('Arial', 'B', 12);

        // Mueve a la derecha
        $this->Cell(80);

        // Agrega el título
        $this->Cell(30, 10, 'Encabezado del PDF', 1, 0, 'C');

        // Salto de línea
        $this->Ln(20);
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
