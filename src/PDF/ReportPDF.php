<?php
// src/PDF/ReportPDF.php
namespace App\PDF;
use FPDF;

class ReportPDF extends FPDF {
    
    public function Header() {
        // Encabezado del PDF
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Informe de Jugadores', 0, 1, 'C');
    }

    public function Footer() {
        // Pie de página del PDF
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    public function generarInformeJugadoresPorEquipo($jugadoresPorEquipo) {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 12);

        foreach ($jugadoresPorEquipo as $equipo => $jugadores) {
            // Título del equipo
            $this->Cell(0, 10, 'Equipo: ' . $equipo, 0, 1);

            // Configura la tabla
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(20, 10, 'ID', 1, 0);
            $this->Cell(40, 10, 'Nombres', 1, 0);
            $this->Cell(40, 10, 'Apellidos', 1, 0);
            $this->Cell(40, 10, 'Fecha de Nacimiento', 1, 1);
            $this->Cell(40, 10, 'Fotografía', 1, 1);

            $this->SetFont('Arial', '', 12);

            // Recorre los jugadores de este equipo
            foreach ($jugadores as $jugador) {
                $this->Cell(20, 10, $jugador['ID_jugador'], 1, 0);
                $this->Cell(40, 10, $jugador['Nombres'], 1, 0);
                $this->Cell(40, 10, $jugador['Apellidos'], 1, 0);
                $this->Cell(40, 10, $jugador['Fecha_Nacimiento'], 1, 0);

                // Agregar la fotografía del jugador
                if (!empty($jugador['Fotografia'])) {
                    $this->Image(WWW_ROOT . 'img/jugadores/' . $jugador['Fotografia'], $this->GetX(), $this->GetY() + 1, 30, 30);
                }

                $this->Ln(30); // Alinea la siguiente fila
            }
        }
    }

    public function generarInformeJugadores($jugadores) {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 12);
        
        // Configura la tabla
        $this->Cell(20, 10, 'ID', 1, 0);
        $this->Cell(40, 10, 'Nombres', 1, 0);
        $this->Cell(40, 10, 'Apellidos', 1, 0);
        $this->Cell(40, 10, 'Fecha de Nacimiento', 1, 1);

        $this->SetFont('Arial', '', 12);

        // Recorre los jugadores y agrega sus datos a la tabla
        foreach ($jugadores as $jugador) {
            $this->Cell(20, 10, $jugador['ID_jugador'], 1, 0);
            $this->Cell(40, 10, $jugador['Nombres'], 1, 0);
            $this->Cell(40, 10, $jugador['Apellidos'], 1, 0);
            $this->Cell(40, 10, $jugador['Fecha_Nacimiento'], 1, 1);
        }
    }

    public function generarInformeMaximoAnotadores($resultados) {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 12);
        
        // Configura la tabla
        $this->Cell(40, 10, 'Nombres', 1, 0);
        $this->Cell(40, 10, 'Apellidos', 1, 0);
        $this->Cell(40, 10, 'Puntos', 1, 1);
    
        $this->SetFont('Arial', '', 12);
    
        // Recorre los resultados y agrega los datos del jugador a la tabla
        foreach ($resultados as $resultado) {
            $this->Cell(40, 10, $resultado['jugadore']['Nombres'], 1, 0);
            $this->Cell(40, 10, $resultado['jugadore']['Apellidos'], 1, 0);
            $this->Cell(40, 10, $resultado['Puntos'], 1, 1);
        }
    }
    

}


?>