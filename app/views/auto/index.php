<?php  include("../header.php"); 
        $tipo = $_GET['tipo'];
?> 

<script>
     function singleView(negocio){
         
        var tipo = '<?php echo $tipo; ?>'; 
        window.location = "/app/views/zonas/index.php?negocio="+negocio+"&tipo="+tipo;

    }
    </script>

 <div class="main-content"> 

		<div class="container" > 
                <div class="col-lg-6" style="padding:60px">

                    <div class="well" style="height:350px; overflow-y:auto; cursor:pointer;" onclick="singleView('Venta')">
                    <h2 style="margin-top: 0;">Venta</h2>
                    <img class="img-responsive" src="../sell.jpg"  style="margin:0 auto">
                        </div>

                    </div>
                
                <div class="col-lg-6" style="padding:60px">

                    <div class="well" style="height:350px; overflow-y:auto; cursor:pointer;" onclick="singleView('Renta')">
                     <h2 style="margin-top: 0;">Renta</h2>
                     <img class="img-responsive" src="../rent.jpg" style="margin:0 auto">
                        </div>

                    </div>
                    
                     </div>
    </div>
<?php  include("../footer.php"); ?>