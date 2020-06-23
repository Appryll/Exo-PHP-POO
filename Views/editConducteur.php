<?php

	foreach ($conducteurById as $conducteur) {
?>
			<h2> Edit un conducteur</h2>
			<form action="#" method="post">
			  <div class="form-group">
			    <label>Id_conducteur</label>
			    <input type="text" class="form-control" name="id" required value="<?php echo $conducteur->getId_conducteur(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Prenom</label>
			    <input type="text" class="form-control" name="prenom" required value="<?php echo $conducteur->getPrenom(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Nom</label>
			    <input type="text" class="form-control" name="nom" required value="<?php echo $conducteur->getNom(); ?>">
			  </div>

			 
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>

<?php
	}
?>