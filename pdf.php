<?php
session_start();

require('fpdf.php');

class PDF extends FPDF
{

function Header()
{
$this->Ln(10);
	global $titre;

	// Arial gras 15
	$this->SetFont('courier','B',16);
	// Calcul de la largeur du titre et positionnement
	$w = $this->GetStringWidth($titre)+15;
	$this->SetX((210-$w)/2);
	// Couleurs du cadre, du fond et du texte
	
	$this->SetTextColor(0,128,255);
	
	// Titre
	$this->Cell($w,9,$titre,3,1,'C',false);
	// Saut de ligne
	$this->Ln(15);
}

function Footer()
{
	// Positionnement à 1,5 cm du bas
	$this->SetY(-15);
	// Arial italique 8
	$this->SetFont('times','',8);
	// Couleur du texte en gris
	$this->SetTextColor(153);
	// Numéro de page

	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function CorpsDocument($nom,$prenom,$email,$datenaissance,$diplome,$niveau,$etablissement,$photo)
{
    
	// $this->SetFont('courier','B',14);
	// $this->SetLeftMargin(10);
	// $this->SetFillColor(255,204,229);
	// $this->Cell(0,5,"Recu d'Inscription :   ",0,1,'C',true);
	$this->Ln(15);
	$this->SetFont('courier','B',12);
	$this->SetLeftMargin(60);
	$this->Cell(0,6, " Nom : $nom.",'C');$this->Image($photo,86,150,30);
	$this->Ln(12);
	$this->Cell(0,6," Prenom : $prenom.",'C');
	$this->Ln(12);
	$this->Cell(0,6," E-mail : $email.",'C');
	$this->Ln(12);
	$this->Cell(0,6," Date de naissance : $datenaissance.",'C');
	$this->Ln(12);
	$this->Cell(0,6," Diplome : $diplome.",'C');
    $this->Ln(12);
	$this->Cell(0,6," Niveau : $niveau.",'C');
    $this->Ln(12);
	$this->Cell(0,6," Etablissement : $etablissement.",'C');
}
function InsererDansPDF($nom,$prenom,$email,$datenaissance,$diplome,$niveau,$etablissement,$photo)
{
	$this->AddPage();
	$this->CorpsDocument($nom,$prenom,$email,$datenaissance,$diplome,$niveau,$etablissement,$photo);
}
}
if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['email']) && isset($_SESSION["naissance"]) && isset($_SESSION["diplome"]) && isset($_SESSION["niveau"]) && isset($_SESSION["etablissement"]) && isset($_SESSION['photo'])){
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $email = $_SESSION["email"];
    $datenaissance = $_SESSION["naissance"];
    $diplome = $_SESSION["diplome"];
    $niveau = $_SESSION["niveau"];
    $etablissement = $_SESSION["etablissement"];
    $photo = $_SESSION['photo'];
$pdf = new PDF();
$titre = 'Recu de l\'inscription';
$pdf->SetTitle($titre);
$pdf->InsererDansPDF($nom,$prenom,$email,$datenaissance,$diplome,$niveau,$etablissement,$photo);
$pdf->Output();
}