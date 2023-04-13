<?php
include '../config.php';
include '../Model/film.php';

class filmC 
{
    public function listFilms()
    {
        $sql = "SELECT * FROM film";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteFilm($id)
    {
        $sql = "DELETE FROM film WHERE id_film = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addFilm($film)
    {
        $sql = "INSERT INTO film 
        VALUES (NULL, :titre,:realisateur, :duree,:synopsis, :annee)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $film->getTitre_film(),
                'realisateur' => $film->getRealisateur_film(),
                'duree' => $film->getDurree_film(),
                'synopsis' => $film->getSynopsis_film(),
                'annee' => $film->getAnnee_film()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function updateFilm($film, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE film SET 
                    titre = :titre, 
                    realisateur = :realisateur, 
                    duree = :duree, 
                    synopsis = :synopsis,
                    annee = :annee
                WHERE id_film= :id_film'
            );
            $query->execute([
                'id_film' => $id,
                'titre' => $film->getTitre_film(),
                'realisateur' => $film->getRealisateur_film(),
                'duree' => $film->getDurree_film(),
                'synopsis' => $film->getSynopsis_film(),
                'annee' => $film->getAnnee_film()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showfilm($id)
    {
        $sql = "SELECT * from film where id_film = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $film = $query->fetch();
            return $film;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

