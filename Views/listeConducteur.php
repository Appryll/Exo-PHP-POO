<?php
  echo "Le nombre des conducteurs : " . $nbConducteur;
?>
   <table class="table table-bordered">
   
	 <thead>
	   <tr>
		 <th scope="col">Id_Conducteur</th>
		 <th scope="col">Prenom</th>
		 <th scope="col">Nom</th>
		 <th scope="col">Modifier</th>
		 <th scope="col">Supprimer</th>
	   </tr>
	 </thead>
	 <tbody>

	   <?php
	 
		   foreach ($afficher as $conducteur) {
			   echo "<tr>";
			   echo "<td>" .$conducteur->getId_conducteur(). "</td>";
			   echo "<td>" .$conducteur->getPrenom(). "</td>";
			   echo "<td>" .$conducteur->getNom(). "</td>";
		       echo "<td> <a href='?action=edit&conducteurId=".$conducteur->getId_conducteur()."'> <img src='./Ressources/images/update.png' width='40'> </a> </td>";
			   echo "<td> <a class='deleteConducteur' href='#delete".$conducteur->getId_conducteur()."'><img width='40' src='./Ressources/images/delete.png'></a> </td>";
			   echo "</tr>";
		   }
	   ?>

	 </tbody>
	 
   </table>
   
   

