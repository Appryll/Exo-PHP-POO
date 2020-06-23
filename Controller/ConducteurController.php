<?php

require './Models/Conducteur.php';

class conducteurController
{
	 public function nbConducteur()
	  {
	  	$conducteur = new Conducteur();
		
		 return $nbConducteur;
		
	  }

	public function afficherLesConducteurs()
	 {
	 	$conducteur = new Conducteur();
	 	$afficher = $conducteur->afficherTousLesConducteurs();

		 $nbConducteur = $conducteur->nb();
		 
		 require_once "./Views/listeConducteur.php";

	 }

	public function ajoutConducteur()
	{
		if(isset($_POST['submit'])){
			$conducteur = new Conducteur();

			$prenom = $conducteur->setPrenom($_POST['prenom']);
			$nom = $conducteur->setNom($_POST['nom']);
			$conducteur->insert($prenom, $nom);

		}
		?>

		 <h3> Ajouter un conducteur</h3>
		<form action="#" method="post">
		  <div class="form-group">
		    <label>Prenom</label>
		    <input type="text" class="form-control" name="prenom" required>
		  </div>
		  <div class="form-group">
		    <label>Nom</label>
		    <input type="text" class="form-control" name="nom" required>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Ajouter un conducteur</button>
		</form>

		<?php
	}	

	public function show($id_conducteur)
	{
	 	$conducteur = new Conducteur();
	 	$conducteurById = $conducteur->findById($id_conducteur);

		require_once "./Views/editConducteur.php";

	 	if (isset($_POST['submit'])) {
	 		foreach ($conducteurById as $value) {
	 			
	 			$prenom = $value->setPrenom($_POST['prenom']);
	 			$nom = $value->setNom($_POST['nom']);

	 			$id_conducteur= $value->getId_conducteur();

				return $value->update($id_conducteur, $prenom, $nom);
 		 }
	 	 }
	}

	/**** SUPPRIMER UN CONDUCTEUR VIA SON ID ***/

	 public function delete($id_conducteur)
	 {
	 	$conducteur = new Conducteur();
	 	return $conducteur->deleteById($id_conducteur);
	 }
}

?>