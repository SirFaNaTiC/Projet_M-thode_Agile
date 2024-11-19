<?php

// Inclusion du fichier contenant les dépendances et configurations nécessaires
require_once("includes/include.php");
include 'database.php';
// Accès à la connexion à la base de données globalement
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
                $req1 = $db->prepare('SELECT * FROM user');
                $req1->execute();
                $req_user = $req1->fetchAll();
            ?>
        <p>Vous êtes connecté en tant que : <?php$id?></p>
        <div class="List_User">
            <h2>Liste utilisateur</h2>
                <form method="post">
                <select name="user">
                    <?php
                    
                    // Affichage des informations des clubs dans un tableau
                    foreach($req_user as $ru){
                    ?>
                        <option value=<?=$ru['id']?>><?= $ru['lastname']?> <?= $ru['firstname']?></option>
                    <?php
                        }
                    ?>
                </select>

            </form>

        </div>

        <div class="form-container">
            <h2>Ajouter un produit</h2>
            
            <form method="post">
                <label for="Nom_Produit">Nom Produit :</label>
                <!-- Champ de saisie de l'adresse e-mail -->
                <input type="text" id="name" name="name" placeholder="Nom du produit" required>

                <label for="Quantité produit">Quantité :</label>
                <!-- Champ de saisie du mot de passe -->
                <input type="text" name="quantite" placeholder="Quantité du produit" required>

                <label for="Catégorie">Catégorie :</label>
                <!-- Champ de saisie du mot de passe -->
                <select name="categorie">
                    <option value=1>Téléphone</option>
                    <option value=2>PC</option>
                    <option value=3>Imprimante</option>
                    <option value=4>Accessoire Mobile</option>
                    <!--Fetch-->
                </select>

                <!-- Bouton de soumission du formulaire -->
                <button type="submit" id="formsend" name="formsend">Valider</button>

            </form>
            <?php
                    $test =  $_POST['user'];
                // Vérification si le formulaire a été soumis
                if(isset($_POST['formsend'])){
                    // Extraction des données du formulaire
                    extract($_POST);
                    
                    // Récupération de la date de création
                    $date_creation = date('Y-m-d H:i:s');
                    $uuid =  $test.date('dmY');

                    // Préparation et exécution de la requête d'insertion dans la table 'forum'
                    $c = $db->prepare('INSERT INTO product(uuid, `name`, quantity, dateCreation, categorie, user_id) VALUES(?, ?, ?, ?, ?, ?)');
                    $c->execute([$uuid, $name, $quantite, $date_creation, $categorie, $test  ]);

                    exit();
                }


            ?>

        </div>

    </main>

        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
