<?php

	foreach ($associationById as $association) {
?>
			<h2> Edit une association </h2>
			<form action="#" method="post">
			  <div class="form-group">
			    <label>Id_association</label>
			    <input type="text" class="form-control" name="id_association" required value="<?php echo $association->getId_association(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Id_vehicule</label>
			    <input type="text" class="form-control" name="id_vehicule" required value="<?php echo $association->getId_vehicule(); ?>">
			  </div>
			  <div class="form-group">
			    <label>id_conducteur</label>
			    <input type="text" class="form-control" name="id_conducteur" required value="<?php echo $association->getId_conducteur(); ?>">
			  </div>
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
<?php
	}
?>