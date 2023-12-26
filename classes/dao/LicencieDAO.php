<?php

class LicencieDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;

    }

   
    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencie");
            $licencie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencie[] = new LicencieModel($row['id'],$row['numero'], $row['nom'], $row['prenom'],$row['contact'], $row['idCat']);
            }

            return $licencie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'],$row['numero'], $row['nom'], $row['prenom'],$row['contact'], $row['idCat']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour insÃ©rer un nouveau licencié dans la base de donnÃ©es
    public function create(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (numero, nom, prenom, contact, idCat) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContact(), $licencie->getIdCat()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }
   

    

}
?>
