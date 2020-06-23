<?php

   echo "Le nombre des associations : " . $nbAssociation;
?>
   <table class="table table-bordered">
   
	 <thead>
	   <tr>
		 <th scope="col">Id_Association</th>
		 <th scope="col">Id_Vehicule</th>
		 <th scope="col">Id_Conducteur</th>
		 <th scope="col">Modifier</th>
		 <th scope="col">Supprimer</th>
		 
	   </tr>
	 </thead>
	 <tbody>

	   <?php
	 
		   foreach ($afficher as $association) {
			   echo "<tr>";
			   echo "<td>" .$association->getId_association(). "</td>";
			   echo "<td>" .$association->getId_vehicule(). "</td>";
			   echo "<td>" .$association->getId_conducteur(). "</td>";
			   echo "<td> <a href='?action=editA&associationId=".$association->getId_association()."'> <img src='./Ressources/images/update.png' width='40'> </a> </td>";
			   echo "<td> <a class='deleteAssociation' href='#deleteA".$association->getId_association()."'><img width='40' src='./Ressources/images/delete.png'></a> </td>";
			   echo "</tr>";
		   }
	   ?>

	 </tbody>
   </table>
   

