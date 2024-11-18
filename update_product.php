<?php

    // Inclusion des fichiers nécessaires
    require_once("includes/include.php");
    include 'database.php';
    global $db;


        // Vérification de la présence de l'identifiant du club dans l'URL
        if(!isset($_GET['id'])){
            header('Location: /');
            exit;
        }
    
        // Récupération et sécurisation de l'identifiant du club depuis l'URL
        $get_id = (int) $_GET['id'];
    
        // Vérification de la validité de l'identifiant du club
        if($get_id < 0){
            header('Location: /');
            exit;
        }
    
        // Récupération des informations du club à modifier
        $req = $db->prepare("SELECT * FROM product WHERE id = ?");
        $req->execute([$get_id]);
        $rp = $req->fetch();
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
                <h2>Modifier un Produit</h2>

                <!-- Formulaire de connexion -->
                <form method="post">

                    <label for="Nom_Produit">Nom Produit :</label>
                    <!-- Champ de saisie de l'adresse e-mail -->
                    <input type="name" id="name" name="name" value="<?= $rp['name']?>" placeholder="<?= $rp['name']?>">

                    <label for="Quantité produit">Quantité :</label>
                    <!-- Champ de saisie du mot de passe -->
                    <input type="int" id="quantite" name="quantite" value="<?= $rp['quantity']?>" placeholder="<?= $rp['quantity']?>" >

                    <label for="Catégorie">Catégorie :</label>
                    <!-- Champ de saisie du mot de passe -->
                    <select name="categorie" class='input'>
                        <option value=1 <?php if($rp['categorie'] == 'Téléphone') echo 'selected'; ?>>Téléphone</option>
                        <option value=2 <?php if($rp['categorie'] == 'PC') echo 'selected'; ?>>PC</option>
                        <option value=3 <?php if($rp['categorie'] == 'Imprimante') echo 'selected'; ?>>Imprimante</option>
                        <option value=4 <?php if($rp['categorie'] == 'Accessoire Mobile') echo 'selected'; ?>>Accessoire Mobile</option>
                    </select>

                    <!-- Bouton de soumission du formulaire -->
                    <button type="submit" id="formsend" name="formsend">Valider</button>

                </form>
            </div>
        </main>

        <?php
            $date_modification = date('Y-m-d H:i:s');
            $statut = 'modification le '.date('d-m-Y').' par '.'1';
            // Traitement du formulaire de modification lors de la soumission
            if(isset($_POST['formsend'])){
                extract($_POST);

                // Mise à jour des informations du club dans la base de données
                $req = $db->prepare("UPDATE product SET name = ?, quantity = ?, categorie = ?, dateUpdate = ?, audit = ? WHERE id = ?");
                $req->execute([$name, $quantite, $categorie, $date_modification, $statut, $rp['id']]);
                
                // Redirection vers la liste des clubs après la modification
                header('Location: index.php');
                exit;
            }
        ?>

        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
