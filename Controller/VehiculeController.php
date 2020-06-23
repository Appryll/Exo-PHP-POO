<?php

require './Models/Vehicule.php';

class vehiculeController
{
	 public function nbVehicule()
	 {
	 	$nbVehicule = new Vehicule();
		
		 return $nbVehicule;
		
	 }

	public function afficherLesVehicules()
	 {
	 	$vehicule = new Vehicule();
	 	$afficher = $vehicule->afficherTousLesVehicules();
		$nbVehicule = $vehicule->nb();
		
		require_once "./Views/listeVehicules.php";

	 }
 
	public function ajoutVehicule()
	{
		if(isset($_POST['submit'])){
			$vehicule = new Vehicule();

			$marque = $vehicule->setMarque($_POST['marque']);
			$modele = $vehicule->setModele($_POST['modele']);
			$couleur = $vehicule->setCouleur($_POST['couleur']);
			$immatriculation = $vehicule->setImmatriculation($_POST['immatriculation']);
			$vehicule->insert($marque, $modele, $couleur, $immatriculation);
		}
		?>

		<h3> Ajouter un vehicule</h3>
		<form action="#" method="post">
		  <div class="form-group">
		    <label>Marque</label>
		    <input type="text" class="form-control" name="marque" required>
		  </div>
		  <div class="form-group">
		    <label>Modele</label>
		    <input type="text" class="form-control" name="modele" required>
		  </div>
		  <div class="form-group">
		    <label>Couleur</label>
		    <input type="text" class="form-control" name="couleur" required>
		  </div>
		  <div class="form-group">
		    <label>Immatriculation</label>
		    <input type="text" class="form-control" name="immatriculation" required>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Ajouter un vehicule</button>
		</form>

		<?php
	}

	public function show($id_vehicule)
	 {
	 	$vehicule = new Vehicule();
	 	$vehiculeById = $vehicule->findById($id_vehicule);

	 	require_once "./Views/editVehicule.php";

	 	if (isset($_POST['submit'])) {
	 		foreach ($vehiculeById as $value) {
	 			$marque = $value->setMarque($_POST['marque']);
				$modele = $value->setModele($_POST['modele']);
	 			$couleur = $value->setCouleur($_POST['couleur']);
	 			$immatriculation = $value->setImmatriculation($_POST['immatriculation']);

	 			$id_vehicule=  $value->getId_vehicule();

	 			return $value->update($id_vehicule, $marque, $modele, $couleur, $immatriculation);
	 		}
	 	}
	}

	/**** SUPPRIMER UN VEHICULE VIA SON ID ***/

	 public function delete($id_vehicule)
	 {
	 	$vehicule = new Vehicule();
	 	return $vehicule->deleteById($id_vehicule);
	 }
}

?>