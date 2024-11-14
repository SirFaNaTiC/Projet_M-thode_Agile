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
                    <input type="name" id="id_produit" name="nom_produit" required>

                    <label for="Quantité produit">Quantité :</label>
                    <!-- Champ de saisie du mot de passe -->
                    <input type="int" id="quantite" name="quantite" required>

                    <label for="Catégorie">Catégorie :</label>
                    <!-- Champ de saisie du mot de passe -->
                    <select name="name" id="id_categorie">
                        <option value="">--Selectionner une Catégorie--</option>
                        <!--Fetch-->
                    </select>

                    <label for="Date">Date :</label>
                    <!-- Champ de saisie du mot de passe -->
                    <input type="date" id="id_date" name="quantite" required>

                    <!-- Bouton de soumission du formulaire -->
                    <button type="submit" id="formsend" name="formsend">Valider</button>

                </form>
            </div>
        </main>

        <!-- Footer -->
        <?php include 'includes/footer.php'?>
        
    </body>
</html>
