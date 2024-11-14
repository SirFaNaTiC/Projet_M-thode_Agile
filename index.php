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
            <div class="liste_produit">
                <h2> Produits : </h2>
            </div>
        </main>

        <div class="boutons">
            <a href="add_product.php"><button class="button">Ajouter un Produit</button></a>
            <a href="update_product.php"><button class="button">Modifier un Produit</button></a>
        </div>

        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
