<?php 
//include this file in the server.php, for error validation and verification
if (count($errors) > 0) :
 ?>

  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>