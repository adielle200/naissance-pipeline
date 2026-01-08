<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function enregistrer_js (){
   
   $.ajax({url: "actes_de_naissance.php", success: function(result){
    $("#div1").html(result);
  }});
  
  
}
$(document).ready(function(){


 
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button onclick="enregistrer_js ();">Get External Content</button>

</body>
</html>