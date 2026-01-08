<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma Page 1</title>
   <link href="./css/bootstrap.min.css" rel="stylesheet">
   <script src="./js/bootstrap.bundle.min.js" ></script>
   <link href="./bootstrap_test\actes.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" >
    <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css" rel="stylesheet" >
  </head>
  
  <body>
 
<div id="view">
    <form enctype="multipart/form-data" action="" id="form_acte" class="row" method="post">
        <input type="hidden" id="id" name="id" value="" />
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="nom">Nom</label> 
            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp"/>    
        </div>
        
        <div class="form-group col-md-4 col-sm-6 col-12">    
            <label for="prenom" id="1">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom"/>
        </div>    
        <div class="form-group col-md-4 col-sm-6 col-12">
            <label for="date">Date de naissance</label>
            <input type="date" class="form-control" id="date" name="date"/>
        </div>
        
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="password">Password</label> 
            <input type="password" class="form-control" id="password" name="password"/> 
        </div>
   
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="cpassword">Confirm Password</label> 
            <input type="password" class="form-control" id="cpassword" name="cpassword"/>
            <small id="emailHelp" class="form-text text-muted">
            Make sure to type the same password
            </small>
        </div> 
       
        <div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="File_url">Choisir la photo:</label> 
            <input type="hidden" name="MAX-FILE-SIZE" value="3000"/>
            <input type="file" class="form-control" id="File_url" name="File_url"/>
        </div>
   
        <div class="form-group col-md-4 col-sm-6 col-12">
            <label for="image">Photo</label>
            <img src="./images/oip.jpg" class="rounded-circle" alt="" width="200" height="114" id="image_preview"/>
        </div>
        <div class="form-check col-md-3 col-sm-6 col-12">
            <label for="sexe1" class="form-check-label">F</label>  
            <input type="radio" class="form-check-input" id="sexe1" name="sexe" value="F"/>
        </div>   
        <div class="form-check col-md-3 col-sm-6 col-12">
            <label for="sexe2" class="form-check-label">M</label>  
            <input type="radio" class="form-check-input" id="sexe2" name="sexe" value="M"/>
        </div>  
        <div class="form-group col-md-2 col-sm-6 col-12">
            <button type="submit" id="enregister" class="btn btn-primary" name="action" value="enregister">ENREGISTRER</button>
            <button type="submit" id="modifier" class="btn btn-primary" name="action" value="modifier">MODIFIER</button>
            <input type="button" class="btn btn-dark" value="LIRE" onclick="lire();"/>
        </div>
    </form>  
</div>



   
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
/*if(isset($_POST['action']) == 'enregister' && isset($_POST['nom']) !=''  && isset($_POST['prenom']) !='' && isset($_POST['date']) !='' && isset($_POST['password']) !='' && isset($_POST['cpassword']) !='' && isset($_POST['sexe']) !='' ){
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
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['action'] == 'enregister') {
		
				$nom = mysqli_real_escape_string($conn, $_POST['nom']);
				$Prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
				$Date_de_naissance = mysqli_real_escape_string($conn, $_POST['date']);
				$Password = mysqli_real_escape_string($conn, $_POST['password']);
				$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
				$sexe = mysqli_real_escape_string($conn, $_POST['sexe']);

				// Vérification et traitement de l'upload du fichier
				$file_extension = pathinfo($_FILES["File_url"]["name"], PATHINFO_EXTENSION);
				$File_url = "./images/" . date("YmdHis") . "_" . rand(100, 999) . '.' . $file_extension;
				if (!move_uploaded_file($_FILES["File_url"]["tmp_name"], $File_url)) {
					$File_url = ''; // Si l'upload échoue, mettez une valeur par défaut ou gérez l'erreur
				}
	
        // Code pour l'enregistrement
        if (!empty($nom) && !empty($Prenom) && !empty($Date_de_naissance) && !empty($Password) && !empty($cpassword) && !empty($sexe)) {
            $sql = "INSERT INTO user (nom, Prenom, Date_de_naissance, Password, Confirmpassword, File_url, sexe) 
                    VALUES ('$nom', '$Prenom', '$Date_de_naissance', '$Password', '$cpassword', '$File_url', '$sexe')";
            if ($conn->query($sql) === TRUE) {
                echo "Vos données ont été envoyées.";
            } else {
                echo "Échec : " . $conn->error;
            }
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    } elseif ($_POST['action'] == 'modifier') {
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$nom = mysqli_real_escape_string($conn, $_POST['nom']);
		$Prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
		$Date_de_naissance = mysqli_real_escape_string($conn, $_POST['date']);
		$sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
		$file_extension = pathinfo($_FILES["File_url"]["name"], PATHINFO_EXTENSION);
		$File_url = "./images/" . date("YmdHis") . "_" . rand(100, 999) . '.' . $file_extension;
		if (!move_uploaded_file($_FILES["File_url"]["tmp_name"], $File_url)) {
			$File_url = ''; // Si l'upload échoue, mettez une valeur par défaut ou gérez l'erreur
		}		
		
		if (!empty($nom) && !empty($Prenom) && !empty($Date_de_naissance) && !empty($sexe) && !empty($File_url)) {
			$sql = "UPDATE user SET nom = ?, Prenom = ?, Date_de_naissance = ?, sexe = ?, File_url = ? WHERE id = $id";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sssss", $nom, $Prenom, $Date_de_naissance, $sexe, $File_url);
			
			if ($stmt->execute()) {
				echo "Enregistrement mis à jour avec succès.";
			} else {
				echo "Erreur lors de la mise à jour: " . $stmt->error;
			}
			
			$stmt->close();
		} else {
			echo "Veuillez remplir tous les champs.";
		}
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


/*if (isset($_POST['action']) == 'modifier') {
    $mod_id = intval($_POST['mod_id']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['Prenom']);
    $date = mysqli_real_escape_string($conn, $_POST['Date_de_naissance']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['Confirmpassword']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $File_url = mysqli_real_escape_string($conn, $_POST['File_url']);

    // Vérification que tous les champs ont été bien remplis
    if (!empty($nom) && !empty($prenom) && !empty($date) && !empty($password) && !empty($cpassword) && !empty($sexe)) {
        $sql = "UPDATE user SET nom = ?, Prenom = ?, Date_de_naissance = ?, Password = ?, Confirmpassword = ?, sexe = ?, File_url = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $nom, $prenom, $date, $password, $cpassword, $sexe, $File_url, $mod_id);

        if ($stmt->execute()) {
            echo "Enregistrement mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}*/


  

echo "<center><h3>DONNEES</h3></center>";
echo "<center><h4>Les citoyens enregistres</h4></center>";
echo "<table id='example' class='table  table-striped nowrap' style='width:100%'>";
echo "<thead>";
echo "<tr>";
echo "<th>Nom</th>";
echo "<th>Date_de_naissance</th>";
echo "<th>Prenom</th>";
echo "<th>Sexe</th>";
echo "<th>Photo</th>";
echo "<th>Supprimer</th>";
echo "<th>Modifier</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($data = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($data['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($data['Date_de_naissance']) . "</td>";
    echo "<td>" . htmlspecialchars($data['Prenom']) . "</td>";
    echo "<td>" . htmlspecialchars($data['sexe']) . "</td>";
    echo "<td><img width='30' src='" . htmlspecialchars($data['File_url']) . "' alt='Image'/></td>";
    echo "<td><a class='btn btn-danger ' href=\"?sup_id=" . htmlspecialchars($data['id']) . "\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');\">Supprimer</a></td>";
    echo "<td><button id='editer' class='btn btn-modifier btn-success' 
            onclick=\"populateForm('" . htmlspecialchars($data['id']) . "', 
                                     '" . htmlspecialchars($data['nom']) . "', 
                                     '" . htmlspecialchars($data['Prenom']) . "', 
                                     '" . htmlspecialchars($data['Date_de_naissance']) . "', 
                                     '" . htmlspecialchars($data['sexe']) . "', 
                                     '" . htmlspecialchars($data['File_url']) . "');\">Modifier</button></td>";
    echo "</tr>";
}


echo "</tbody>";
echo "</table>";

// ob_end_flush(); // Envoie la sortie mise en tampon au navigateur
mysqli_close($conn);
?>
<script>
function lire() {
    // Sélectionner l'élément input et récupérer sa valeur
    var nom = document.getElementById("nom").value;
    // Afficher la valeur
    alert(nom);
	 // Sélectionner l'élément input et récupérer sa valeur
    var prenom = document.getElementById("prenom").value;
    // Afficher la valeur
    alert(prenom);
	 // Sélectionner l'élément input et récupérer sa valeur
    var date = document.getElementById("date").value;
    // Afficher la valeur
    alert(date);
	 // Sélectionner l'élément input et récupérer sa valeur
    var password = document.getElementById("password").value;
    // Afficher la valeur
    alert(password);
	 // Sélectionner l'élément input et récupérer sa valeur
    var cpassword = document.getElementById("cpassword").value;
    // Afficher la valeur
    alert(cpassword);
	 // Sélectionner l'élément input et récupérer sa valeur
    // Afficher la valeur
	 // Sélectionner l'élément input et récupérer sa valeur
    var File_url = document.getElementById("File_url").value;
    // Afficher la valeur
    alert(File_url);
	 var sexe = document.getElementById("sexe").checked;
    // Afficher la valeur
    alert(sexe);
}

 
</script>

<script>
// document.querySelectorAll('.btn-modifier').forEach(button => {
    // button.addEventListener('click', function() {
        // document.getElementById('nom').value = this.getAttribute('data-nom');
        // document.getElementById('prenom').value = this.getAttribute('data-prenom');
        // document.getElementById('date').value = this.getAttribute('data-date');
        // document.getElementById('File_url').setAttribute('data-file', this.getAttribute('data-file'));

        // if (this.getAttribute('data-sexe') === 'F') {
            // document.getElementById('sexe1').checked = true;
        // } else {
            // document.getElementById('sexe2').checked = true;
        // }

        // document.getElementById('image_preview').src = this.getAttribute('data-file');
    // });
// });

function populateForm(id, nom, prenom, date, sexe, File_url) {
    document.getElementById('id').value = id;
    document.getElementById('nom').value = nom;
    document.getElementById('prenom').value = prenom;
    document.getElementById('date').value = date;
    document.getElementById('sexe').value = sexe;

    if (sexe === 'F') {
        document.getElementById('sexe1').checked = true;
    } else {
        document.getElementById('sexe2').checked = true;
    }

    document.getElementById('File_url').setAttribute('data-file', File_url);
    document.getElementById('image_preview').src = File_url;

    document.getElementById('view').scrollIntoView();
}


  
 $(document).ready(function() {
    $("#modifier").hide();
    $(".btn-modifier").click(function() {
        $("#modifier").show(); 
        $("#enregister").hide(); 
    });
});


$(document).ready(function sendData(){
	var nom = document.getElementById("nom").value;
		var prenom = document.getElementById("prenom").value;
			var date = document.getElementById("date").value;
				var password = document.getElementById("password").value;
					var cpassword = document.getElementById("cpassword").value;
						var sexe = document.getElementById("sexe").value;
							var File_url = document.getElementById("File_url").value;
$.ajax({
  type: 'post',
  url: 'actes_de_naissance.php',
  data: {
	  nom:nom,
	  prenom:prenom,
	   date:date,
	    password:password,
		 cpassword:cpassword,
		  sexe:sexe,
		   File_url:File_url,
  },   
  success: function



			


</script>
function sendData()
{
  var name = document.getElementById("name").value;
  var age = document.getElementById("age").value;
  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      name:name,
      age:age
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}

