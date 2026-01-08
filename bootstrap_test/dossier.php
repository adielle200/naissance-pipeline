<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Acte";
$_FILES["userfile"]["name"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query with corrected table name and values
$sql = "INSERT INTO user (nom, password, confirmpassword, prenom, date_de_naissance, sexe)
VALUES ('Doe', 'DoePasswordHash', 'DoePasswordHash', 'Anna', '2007-07-06', 'Feminin')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
//Envoie DUN TABLEAU DE FICHIER


foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        // basename() peut empêcher les attaques "filesystem traversal";
        // une autre validation/nettoyage du nom de fichier peux être appropriée
        $name = basename($_FILES["pictures"]["name"][$key]);
        move_uploaded_file($tmp_name, "data/$name");
    }
}


// affichage des resultats
$req="SELECT * FROM user";

// On créé la requête
$req = "SELECT * FROM user";
 
// on envoie la requête
$res = $conn->query($req);
 
// on va scanner tous les tuples un par un
echo "<user>";
while ($data = mysqli_fetch_array($res)) {
    // on affiche les résultats
    echo "<tr><td>".$data['id']."</td><td>".$data['texte']."</td></tr>";
}
echo "</table>";


//Envoie de la requete
$res=mysql_query($req);

//ON va scanner tout les types un par un
  echo"<table>"
  // On créé la requête
$req = "SELECT * FROM table1";
 
// on envoie la requête
$res = $conn->query($req);
 
// on va scanner tous les tuples un par un
while ($data = mysqli_fetch_array($res)) {
    // on affiche les résultats
    echo "<tr><td>".$data['id']."</td><td>".$data['texte']."</td></tr>";
}
echo "</table>";

$conn->close();
?>


