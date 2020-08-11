<?php 
include_once('myparam.inc.php');

$idcom = new mysqli(HOST, USER, PASS, "formulaire");

if (!$idcom) {
    echo "Connexion impossible";
    exit();
}

if(!empty($_POST['nom']) && (!empty($_POST['prenom'])) && (!empty($_POST['datenaissance'])) && (!empty($_POST['lieu'])) 
&& (!empty($_POST['adressepostale'])) && (!empty($_POST['cp'])) && (!empty($_POST['email'])) && (!empty($_POST['site'])) 
&& (!empty($_POST['telephone'])) && (!empty($_POST['semestre'])) && (!empty($_POST['niveauhtml'])) && (!empty($_POST['connaissances']))) {
$nom = $idcom -> escape_string($_POST['nom']);
$prenom = $idcom -> escape_string($_POST['prenom']);
$datenaissance = $idcom -> escape_string($_POST['datenaissance']);
$villenaissance = $idcom -> escape_string($_POST['lieu']);
$adresse = $_POST['adressepostale'];
$codepostal = $idcom -> escape_string($_POST['cp']);
$email = $_POST['email'];
$site = $_POST['site'];
$telephone = $_POST['telephone'];
$semestre = $idcom -> escape_string($_POST['semestre']);
$niveau  = $idcom -> escape_string($_POST['niveauhtml']);
$connaissances = $_POST['connaissances'];

$connaissancesToString = implode(", ",$connaissances);
$requete = "INSERT INTO formulaire (NOM, PRENOM, DATENAISSANCE, VILLENAISSANCE, ADRESSE, CODEPOSTAL, EMAIL, SITEWEB, TELEPHONE, SEMESTRE, NIVEAU, CONNAISSANCES) 
VALUES ('$nom', '$prenom', '$datenaissance', '$villenaissance', '$adresse', '$codepostal', '$email', '$site', '$telephone', '$semestre', '$niveau', '$connaissancesToString')";

/* for ($i = 0; $i < sizeof($connaissances); $i++) { 
$requete .= "INSERT INTO formulaire (CONNAISSANCES) VALUES ('$connaissances[$i]')";
} */
    
$result = $idcom -> query($requete);

if($result) {
    echo "Vous avez bien été enregisté au numéro: ".$idcom -> insert_id;
} else {
    echo "Erreur".$idcom -> error;
    }

$idcom -> close();
} else {
    echo "Veuillez remplir le formulaire";
}
?>