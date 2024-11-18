<?php

// Inclusion du fichier contenant les dépendances et configurations nécessaires
require_once("includes/include.php");
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
                // Vérification si le formulaire a été soumis
                if(isset($_POST['formsend'])){
                    // Extraction des données du formulaire
                    extract($_POST);

                    // Récupération de la date de création
                    $date_creation = date('Y-m-d H:i:s');
                    $uuid = '1'.date('dmY');

                    include 'database.php';
                    global $db;

                    // Préparation et exécution de la requête d'insertion dans la table 'forum'
                    $c = $db->prepare('INSERT INTO product(uuid, `name`, quantity, dateCreation, categorie, user_id) VALUES(?, ?, ?, ?, ?, ?)');
                    $c->execute([$uuid, $name, $quantite, $date_creation, $categorie, 1 ]);
                    header('Location: index.php');
                    exit();
                }
            ?>

        </div>

    </main>

        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
