<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma Page 1</title>
   <link href="./css/bootstrap.min.css" rel="stylesheet">
   <script src="./js/bootstrap.bundle.min.js" ></script>
   <link href="./bootstrap_test\actes.css" rel="stylesheet">

  </head>
  
  <body>
 

  <form enctype="multipart/form-data" action="" class="row" method="post">
		<div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="nom">Nom</label> 
			<input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp"/>    
        </div>
		
		<div class="form-group col-md-4 col-sm-6 col-12">	
			<label for="prenom" id="1">Prenom</label>
			<input type="text" class="form-control" id="prenom" name="prenom"/>
		</div>	
		<div class="form-group col-md-4 col-sm-6 col-12">
			<label for="date de naissance">Date de naissance</label>
			<input type="date" class="form-control" id="date" name="date"/>
		</div>
		
		
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="password">Password</label> 
            <input type="password" class="form-control" id="password" name="password"/> 
        </div>
   
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="password">Confirm Password</label> 
            <input type="password" class="form-control" id="cpassword" name="cpassword"/>
            <small id="emailHelp" class="form-text text-muted">
            Make sure to type the same password
            </small>
		</div> 
		
		
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="uploaded_file">Choisir la photo:</label> 
			<input type="hidden" name="MAX-FILE-SIZE" value="3000"/>
			<input type="file"  class="form-control" id="File_url" name="File_url" />
        </div>
   
	
    <div class="form-group col-md-4 col-sm-4 col-12">
		<label for="image">Photo</label>
		<img src="./images/oip.jpg" class="rounded-circle" alt="" width="200" height="114" />
    </div>
		<div class="form-check-col-md-3 col-sm-2 col-12">
       
		   <label for="sexe1" class="form-check-label">F</label>  
		
		   <input type="radio" class="form-check-input" id="sexe1" name="sexe" value="F" />
		
		</div>   
		<div class="form-check-col-md-3 col-sm-2 col-12">
       
		  <label for="sexe2" class="form-check-label" >M</label>  
		
		  <input type="radio" class="form-check-input" id="sexe2" name="sexe" value="M" />
		
		</div>  
    <div class="form-group col-md-2 col-sm-3 col-12">
        <button type="submit" class="btn btn-primary" value="uploader">Login</button>
        <input type="button" class="btn btn-primary" value="LIRE" Onclick="lire();"/>
        <input type="button" class="btn btn-danger" value="ECRIRE" Onclick="ecrire();"/>
	</div>
    </form>  
  
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
   
</html>

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
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['nom']) !=''  && isset($_POST['prenom']) !='' && isset($_POST['date']) !='' && isset($_POST['password']) !='' && isset($_POST['cpassword']) !='' && isset($_POST['sexe']) !='' ){
		$nom =   mysqli_real_escape_string($conn, $_POST['nom']);
		$Prenom =  mysqli_real_escape_string ($conn, $_POST['prenom']);
		$Date_de_naissance = mysqli_real_escape_string($conn, $_POST['date']);
		$Password =  mysqli_real_escape_string($conn, $_POST['password']);
		$cpassword =  mysqli_real_escape_string($conn, $_POST['cpassword']);
		$sexe =  mysqli_real_escape_string($conn, $_POST['sexe']);
		
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

}



//========================== SUPPRESION ==================================
	
	// Suppression de l'enregistrement si l'ID est passé via GET
  if (isset($_GET['sup_id'])) {
    $sup_id = intval($_GET['sup_id']);
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sup_id);
    if ($stmt->execute()) {
        echo "Enregistrement supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression: " . $conn->error;
    }
    $stmt->close();
  }
  




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
// ==================================== UPDATE ===========================================
  // modification de l'enregistrement si l'ID est passe via POST
    if (isset($_POST['mod_id'])) {
		// Extraction  des informations envoyer par la methode POST
    extract($_POST);
	// Verification que tout les champs ont ete bien rempli
	if( isset($_POST['nom']) !=''  && isset($_POST['prenom']) !='' && isset($_POST['date']) !='' && isset($_POST['password']) !='' && isset($_POST['cpassword']) !='' && isset($_POST['sexe']) !='' ){
    $req = mysqli_query($conn, "UPDATE user SET nom = '".$nom."' , Prenom = '".$Prenom."' , Date_de_naissance = '".$Date_de_naissance."', Password = '".$Password."', Confirmpassword = '".$cpassword."', sexe = '".$sexe."', File_url = '".$File_url."', WHERE id = $id");
    if($req){ //si la requete a ete effectuer avec succes faite une redirrection
    header("location: actes_de_naissance.php");
    }else{
	$message = "champ non ajoute";}
	} else {
		$message = "message ajoute les champs";
        
    }
    
  }

echo "<center><h3>DONNEES</h3></center>";
echo "<center><h4>le nombre d'enregistrer</h4></center>";
echo "<table id='example' class='table  table-striped nowrap' style='width:100%'>";
echo "<thead>";
echo "<tr>";

echo "<th>Texte</th>";
echo "<th>Password</th>";
echo "<th>Confirmpassword</th>";
echo "<th>Date_de_naissance</th>";
echo "<th>Prenom</th>";
echo "<th>Sexe</th>";
echo "<th>Apercu</th>";
echo "<th>Action</th>";
echo "<th>Modifier</th>";
echo "</tr>"; // En-tête de tableau
echo "</thead>";

// Parcourir les résultats ligne par ligne
echo "<tbody>";
while ($data = $res->fetch_assoc()) {	
    echo "<tr>";
    
    echo "<td>" . htmlspecialchars($data['nom']) . "</td>";
    echo "<td>****</td>";
    echo "<td>****</td>";
    echo "<td>" . htmlspecialchars($data['Date_de_naissance']) . "</td>";
    echo "<td>" . htmlspecialchars($data['Prenom']) . "</td>";
    echo "<td>" . htmlspecialchars($data['sexe']) . "</td>";
    echo "<td><img width='30' src='" . htmlspecialchars($data['File_url']) . "' alt='Image'/></td>";
	echo "<td><a href=\"?sup_id=" . htmlspecialchars($data['id']) . "\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');\">Supprimer</a></td>";
    echo "<td><a href=\"?mod_id=" . htmlspecialchars($data['id']) . "\" onclick=\"return Confirm('Êtes-vous sûr de vouloir modifier cet enregistrement ?');\">Modifier</a></td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";

// ob_end_flush(); // Envoie la sortie mise en tampon au navigateur

mysqli_close($conn);
?>