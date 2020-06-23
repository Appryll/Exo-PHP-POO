<?php
  echo "Le nombre des  vehicules : " . $nbVehicule;
?>
   <table class="table table-bordered">
   
	 <thead>
	   <tr>
		 <th scope="col">Id_Vehicule</th>
		 <th scope="col">Marque</th>
		 <th scope="col">Modele</th>
		 <th scope="col">Couleur</th>
		 <th scope="col">Immatriculation</th>
		 <th scope="col">Modifier</th>
		 <th scope="col">Supprimer</th>
	   </tr>
	 </thead>
	 <tbody>

	   <?php
	 
		   foreach ($afficher as $vehicule) {
			   echo "<tr>";
			   echo "<td>" .$vehicule->getId_vehicule(). "</td>";
			   echo "<td>" .$vehicule->getMarque(). "</td>";
			   echo "<td>" .$vehicule->getModele(). "</td>";
			   echo "<td>" .$vehicule->getCouleur(). "</td>";
			   echo "<td>" .$vehicule->getImmatriculation(). "</td>";
			   echo "<td> <a href='?action=editV&vehiculeId=".$vehicule->getId_vehicule()."'> <img src='./Ressources/images/update.png' width='40'> </a> </td>";
			   echo "<td> <a class='deleteVehicule' href='#deleteV".$vehicule->getId_vehicule()."'><img width='40' src='./Ressources/images/delete.png'></a> </td>";
			   echo "</tr>";
		   }
	   ?>

	 </tbody>
   </table>
   

