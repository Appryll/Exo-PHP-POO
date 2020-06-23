<?php
 
 class Association
 {
 	private $id_association;
 	private $id_vehicule;
 	private $id_conducteur;
 	
	 
 	public function getId_association()
 	{
 		return $this->id_association;
 	}

 	public function getId_vehicule()
 	{
 		return $this->id_vehicule;
 	}

 	public function setId_vehicule($value)
 	{
 		return $this->id_vehicule = $value;
	}
	 
 	public function getId_conducteur()
 	{
 		return $this->id_conducteur;
 	}

 	public function setId_conducteur($value)
 	{
 		return $this->id_conducteur = $value;
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
 	$sql = $baseDeDonne->prepare ("SELECT COUNT(id_association) AS NumberOfProducts  FROM association_vehicule_conducteur");
		 
	 	return $sql->execute();  
	}
	 
	//****AFFICHER LES ASSOCIATIONS****/

 	 public function afficherTousLesAssociations()
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM association_vehicule_conducteur");

 	 	$sql->execute();

 	 	$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Association');
 		
		return $resultat;
	}

	//****INSERT ASSOCIATION A LA BDD****/

 	public function insert($id_vehicule, $id_conducteur)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$requete = $baseDeDonne->prepare(" INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES ('$id_vehicule', '$id_conducteur')");

 		if(!$requete->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
 	}

	 //****SELECT TOUT WHERE = ID CONDUCTEUR****/

 	 public function findById($id_association)
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("SELECT * FROM association_vehicule_conducteur WHERE id_association= ".$id_association);

 	 	$sql->execute();

 	 	$getResultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Association');

 	 	return $getResultat;
	  }
	  
	  //****UPDATE WHERE = ID CONDUCTEUR ****/

 	 public function update($id_association, $id_vehicule, $id_conducteur)
 	 {
 	 	$baseDeDonne = $this->accesBaseDeDonnee();
 	 	$sql = $baseDeDonne->prepare("UPDATE association_vehicule_conducteur SET id_vehicule = '".$id_vehicule."', id_conducteur = '" .$id_conducteur."' WHERE id_association= ".$id_association);

 	 	if(!$sql->execute()){
 	 		die("Houps, une erreur");
 	 	}

 	 	header("Location: index.php");
	 }

	 //****DELETE WHERE = ID CONDUCTEUR ****/
	 
	 public function deleteById($id_association) 
	 {
         $db = $this->accesBaseDeDonnee();
         $association = $db->prepare("DELETE FROM association_vehicule_conducteur WHERE id_association = ".$id_association);
         return $association->execute();

         if(!$association->execute()){
  			die("Houps, une erreur");
  		}

		header("Location: index.php");
     }
 } 