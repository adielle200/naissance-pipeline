<!Doctype html>
<html>
<head>
<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" >
    <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css" rel="stylesheet" >
	<link href="./css/bootstrap.min.css" rel="stylesheet">
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




</body>
</html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
	 <script src="./js/bootstrap.bundle.min.js" ></script>
<script>
new DataTable('#div_user_data',{
	responsive: true
});	
</script>	 