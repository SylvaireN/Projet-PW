<?php

class CategorieDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;

    }

   
    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categorie");
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new CategorieModel($row['id'],$row['nomcat'], $row['code']);
            }

            return $categorie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categorie WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['id'],$row['nomcat'], $row['code']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour insÃ©rer une nouvelle catégorie dans la base de donnÃ©es
    public function create(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categorie (nomcat, code) VALUES (?, ?)");
            $stmt->execute([$categorie->getNom(), $categorie->getCode()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

     // MÃ©thode pour mettre Ã  jour un categorie
     public function update(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categorie SET nomcat = ?, code = ? WHERE id = ?");
            $stmt->execute([$categorie->getNom(), $categorie->getCode(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categorie WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
    

}
?>
