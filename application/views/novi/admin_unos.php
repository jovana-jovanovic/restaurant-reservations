   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-6">
         
         <form method="post" action="<?php print base_url(); ?>Administracija/dodaj_sliku" enctype="multipart/form-data">
 <label for="tbOpis">Opis slike:</label>
 
 <div class="form-group">
 <input class="form-control" type="text" name="tbOpis" id="tbOpis"/>
 </div>

 <label for="uploadSlika">Slika za galeriju:</label>
 
 <div class="form-group forma-dugme">
 <div class="slikaUpload btn btn-success">
 
 <?php print
form_upload(array('id'=>'slika','name'=>'slika','class'=>'upload'))?>

 </div>
 <input type="submit" class="btn btn-success" id="btnPostavi" name="btnPostavi"
value="Postavi"/>
         
 </div>
 </form>
 </div>
 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
 <div id="odgovor-admin">

 <div class="row">
 <div class="col-md-12 text-center">


</div>

            	</div>
            </div>
           </div>
                 	</div>
            </div>
           </div>
       
       
           
                 
                 
	    

