<?php
include "Club.php";
$club= new Club (124,"test","test","ariena","info");
$listeClub=$club->afficheClub();
?>
<h1> Affichage d'un club </h1>
<table border="1">
    <tr>
        <th> Id</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Adresse</th>
        <th>Domaine</th>
    </tr>
    <?php
    foreach($listeClub as $row){
        ?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['nom']?></td>
        <td><?php echo $row['description']?></td>
        <td><?php echo $row['adresse']?></td>
        <td><?php echo $row['domaine']?></td>
    </tr>
    <?php
    }
   ?>
</table>
