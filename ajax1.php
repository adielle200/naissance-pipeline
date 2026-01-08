<?php
include('content.php')

?>
<script>
$(document).ready(function(){
	
	function supprimer(id) {
		if(confirm("etes vous sure de vouloir le supprimer"))
		{
			$.ajax({
				url:'delete.php',
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					fetch_data_table();
					document.getElementById("output").src=="";
				}
	});
		}
         else
		 {
        return false;
		 }
	}		 
function fetch_data_table(){
         var source = "";
         $.ajax({
             url:"actes_de_naissance.php",
			 method:"POST",
			 data:"source="+source,
			 success:function(data){
				 $("#div_user_data").show();
				 $("#div_user_data").html(data);
			 }
		 });
}
	
	
	
});





</script>