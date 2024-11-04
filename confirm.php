<?php
// informatie voor verzending
$ontvanger = 'test@localhost';
$onderwerp = 'Inschrijving fotowedstrijd';
//stel het bericht samen
$bericht = 'Naam: '.$_POST['naam'].'
Straat: '.$_POST['straat'].'
Gemeente: '.$_POST['postcode'].' '.$_POST['gemeente'].'
Telefoonnummer: '.$_POST['telefoon'].'
E-mail adres: '.$_POST['email'].'
Geboortedatum: '.$_POST['geboortedatum'].'
Titel: '.$_POST['titel'].'
Camera: '.$_POST['camera'].'
Lens: '.$_POST['lens'].'
Commentaar: '.$_POST['commentaar'];
//header-informatie
$verzender = 'From: '.$_POST['naam'].' <'.$_POST['email'].'>';
//verzend bericht
mail($ontvanger,$onderwerp, $bericht, $verzender);
//sessie maken met gegevens uit het formulier
session_start();
$_SESSION['naam'] = $_POST['naam'];
$_SESSION['straat'] = $_POST['straat'];
$_SESSION['postcode'] = $_POST['postcode'];
$_SESSION['gemeente'] = $_POST['gemeente'];
$_SESSION['telefoon'] = $_POST['telefoon'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['geboortedatum'] = $_POST['geboortedatum'];
$_SESSION['titel'] = $_POST['titel'];
$_SESSION['camera'] = $_POST['camera'];
$_SESSION['lens'] = $_POST['lens'];
$_SESSION['commentaar'] = $_POST['commentaar'];
//een nieuwe pagina openen
header("Location: ../begin.php?page=upload");
?>
<?php
function Save(){
    $servername= "localhost";
    $username="steven";
    $password="123";
    $dbname="test";

    $conn= new mysqli($servername,$username,$password,$dbname);
    
    if ($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }
    $sql  = "INSERT INTO wedstrijd(Naam,Straat,Postcode,Gemeente,Telefoon,Email,Geboorte,Foto,Camera,Lens,Beschrivingr                                     )
    VALUES ('".$_POST{"naam"}."','".$_POST{"straat"}."','".$_POST{"postcode"}."','".$_POST{"gemeente"}."','".$_POST{"telefoon"}."','".$_POST{"e-mail"}."','".$_POST{"geboortedatum"}."','".$_POST{"foto"}."','".$_POST{"camera"}."','".$_POST{"lens"}."','".$_POST{"beschrijven"}."')";
    
    echo $sql;
    if($conn->query($sql)=== TRUE){
        echo "New record created";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>