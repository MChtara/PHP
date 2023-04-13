<?php

include '../Controller/filmC.php';

$error = "";

// create film
$film = null;

// create an instance of the controller
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
        $film = new film($_POST['id_film'], $_POST['titre'], $_POST["realisateur"], $_POST["duree"], $_POST["synopsis"], $_POST['annee']);
        $filmC->updateFilm($film, $_POST['id_film']);
        header('Location:list_film.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="list_film.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_film'])) {
        $film = $filmC->showFilm($_POST['id_film']);

    ?>

        <form action="" method="POST">
            
            <table border="1" align="center">
                <tr>
                    <td>
                    <label for="id_film">Id film </label>
                    </td>
                    <td><input type="text" name="id_film" id="id_film" value="<?php echo $film['id_film']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">Titre </label>
                    </td>
                    <td><input type="text" name="titre" id="titre" value="<?php echo $film['titre']; ?>" maxlength="20"></td>
                </tr>

                <tr>
                 <td>
                    <label for="realisateur">Realisateur:
                    </label>
                 </td>
                 <td><input type="text" name="realisateur" id="realisateur" value="<?php echo $film['realisateur']; ?>" maxlength="20"></td>
                </tr>
              <tr>
                <td>
                    <label for="duree">durree:
                    </label>
                </td>
                <td>
                    <input type="int" name="duree" id="duree" value="<?php echo $film['duree']; ?> ">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="synopsis">synopsis: </label>
                </td>
                <td><input type="text" name="synopsis" id="synopsis" value="<?php echo $film['synopsis']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="annee">Annee:
                    </label>
                </td>
                <td>
                    <input type="text" name="annee" id="annee" value="<?php echo $film['annee']; ?>" >
                </td>
            </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>