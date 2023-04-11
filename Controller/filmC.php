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
        VALUES (NULL, :titre,:realisateur, :durree,:synopsis, :img, :annee)";
        $db = config::getConnexion();
        try {
            print_r($film->getAnnee_film()->format('Y'));
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $film->getTitre_film(),
                'realisateur' => $film->getRealisateur_film(),
                'durree' => $film->getDurree_film(),
                'synopsis' => $film->getSynopsis_film(),
                'img' => $film->getImage_film(),
                'annee' => $film->getAnnee_film()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



}