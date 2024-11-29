<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.jpg', 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Ayuntamiento de yecapixtla Mor.'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación:Presidencia Municipal Yecapixtla Morelo"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono:7352091867"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo:PresidenciaYecapixtla@Morelo.com"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal:Presidencia Municipal Yecapixtla Morelo"), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("EMPLEADOS SIYECA"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('CURP'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Numero de telefono'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Nacionalidad'), 1, 1, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Genero'), 1, 1, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Direccion'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Profecion'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Ocupacion'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Tipo de sangre'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('RFC'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Estado civil'), 1, 1, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Numero emergencia'), 1, 1, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Dependencia'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}
//include '../../recursos/Recurso_conexion_bd.php';
require '../php/conexion.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
$consulta_info = "SELECT *from alta_empleados";
$dato_info = $mysqli->query($consulta_info);

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

while($row = $dato_info->fetch_assoc()){      
   $pdf->Cell();
   }


$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
?>