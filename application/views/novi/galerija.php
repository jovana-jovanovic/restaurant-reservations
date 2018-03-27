   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
         <div class="galerija">
 <h3>Galerija</h3>
 <ul class="row" id="lightGallery">
 <?php if(!empty($slike)){
 for($i=0;$i<count($slike);$i++){
 ?>
 <div class="col-lg-2 col-md-3 col-xs-6">
     <?php print "<a  href='".base_url().$slike[$i]->putanja."' data-lightbox='roadtrip'>" ;?>
  <img  style="width:150px;height:100px;" src="<?php print base_url(). $slike[$i]->thumb?>" alt="<?php print $slike[$i]->opis ?>"/>
<?php print "</a>"; ?>
 </div> 
 <?php
 }
 }
 ?>
 </ul><br/><br/>
</div>
 <div class="row">
 <div class="col-md-12 text-center">
 <?php echo $pagination; ?>

</div>

            	</div>
            </div>
           </div>
	    

