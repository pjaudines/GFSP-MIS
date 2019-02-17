
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
        $this->Cell(292,5,'(34)-434-2881
        ',0,0,'C');
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,5,'',0,0,'C');
        $this->Cell(350,5,' Date Report: '.$_POST['currentDate'],0,0,'C');
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
        $this->Cell(145,8,'Inspection List as of Year 2019',0,0,'C');
        $this->Ln();
        $this->Cell(0.1);
        $this->SetFont('Times','B',10);
        $this->Cell(40,8,'Client Name',1,0,'C');
        $this->Cell(50,8,'Client Address',1,0,'C');
        $this->Cell(45,8,'Item Name',1,0,'C');
        $this->Cell(45,8,'Item Type',1,0,'C');
        $this->Cell(35,8,'Status',1,0,'C');
        $this->Cell(30,8,'Quantity',1,0,'C');
        $this->Cell(40,8,'Location',1,0,'C');
        $this->Ln();

    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query(" select * from `transactions_inspection-items`,`transactions_inspection` WHERE `transactions_inspection-items`.inspectionID=transactions_inspection.inspectionID");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(0.1);
            $this->Cell(40,8,$data->inspectionClientName,1,0,'C');
            $this->Cell(50,8,$data->inspectionAddress,1,0,'C');
            $this->Cell(45,8,$data->itemName,1,0,'C');
            $this->Cell(45,8,$data->itemType,1,0,'C');
            $this->Cell(35,8,$data->itemStatus,1,0,'C');
            $this->Cell(30,8,$data->itemQuantity,1,0,'C');
            $this->Cell(40,8,$data->itemLocation,1,0,'C');
            $this->Ln();
        }
            $this->Ln(15);
            $this->Cell(55,5,' Prepared By: '.$_POST['user'],0,0,'C');
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
