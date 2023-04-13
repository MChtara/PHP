<?php

include '../Controller/filmC.php';

$error = "";

// create film
$film = null;

$filmC = new filmC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["synopsis"]) &&
    isset($_POST["annee"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["synopsis"]) &&
        !empty($_POST["annee"])
    ) {
        $film = new film(
            null,
            $_POST['titre'],
            $_POST["realisateur"],
            $_POST["duree"],
            $_POST["synopsis"],
            $_POST['annee']
        );

        // Vérification de saisie pour les attributs de film
        if (!preg_match('/^[A-Za-z\s]+$/', $film->getTitre_film())) {
            echo "Le titre du film n'est pas valide.";
            return;
        }
        
        if (!preg_match('/^[A-Za-z\s]+$/', $film->getRealisateur_film())) {
            echo "Le nom du réalisateur n'est pas valide.";
            return;
        }
        
        if (!preg_match('/^[0-9]+$/', $film->getDurree_film())) {
            echo "La durée du film n'est pas valide.";
            return;
        }

        $filmC->addFilm($film);
        header('Location:list_film.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="list_film.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="titre">Titre:
                    </label>
                </td>
                <td><input type="text" name="titre" id="titre" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="realisateur">Realisateur:
                    </label>
                </td>
                <td><input type="text" name="realisateur" id="realisateur" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="duree">durree:
                    </label>
                </td>
                <td>
                    <input type="int" name="duree" id="duree">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="synopsis">synopsis:
                    </label>
                </td>
                <td><input type="text" name="synopsis" id="synopsis" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="annee">Annee:
                    </label>
                </td>
                <td>
                    <input type="text" name="annee" id="annee">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>