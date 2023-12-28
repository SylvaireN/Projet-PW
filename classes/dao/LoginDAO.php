<?php

class LoginDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;

    }

   
    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categorie
    public function getLogin($email,$motdepasse) {
        $a = [
            'email' 	=> $email,
            'motdepasse' 	=> $motdepasse
        ];
        try {
            $sql = "SELECT * FROM educateur WHERE email = :email AND motdepasse = :motdepasse AND role=1";
            $stmt = $this->connexion->pdo->prepare($sql);
            $stmt->execute($a);
            //$educateur = [];

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //$exist = $stmt->rowCount($sql);
            
            return $row;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    

}
?>
