<?php

class EducateurDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;

    }

   
    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateur");
            $educateur = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateur[] = new EducateurModel($row['id'], $row['email'], $row['password'], $row['role'],$row['licence_id']);
            }

            return $educateur;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateur WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['email'], $row['role'],$row['role'],$row['licence_id']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

   

    

}
?>
