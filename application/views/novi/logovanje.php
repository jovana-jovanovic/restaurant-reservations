   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
            	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 forma">
 <?php print form_open('Logovanje/login'); ?>
<h2>Forma za logovanje</h2>
<hr class="colorgraph">
<div class="row">

<div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
 <?php print form_input(array('id'=>'tbUsername','name'=>'tbUsername','class'=>'form-control
input-lg forma-elementi','placeholder'=>'Korisnicko ime','tabindex'=>'1','value'=> set_value('tbUsername')));?>
</div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbUsername','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>
</div>
   
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
<?php print
form_password(array('id'=>'tbPassword','name'=>'tbPassword','class'=>'form-control input-lg formaelementi','placeholder'=>'Password','tabindex'=>'4'));?>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbPassword','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>

</div>

</div>
 
 <hr class="colorgraph">
 <div class="row">
<div class="col-xs-12 col-md-6"><?php print
form_submit('tbLogin','Logovanje','class="btn btn-success btn-block btn-lg btn-forma"'); ?></div>
<div class="col-xs-12 col-md-6"><?php print
form_submit('tbRegister','Registracija','class="btn btn-success btn-block btn-lg btn-forma"'); ?></div>

</div>

<?php print form_close(); ?>
 <?php if(isset($poruka)){
 echo $poruka;
 }
 if(isset($poruka1)){
 echo $poruka1;
 }
 ?>
</div>

</div>

            	</div>
            </div>
           </div>
	    

