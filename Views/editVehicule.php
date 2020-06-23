<?php

	foreach ($vehiculeById as $vehicule) {
?>
			<h2> Edit un vehicule</h2>
			<form action="#" method="post">
			  <div class="form-group">
			    <label>Id_vehicule</label>
			    <input type="text" class="form-control" name="id" required value="<?php echo $vehicule->getId_vehicule(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Marque</label>
			    <input type="text" class="form-control" name="marque" required value="<?php echo $vehicule->getMarque(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Modele</label>
			    <input type="text" class="form-control" name="modele" required value="<?php echo $vehicule->getModele(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Couleur</label>
			    <input type="text" class="form-control" name="couleur" required value="<?php echo $vehicule->getCouleur(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Immatriculation</label>
			    <input type="text" class="form-control" name="immatriculation" required value="<?php echo $vehicule->getImmatriculation(); ?>">
			  </div>

			 
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>

<?php
	}
?>