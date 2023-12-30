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
                $licencie[] = new LicencieModel($row['id'],$row['numero'], $row['nom'], $row['prenom'],$row['contact_id'], $row['idCat']);
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
                return new LicencieModel($row['id'],$row['numero'], $row['nom'], $row['prenom'],$row['contact_id'], $row['idCat']);
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
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (numero, nom, prenom, contact_id, idCat) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getIdCat()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

     // MÃ©thode pour mettre Ã  jour un licencie
     public function update(LicencieModel $licencie) {
        
        try {
            
            $stmt = $this->connexion->pdo->prepare("UPDATE licencie SET numero = ?, nom = ?, prenom = ?, contact_id = ?, idCat = ? WHERE id = ?");
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getIdCat(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            
            
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un licencie par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }

     // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
     public function getDataExport() {
    
        try {
            $sql = "SELECT licencie.id,licencie.numero,licencie.nom,licencie.prenom,contact.nom,contact.prenom,contact.email,contact.telephone,categorie.nomcat FROM licencie,contact,categorie WHERE licencie.contact_id=contact.id AND licencie.idCat=categorie.id;";
            $stmt = $this->connexion->pdo->prepare($sql);
            $stmt->execute();
            //$educateur = [];

            $row = $stmt->fetchAll();
            
            //$exist = $stmt->rowCount($sql);
           
            return $row;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }
   

    

}
?>
