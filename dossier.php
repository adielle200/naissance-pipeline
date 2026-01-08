<?php
// ob_start(); // Commence la mise en tampon de sortie

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Acte";
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit;

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
		$sexe = isset($_POST['sexe']) ? mysqli_real_escape_string($conn, $_POST['sexe']):'';
		
		  $file_extension = pathinfo($_FILES["File_url"]["name"], PATHINFO_EXTENSION);
		$File_url = "./images/".date("YmdHis")."_".rand(100,999).'.'.$file_extension;
	
		if (!move_uploaded_file($_FILES["File_url"]["tmp_name"], $File_url)) {

        }
		
		
		
		$sql = "INSERT INTO user (nom, Prenom, Date_de_naissance, Password, Confirmpassword, File_url, sexe) 
		VALUES ('$nom', '$Prenom', '$Date_de_naissance', '$Password', '$cpassword', '$File_url', '$sexe')";
		 if($conn->query($sql) === TRUE){
				   echo "vos donnéesont ete envoyer";
		} else {
		echo "echec : " . $conn->error;
		}	


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
    echo "<tr><td>".$data['id']."</td><td>".$data['nom']."</td>
	<td>".$data['Password']."</td>
	<td>".$data['Confirmpassword']."</td>
	<td>".$data['Date_de_naissance']."</td>
	<td>".$data['Prenom']."</td>
	<td>".$data['sexe']."</td>
	<td>".$data['File_url']."</td>
	</tr>";
	}

echo "</table>";


$conn->close();
}
// ob_end_flush(); // Envoie la sortie mise en tampon au navigateur
?>