
<?php 
require "fpdf/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=gibrosen','root','');


if(isset($_POST["submit"]))
{

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',20);
        $this->Cell(292,5,'Gibrosen Fire Safety Products
        ',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',12);
        $this->Cell(288,5,' Dr. 2, Triple ES Building, Corner Burgos st., 4th Road, Brgy. Villamonte, Bacolod City 
        ',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','B',12);
        $this->Cell(292,5,'+63(34)4342881
        ',0,0,'C');
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,5,'',0,0,'C');
        $this->Ln(15);
        $this->Cell(55,5,' Prepared By: ',0,0,'C');
        $this->Cell(350,5,' Date Report: ',0,0,'C');
        $this->SetLineWidth(0.01);
        $this->Line(25, 85, 310-30, 85);
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',7);
        $this->Cell(0,-10,'Gibrosen Fire Safety Products MIS | Dynamic Technocrats 2018-2019 ',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',8);
        $this->Cell(0,30,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',13);
        $this->Cell(70);
        $this->Cell(145,8,'Inventory Report as of Year 2019',0,0,'C');
        $this->Ln();
        $this->Cell(0.1);
        $this->SetFont('Times','B',10);
        $this->Cell(75,8,'Item Name',1,0,'C');
        $this->Cell(75,8,'Item Type',1,0,'C');
        $this->Cell(35,8,'Available Stocks',1,0,'C');
        $this->Cell(35,8,'Incoming Stocks',1,0,'C');
        $this->Cell(35,8,'Outgoing Stocks',1,0,'C');
        $this->Ln();

    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query(" Select * FROM inventory ORDER BY inventoryItemID");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(0.1);
            $this->Cell(75,8,$data->prodDesc,1,0,'C');
            $this->Cell(75,8,$data->prodType,1,0,'C');
            $this->Cell(35,8,$data->prodStocks,1,0,'C');
            $this->Cell(35,8,$data->prodIncoming,1,0,'C');
            $this->Cell(35,8,$data->prodOutgoing,1,0,'C');
            $this->Ln();
        }

            $this->Ln();
            $this->Cell(480,5,' Approved By ',0,0,'C');
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
}
?>
