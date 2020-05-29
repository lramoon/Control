<?php
require('../fpdf/fpdf.php');
session_start();
$usuario=$_SESSION['usuario'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Asistencias Diarias General',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    //Nombre del ADM
    $this->Image('../images/jontexloguito.png', 5, 5, 30 );
    $this->Cell(50,3,'Administrador a cargo '. $_SESSION['usuario'], 0,0,'c');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(28,10,'Nombre',1,0,'C',0);
    $this->Cell(28,10,'Apellido',1,0,'C',0);
    $this->Cell(30,10,'Cedula',1,0,'C',0);
    $this->Cell(48,10,'Fecha De Entrada',1,0,'C',0);
    $this->Cell(43,10,'Fecha De Salida',1,0,'C',0);
    $this->Cell(16,10,'HT',1,1,'C',0);

}

// Pie de página
function Footer()
{
  $this->SetY(-30);
  $this->SetFont('Arial','I',12);
  $this->Cell(50,3,'Horas Trabajadas = HT ', 0,0,'c');
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Fecha
    $this->Cell(350,3, date('d') . ' de '. date('M'). ' de '. date('Y'), 0,1,'C');
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$consulta=ConsultarProducto($_GET['Fecha']);

function ConsultarProducto($Fecha)
  {
    $host_db = "localhost";
      $user_db = "root";
      $pass_db = "";
      $db_name = "control";
      $tbl_name = "asistencia_entrada";
      $tbl_name2 = "asistencia_salida";
      $tbl_name3="empleado";

      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
      
      if ($conexion->connect_error) {
      die("La conexion falló: " . $conexion->connect_error);
      }
      
      $buscarUsuario = "SELECT  NEm.Nombre, NEm.Apellido, AEn.cedula, AEn.Fecha_entrada, ASa.Fecha_salida FROM $tbl_name AEn  
      INNER JOIN $tbl_name2 ASa  ON AEn.id = ASa.id INNER JOIN $tbl_name3 NEm ON NEm.Cedula = ASa.cedula WHERE AEn.fecha_entrada LIKE '%".$Fecha."%'";
      

      $result = $conexion->query($buscarUsuario);
      $pdf = new PDF();
      $pdf->AliasNbPages();
      $pdf->AddPage();
      $pdf->SetFont('Times','',12);

      while($filas = mysqli_fetch_array($result))
      {
        
        $pdf->Cell(28,10, utf8_decode ($filas['Nombre']) , 1,0,'c',0);
        $pdf->Cell(28,10, utf8_decode ($filas['Apellido']) , 1,0,'c',0);
        $pdf->Cell(30,10, $filas['cedula'], 1,0,'c',0);
        $pdf->Cell(48,10, $filas['Fecha_entrada'], 1,0,'c',0);
        $pdf->Cell(43,10, $filas['Fecha_salida'], 1,0,'c',0);
        $fechaIn = strtotime($filas['Fecha_entrada']) ;
        $fechaSa = strtotime($filas['Fecha_salida']) ;
        $suma = ($fechaSa - $fechaIn) / 60 / 60;
        $suma = number_format((int)$suma,0,'','');
        $pdf->Cell(16,10, $suma  , 1,1,'c',0  );
        
      }
      $pdf->Output('D','Reporte.pdf');
    }

// Creación del objeto de la clase heredada


?>