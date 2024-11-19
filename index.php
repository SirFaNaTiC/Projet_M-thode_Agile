<?php
// Inclusion des fichiers nécessaires
require_once("includes/include.php");
include 'database.php';
global $db;
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'includes/head.php'?>
    </head>

    <body>
        <!-- En Tête -->
        <header class="header">
            <?php include "includes/header.php"?>
        </header>

        <!-- Partie Centrale -->
        <main>
        <?php
            //Récupération des informations sur les produits (mettre la requête SQL lorsque la BDD sera réccupérée)
            $req0 = $db->prepare('SELECT * FROM product');
            $req0->execute();
            $req_prod = $req0->fetchAll();
            $req1 = $db->prepare('SELECT * FROM user');
            $req1->execute();
            $req_user = $req1->fetchAll();
        ?>
        
        <div class="boutons">
            <a href="add_product.php"><button class="button">Ajouter un Produit</button></a>
    </div>

        <div class="liste_produits">
            <h2>Produits</h2>
            <table>
                <thead>
                    <tr>
                        <th>N°Produit</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Catégories</th>
                        <th>Date d'Ajout</th>
                        <th>Dernière Modification</th>
                        <th>Statut</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Affichage des informations des clubs dans un tableau
                        foreach($req_prod as $rp){
                    ?>
                        <tr>
                            <td><?= $rp['id']?></td>
                            <td><?= $rp['name']?></td>
                            <td><?= $rp['quantity']?></td>
                            <td><?= $rp['categorie']?></td>
                            <td><?= $rp['dateCreation']?></td>
                            <td><?= $rp['dateUpdate']?></td>
                            <td><?= $rp['audit']?></td>
                            <td><button>Modifier</button></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        </main>



        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
