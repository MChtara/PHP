<?php
include '../Controller/filmC.php';
$filmC = new filmC();
$list = $filmC->listFilms();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of Films</h1>
        <h2>
            <a href="add_film.php">Add Film</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Film</th>
            <th>titre</th>
            <th>realisateur</th>
            <th>durree</th>
            <th>synopsis</th>
            <th>annee</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $film) {
        ?>
            <tr>
                <td><?= $film['id_film']; ?></td>
                <td><?= $film['titre']; ?></td>
                <td><?= $film['realisateur']; ?></td>
                <td><?= $film['duree']; ?></td>
                <td><?= $film['synopsis']; ?></td>
                <td><?= $film['annee']; ?></td>
                <td align="center">
                    <form method="POST" action="update_film.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $film['id_film']; ?> name="id_film">
                    </form>
                </td>
                <td>
                    <a href="delete_film.php?id_film=<?php echo $film['id_film']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>