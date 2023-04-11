<?php

include '../Controller/filmC.php';

$error = "";

// create film
$film = null;

$filmC = new filmC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["durree"]) &&
    isset($_POST["synopsis"]) &&
    isset($_POST["image"]) &&
    isset($_POST["annee"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["durree"]) &&
        !empty($_POST["synopsis"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["annee"])
    ) {
        $film = new film(
            null,
            $_POST['titre'],
            $_POST["realisateur"],
            $_POST["durree"],
            $_POST["synopsis"],
            $_POST["image"],
            new DateTime($_POST['annee'])
        );
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
    <a href="ListClients.php">Back to list </a>
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
                    <label for="durree">durree:
                    </label>
                </td>
                <td>
                    <input type="int" name="durree" id="durree">
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
                    <label for="image">image:
                    </label>
                </td>
                <td><input type="text" name="image" id="image" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="annee">Annee:
                    </label>
                </td>
                <td>
                    <input type="date" name="annee" id="annee">
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