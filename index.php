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
            
            if (isset($_GET["categorie"]) && !empty($_GET["categorie"])) {
                $categorie = htmlspecialchars($_GET["categorie"]); // Sécuriser l'entrée utilisateur
                $req0 = $db->prepare('SELECT * FROM product WHERE categorie = :categorie');
                $req0->bindParam(':categorie', $categorie, PDO::PARAM_STR); // Liaison du paramètre
            } else {
                $req0 = $db->prepare('SELECT * FROM product');
            }

            try {
                $req0->execute();
                $req_prod = $req0->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage(); // Gestion d'erreur
                $req_prod = [];
            }

        ?>
        <div class="boutons">
            <a href="add_product.php"><button class="button">Ajouter un Produit</button></a>
        </div>
        <form method="get" action="index.php">
            <label for="">categorie</label>
            <?php
            $selectedCategory = isset($_GET["categorie"]) ? $_GET["categorie"] : '';
            ?>
            <select name="categorie" id="categorie">
                <option value="PC" <?= ($selectedCategory === 'PC') ? 'selected' : '' ?>>PC</option>
                <option value="Imprimante" <?= ($selectedCategory === 'Imprimante') ? 'selected' : '' ?>>Imprimante</option>
                <option value="Téléphone" <?= ($selectedCategory === 'Téléphone') ? 'selected' : '' ?>>Téléphone</option>
                <option value="Accessoire Mobile" <?= ($selectedCategory === 'Accessoire Mobile') ? 'selected' : '' ?>>Accessoire Mobile</option>
            </select>

            <button type="submit">filtrer</button>
        </form>

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
