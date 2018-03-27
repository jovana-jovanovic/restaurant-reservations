   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
            	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 forma">
 <?php print form_open('Registracija/validate_registration'); ?>
<h2>Forma za registraciju</h2>
<hr class="colorgraph">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
 <?php print form_input(array('id'=>'tbIme','name'=>'tbIme','class'=>'form-control
input-lg forma-elementi','placeholder'=>'Ime','tabindex'=>'1','value'=> set_value('tbIme')));?>
</div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbIme','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
 <?php print
form_input(array('id'=>'tbPrezime','name'=>'tbPrezime','class'=>'form-control input-lg formaelementi','placeholder'=>'Prezime','tabindex'=>'2','value'=>
set_value('tbPrezime')));?>
 </div>
<div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbPrezime','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>
</div>
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
    <div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
 <?php print form_input(array('id'=>'tbEmail','name'=>'tbEmail','class'=>'form-control input-lg forma-elementi','placeholder'=>'EmailAdresa','tabindex'=>'3','value'=> set_value('tbEmail')));?>
</div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbIme','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>
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
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="form-group">
 <?php print
form_password(array('id'=>'tbCPassword','name'=>'tbCPassword','class'=>'form-control input-lg formaelementi','placeholder'=>'Confirm
Password','tabindex'=>'5'));?>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <?php print form_error('tbCPassword','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>

</div>
</div>
 
 <hr class="colorgraph">
 <div class="row">
<div class="col-xs-12 col-md-6"><?php print
form_submit('tbRegister','Registracija','class="btn btn-success btn-block btn-lg btn-forma"'); ?></div>
<div class="col-xs-12 col-md-6"><?php print
anchor('Logovanje','Login','class="btn btn-success btn-block btn-lg btn-forma-login"')?></div>
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
	    

