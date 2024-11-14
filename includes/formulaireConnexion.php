<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'head.php'?>
</head>

<header>
    <div class="boutons">
        <a href="\Projet_M-thode_Agile\index.php"><button class="button">Accueil</button></a>
    </div>
</header>

<body>

    <div class="form-container">
        <h2>Connexion au Forum</h2>

        <!-- Formulaire de connexion -->
        <form method="post">

            <label for="mail">Adresse e-mail :</label>
            <!-- Champ de saisie de l'adresse e-mail -->
            <input type="email" id="mail" name="mail" required>

            <label for="password">Mot de passe :</label>
            <!-- Champ de saisie du mot de passe -->
            <input type="password" id="password" name="password" required>

            <!-- Bouton de soumission du formulaire -->
            <button type="submit" id="formsend" name="formsend">Connexion</button>

        </form>
    </div>

</body>

</html>
