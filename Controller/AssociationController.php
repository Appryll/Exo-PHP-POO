<?php

require './Models/Association.php';

class associationController
{
	 public function nbAssociation()
	 {
	 	$association = new Association();
		
		 return $nbAssociation;	 
	 }

	public function afficherLesAssociations()
	 {
	 	$association = new Association();
	 	$afficher = $association->afficherTousLesAssociations();

		 $nbAssociation = $association->nb();
		 
		 require_once "./Views/listeAssociation.php";
		
	 }

	public function ajoutAssociation()
	{
		if(isset($_POST['submit'])){
			$association = new Association();
			
			$id_vehicule = $association->setId_vehicule($_POST['id_vehicule']);
			$id_conducteur = $association->setId_conducteur($_POST['id_conducteur']);
		
			$association->insert($id_vehicule, $id_conducteur);
		}
		?>

		<h3> Ajouter association</h3>
		<form action="#" method="post">
		  <div class="form-group">
		    <label>Id_Vehicule</label>
		    <input type="text" class="form-control" name="id_vehicule" required>
		  </div>
		  <div class="form-group">
		    <label>Id_Conducteur</label>
		    <input type="text" class="form-control" name="id_conducteur" required>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Ajouter association</button>
		</form>

		<?php
	}

	public function show($id_association)
	{
	 	$association = new Association();
	 	$associationById = $association->findById($id_association);

	 	require_once "./Views/editAssociation.php";

	 	if (isset($_POST['submit'])) {
	 		foreach ($associationById as $value) {

				$id_vehicule = $value->setId_vehicule($_POST['id_vehicule']);
	 			$id_conducteur = $value->setId_conducteur($_POST['id_conducteur']);

	 			$id_association=  $value->getId_association();

				return $value->update($id_association, $id_vehicule, $id_conducteur);
	 		}
	 	}
	}

	/**** SUPPRIMER UNE ASSOCIATION VIA SON ID ***/

	 public function delete($id_association)
	 {
	 	$association = new Association();
	 	return $association->deleteById($id_association);
	 }
}

?>