<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma Page 1</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
   <script src="./js/bootstrap.bundle.min.js" ></script>
   <link href="./bootstrap_test\actes .css" rel="stylesheet">
  </head>
  
  <body>
 

  <form enctype="multipart/form-data" action="dossier.php" class="row" method="post">
		<div class="form-group col-md-4 col-sm-6 col-12"> 
            <label for="username">Nom</label> 
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
        <button type="submit" class="btn btn-primary" value="uploader">
        Login
        </button>
	</div>
    </form>  
  
   </body>
   
   
</html>