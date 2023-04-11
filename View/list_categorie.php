<?php
include '../Controller/categorieC.php';
$categorie = new categorieC();
$list = $categorie->listCategorie();
?>
<html>

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <center>
        <h1>List Des Categorie</h1>
        <h2>
            <a href="add_Categorie.php">Add Categorie</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%" class="table table-bordered table-striped">
        <tr>
            <th>Id Categorie</th>
            <th>Nom Categorie</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $categorie) {
        ?>
            <tr>
                <td><?= $categorie['id_cat']; ?></td>
                <td><?= $categorie['nom_cat']; ?></td>
                
                <td >
                    <form method="POST" action="update_categorie.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $categorie['id_cat']; ?> name="id_cat">
                    </form>
                </td>
                
                <td >
                    <a href="delete_Categorie.php?id_cat=<?php echo $categorie['id_cat']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>