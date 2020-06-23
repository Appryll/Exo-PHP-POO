<?php

require 'Views/header.php';
require_once 'Controller/AssociationController.php';
require_once 'Controller/ConducteurController.php';
require_once 'Controller/VehiculeController.php';

$vehicule = new vehiculeController();
$conducteur = new conducteurController();
$association = new associationController();

/* Verification des informations de mon url - VEHICULE*/
if(isset($_GET['action'])){
	if ($_GET['action'] == 'vehicule') {
		$vehicule->afficherLesVehicules();
		$vehicule->ajoutVehicule();
	}
	  elseif ($_GET['action'] == 'editV') {
		$vehicule->show($_GET['vehiculeId']);
	  }
	  elseif ($_GET['action'] == 'deleteV') {
	   	$vehicule->delete($_GET['vehiculeId']);
	 }
}
else{
	$vehicule->afficherLesVehicules();
}

/* Verification des informations de mon url -CONDUCTEUR */

if(isset($_GET['action'])){
	if ($_GET['action'] == 'conducteur') {
		$conducteur->afficherLesConducteurs();
		$conducteur->ajoutConducteur();
		
	}
	 elseif ($_GET['action'] == 'edit') {
		$conducteur->show($_GET['conducteurId']);
	 }
	 elseif ($_GET['action'] == 'delete') {
	 	$conducteur->delete($_GET['conducteurId']);
	 }
}
else{
	$conducteur->afficherLesConducteurs();

}

/* Verification des informations de mon url -ASSOCIATION */

if(isset($_GET['action'])){
	if ($_GET['action'] == 'association') {
		$association->afficherLesAssociations();
		$association->ajoutAssociation();
	}
 	elseif ($_GET['action'] == 'editA') {
 	 	$association->show($_GET['associationId']);
 	}
     elseif ($_GET['action'] == 'deleteA') {
 	 	$association->delete($_GET['associationId']);
 	}
 }
else{
	$association->afficherLesAssociations();
	
}

require_once 'Views/footer.php';