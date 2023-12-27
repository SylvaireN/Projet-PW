<?php

class ContactDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;

    }

   
    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contact");
            $contact = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contact[] = new ContactModel($row['id'], $row['nom'], $row['prenom'],$row['email'],$row['telephone']);
            }

            return $contact;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contact WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['id'], $row['nom'], $row['prenom'],$row['email'],$row['telephone']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(ContactModel $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO contact (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }


    // MÃ©thode pour mettre Ã  jour un contact
    public function update(ContactModel $contact) {
        
        try {
            
            $stmt = $this->connexion->pdo->prepare("UPDATE contact SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(), $contact->getId()]);
            return true;
        } catch (PDOException $e) {
            
            
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM contact WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
   

    

}
?>
