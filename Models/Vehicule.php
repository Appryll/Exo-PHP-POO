<?php
 
 class Vehicule
 {
 	private $id_vehicule;
 	private $marque;
 	private $modele;
 	private $couleur;
	private $immatriculation;
	 
 	public function getId_vehicule()
 	{
 		return $this->id_vehicule;
 	}

 	public function getMarque()
 	{
 		return $this->marque;
 	}

 	public function setMarque($value)
 	{
 		return $this->marque = $value;
 	}
 	public function getModele()
 	{
 		return $this->modele;
 	}

 	public function setModele($value)
 	{
 		return $this->modele = $value;
 	}

 	public function getCouleur()
 	{
 		return $this->couleur;
 	}

 	public function setCouleur($value)
 	{
 		return $this->couleur = $value;
	}
	 
	 public function getImmatriculation()
 	{
 		return $this->immatriculation;
 	}

 	public function setImmatriculation($value)
 	{
 		return $this->immatriculation = $value;
 	}


 	/// ACCES BDD ///

 	public function accesBaseDeDonnee()
 	{
 		try{
			$db =new PDO('mysql:host=localhost;dbname=vtc', "root", "");
		}
		catch(PDOException $e){
			print "Erreur!";
			die;
		}
		return $db;
 	}

 	 public function nb()
 	 {
 	$baseDeDonne = $this->accesBaseDeDonnee();
 	$sql = $baseDeDonne->prepare("SELECT COUNT(*) FROM `vehicule`");

 		return $sql->execute();

	 }
	 
	 //****AFFICHER TOUS LES VEHICULES****/

 	 public function afficherTousLesVehicules()
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM vehicule");

 	 	$sql->execute();

 	 	$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'vehicule');
 		
		return $resultat;
	 }

	//****INSERT VEHICULE A LA BDD****/


 	public function insert($marque, $modele, $couleur, $immatriculation)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$requete = $baseDeDonne->prepare(" INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('$marque', '$modele', '$couleur', '$immatriculation')");

 		if(!$requete->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
 	}

	 //****SELECT TOUT WHERE = ID CONDUCTEUR****/

 	 public function findById($id_vehicule)
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM vehicule WHERE id_vehicule= ".$id_vehicule);

 	 	$sql->execute();

 	 	$getResultat = $sql->fetchAll(PDO::FETCH_CLASS, 'vehicule');

 	 	return $getResultat;
	  }
	  
	  //****UPDATE WHERE = ID CONDUCTEUR ****/

 	 public function update ($id_vehicule, $marque, $modele, $couleur, $immatriculation)
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("UPDATE vehicule SET marque = '".$marque."', modele = '" .$modele."', couleur =
 	 		'".$couleur."', immatriculation = '" .$immatriculation."' WHERE id_vehicule = " .$id_vehicule);

 	 	if(!$sql->execute()){
 	 		die("Houps, une erreur");
 	 	}

 		header("Location: index.php");
 	 }

	 //****DELETE WHERE = ID CONDUCTEUR ****/
	 
	 public function deleteById($id_vehicule) 
	 {
         $db = $this->accesBaseDeDonnee();
         $vehicule = $db->prepare("DELETE FROM vehicule WHERE id_vehicule = ".$id_vehicule);
        return $vehicule->execute();

         if(!$vehicule->execute()){
  			die("Houps, une erreur");
  		}

  		header("Location: index.php");
	}
}