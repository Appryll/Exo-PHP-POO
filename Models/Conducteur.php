<?php
 
 class Conducteur
 {
 	private $id_conducteur;
 	private $prenom;
 	private $nom;
	 
 	public function getId_conducteur()
 	{
 		return $this->id_conducteur;
 	}

 	public function getPrenom()
 	{
 		return $this->prenom;
 	}

 	public function setPrenom($value)
 	{
 		return $this->prenom = $value;
	 }
	 
 	public function getNom()
 	{
 		return $this->nom;
 	}

 	public function setNom($value)
 	{
 		return $this->nom = $value;
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
 	$sql = $baseDeDonne->prepare("SELECT COUNT(*) FROM conducteur");

 		return $sql->execute();
	 }

	 //****AFFICHER TOUS LES CONDUCTEURS****/

 	 public function afficherTousLesConducteurs()
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM conducteur");

 	 	$sql->execute();

 	 	$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'conducteur');
 		
		return $resultat;
	}

	//****INSERT CONDUCTEUR A LA BDD****/

 	public function insert($prenom, $nom)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$requete = $baseDeDonne->prepare(" INSERT INTO conducteur (prenom, nom) VALUES ('$prenom', '$nom')");

 		if(!$requete->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
	 }
	 
	//****SELECT TOUT WHERE = ID CONDUCTEUR****/

 	 public function findById($id_conducteur)
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM conducteur WHERE id_conducteur= ".$id_conducteur);

 	 	$sql->execute();

 	 	$getResultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Conducteur');

 	 	return $getResultat;
 	 }

	  //****UPDATE WHERE = ID CONDUCTEUR ****/

 	 public function update ($id_conducteur, $prenom, $nom)
 	 {
 		$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("UPDATE conducteur SET prenom = '".$prenom."', nom = '" .$nom."'  WHERE id_conducteur = " .$id_conducteur);

 		if(!$sql->execute()){
 			die("Houps, une erreur");
 	 	}

 	 	header("Location: index.php");
 	 }

	 //****DELETE WHERE = ID CONDUCTEUR ****/
	 
	 public function deleteById($id_conducteur) 
	 {
         $db = $this->accesBaseDeDonnee();
         $conducteur = $db->prepare("DELETE FROM conducteur WHERE id_conducteur = ".$id_conducteur);
		 return $conducteur->execute();

         if(!$conducteur->execute()){
  			die("Houps, une erreur");
 		}

  		header("Location: index.php");
     }
}