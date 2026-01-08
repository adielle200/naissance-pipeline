<?php
ob_start(); // Commence la mise en tampon de sortie

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Acte";
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
exit;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//envoi des donnees du formulaire
if($_SERVER["REQUEST_METHOD"]=="POST"){
		$nom =isset($_POST['nom']) ?  mysqli_real_escape_string($conn, $_POST['nom']):'';
		$Prenom =isset($_POST['prenom']) ?  mysqli_real_escape_string ($conn, $_POST['prenom']):'';
		$Date_de_naissance =isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']):'';
		$Password =isset($_POST['password']) ?  mysqli_real_escape_string($conn, $_POST['password']):'';
		$cpassword = isset($_POST['cpassword']) ? mysqli_real_escape_string($conn, $_POST['cpassword']):'';
		$File_url = isset($_POST['File_url']) ? mysqli_real_escape_string($conn, $_POST['File_url']):'';
		$sexe = isset($_POST['sexe']) ? mysqli_real_escape_string($conn, $_POST['sexe']):'';
		
		$sql = "INSERT INTO user (nom, Prenom, Date_de_naissance, Password, Confirmpassword, File_url, sexe) 
		VALUES ('$nom', '$Prenom', '$Date_de_naissance', '$Password', '$cpassword', '$File_url', '$sexe')";
 if($conn->query($sql) === TRUE){
           echo "vos donnéesont ete envoyer";
} else {
echo "echec : " . $conn->error;
}	
/*
// SQL query with corrected table name and values
$sql = "INSERT INTO user (nom, Password, Confirmpassword, Prenom, Date_de_naissance, sexe, File_url)
VALUES ('Doe', 'coco', 'coco', 'Anna', '2007-07-06', 'Feminin', 12)";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

*/


$sql = "SELECT*FROM user";

// affichage
// On créé la requête
$req = "SELECT * FROM user";

// Envoi de la requête
$res = $conn->query($req);

// Vérifiez si la requête a réussi
if ($res === false) {
    die("Erreur dans la requête : " . $conn->error);
}

// Affichage des résultats
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Texte</th>
<th>Password</th>
<th>Confirmpassword</th>
<th>Date_de_naissance</th>
<th>Prenom</th>
<th>Sexe</th>
<th>File_url</th>
</tr>"; // En-tête de tableau

// Parcourir les résultats ligne par ligne
while ($data = $res->fetch_assoc()) {
    echo "<tr><td>".$data['id']."</td><td>".$data['Nom']."</td>
	<td>".$data['Password']."</td>
	<td>".$data['Confirmpassword']."</td>
	<td>".$data['Date_de_naissance']."</td>
	<td>".$data['Prenom']."</td>
	<td>".$data['sexe']."</td>
	<td>".$data['File_url']."</td>
	</tr>";
	}

echo "</table>";

var_dump($_FILES);
$uploaddir = './naissance/FILES/';

 // Vérifier si une image a été téléchargée
    if (empty($_FILES["image_file"]["tmp_name"])) {
        header("Location:index.php?message=er");
    }

    // Obtenir le nom de l'image sans l'extension
    $file_basename = pathinfo($_FILES["File_url"]["name"], PATHINFO_FILENAME);


    // Renommer l'image en y ajoutant le nom de base et la date et l'heure
    $file_extension = pathinfo($_FILES["File_url"]["name"], PATHINFO_EXTENSION);
    $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
	
	    // Échapper les données pour éviter les attaques d'injection SQL
    $new_image_name = $conn->real_escape_string($new_image_name);


    // Requête d'insertion dans la table "image"
    $sql = "INSERT INTO File_url (libelle) VALUES ('$new_image_name')";


    if ($conn->query($sql) === TRUE) {
        // Déplacer l'image vers le dossier "images"
        $target_directory = "images/";
        $target_path = $target_directory . $new_image_name;
        if (!move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_path)) {
            header("Location:dossier.php?message=er");
        }
        //redirection
        header("Location:dossier.php?message=yes");
    } else {
        header("Location:dossier.php?message=no");
    }
$conn->close();
}
ob_end_flush(); // Envoie la sortie mise en tampon au navigateur
?>