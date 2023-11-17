<?php
    // Toute les fois ou il y a un choix à faire, il faut le rendre aléatoire
    // A chaque fois générer un chiffre aléatoire entre 1 et 3 = faire une class (class utile)
    class Game {
        // Créer mes héros (faire une boucle pour créer plusieurs héros) voir comment recup les infos et instancier
        // Créer mes ennemis
        // Gérer les rencontres (qui gagne)
        // Méthode qui lance les combats boucle while
        // Essayer de pouvoir rejouer la partie
        // Choix du hero et choix de la difficulté
        private $heroes = [];
        private $enemies = [];
        private $difficulty;

        public function __construct($difficulty) {
            $this->difficulty = $difficulty;
            $this->createHeroes();
            $this->createEnemies();
        }

        public function playGame() {
            // Implémentez la logique du jeu ici
        }
    
        private function createHeroes() {
            for ($i = 0; $i < 3; $i++) {
                $randomCharacter = rand(1, 3);
                switch ($randomCharacter) {
                    case 1:
                        $this->heroes[] = new SeongGiHun();
                        break;
                    case 2:
                        $this->heroes[] = new KangSaeByeok();
                        break;
                    case 3:
                        $this->heroes[] = new ChoSangWoo();
                        break;
                }
            }
        }

    private function createEnemies() {
        // Créez des ennemis en fonction du niveau de difficulté
        for ($i = 0; $i < 20; $i++) {
            $randomMarbles = rand(1, 20);
            $randomAge = rand(20, 60);
            $this->enemies[] = new Enemy("Adversaire " . ($i + 1), $randomMarbles, $randomAge);
        }
    }


    class Characters {
        // nom (commun avec hero)
        // nombre de billes (commun avec hero)
        // Gagner ou perdre -> abstraite car différent pour hero et ennemy
        // Quand un ennemie gagne, il double ses billes pas comme le hero
        protected $name;
        protected $marbles;
        protected $loss;
        protected $gain;
        protected $scream_war;

        public function __construct($name, $marbles, $loss, $gain, $scream_war) {
            $this->name = $name;
            $this->marbles = $marbles;
            $this->loss = $loss;
            $this->gain = $gain;
            $this->scream_war = $scream_war;
        }    
        
    }

    class SeongGiHun extends Characters {
        public function __construct() {
            $name = "Seong Gi-hun";
            $marbles = rand(10, 20); // Générer un nombre de billes aléatoire entre 10 et 20
            $loss = 2;
            $gain = 1;
            $scream_war = "Victoire de Seong Gi-hun !";
            parent::__construct($name, $marbles, $loss, $gain, $scream_war);
        }
    }

    class KangSaeByeok extends Characters {
        public function __construct() {
            $name = "Kang Sae-byeok";
            $marbles = rand(20, 30); // Générer un nombre de billes aléatoire entre 20 et 30
            $loss = 1;
            $gain = 2;
            $scream_war = "Victoire de Kang Sae-byeok !";
            parent::__construct($name, $marbles, $loss, $gain, $scream_war);
        }
    }

    class ChoSangWoo extends Characters {
        public function __construct() {
            $name = "Cho Sang-woo";
            $marbles = rand(30, 40); // Générer un nombre de billes aléatoire entre 30 et 40
            $loss = 0;
            $gain = 3;
            $scream_war = "Victoire de Cho Sang-woo !";
            parent::__construct($name, $marbles, $loss, $gain, $scream_war);
        }
    }

    abstract class Hero extends Characters {
        public $triche;
        public $pair;
        public $impair;
        private function check() {
            // Si pair et qu'il a dit pair = true
            // Si impair et qu'il a dit impair = true
            // Si pair et qu'il a dit impair = false
            // Si impair et qu'il a dit pair = false
        }

        // points communs entre hero et ennemy
        // bonnus 
        // malus
        // PUBLIC Peut choisir s'il triche ou pas
        // PUBLIC Choisir pair ou impair aléatoire + va vérifier si ct pair ou impair = va appeler la méthode check
        // PRIVATE Méthode Check = si pair ou impair = renvoie true si c'est pair et false si il a dit pair et que c'est impair et inversement
    }

    class Ennemy {
        // Age
    }

    class Utils {
        // Méthode qui va s'appeler GenerateRandomBbr qui génèrera un chiffre (min, max)
        // ABSTRACT 
        // Appeler sans instancier d'objet = STATIC = Utils::generate
    }


    $characters = [];
    for ($i = 0; $i < 3; $i++) {
        $randomCharacter = rand(1, 3);
        switch ($randomCharacter) {
            case 1:
                $characters[] = new SeongGiHun();
                break;
            case 2:
                $characters[] = new KangSaeByeok();
                break;
            case 3:
                $characters[] = new ChoSangWoo();
                break;
    }

    foreach ($characters as $character) {
        echo "Nom : " . $character->name . "\n";
        echo "Nombre de billes : " . $character->marbles . "\n";
        echo "Malus : " . $character->loss . "\n";
        echo "Bonus : " . $character->gain . "\n";
        echo "Cri de guerre : " . $character->scream_war . "\n";
        echo "----------------------------------\n";
    }
}


?>