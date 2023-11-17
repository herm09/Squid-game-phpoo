<?php

class Character {
    public $name;
    public $marbles; // nombre de billes
    public $loss; // nombre de billes perdues
    public $gain; // nombre de billes gagnées
    public $scream_war;

    public function __construct($name, $marbles, $loss, $gain, $scream_war) {
        $this->name = $name;
        $this->marbles = $marbles;
        $this->loss = $loss;
        $this->gain = $gain;
        $this->scream_war = $scream_war;
    }
}

class Player extends Character {
    public function __construct($name, $marbles, $loss, $gain, $scream_war) {
        parent::__construct($name, $marbles, $loss, $gain, $scream_war);
    }

    public function guess($opponentMarbles) {
        // Devine si le nombre de billes de l'adversaire est pair ou impair
        $isEven = $opponentMarbles % 2 == 0;
        $guess = rand(0, 1); // 0 pour impair, 1 pour pair (choix aléatoire)
        
        return $guess == $isEven;
    }

    public function getMarbles() { // Retourne le nombre de billes du joueur
        return $this->marbles;
    }
}

class Opponent extends Character {
    private $age;

    public function __construct($name, $marbles, $age) {
        parent::__construct($name, $marbles, 0, 0, "");
        $this->age = $age;
    }
}

class Game {
    private $player; // Instance de la classe Player qui représente le joueur
    private $opponents = []; // Tableau d'instances de la classe Opponent qui représente les adversaires
    private $difficulty; // Niveau de difficulté du jeu choisi aléatoirement entre 1 et 3
    private $totalRounds; // Nombre total de rounds en fonction de la difficulté

    public function __construct() {
        // Détermine le niveau de difficulté aléatoirement entre 1 et 3
        $this->difficulty = rand(1, 3);
    
        // Détermine le nombre de rounds en fonction de la difficulté
        switch ($this->difficulty) {
            case 1:
                $this->totalRounds = 5;
                break;
            case 2:
                $this->totalRounds = 10;
                break;
            case 3:
                $this->totalRounds = 20;
                break;
            default:
                // Si la difficulté n'est pas comprise entre 1 et 3, on définit le nombre de rounds à 5
                $this->totalRounds = 5;
                break;
        }
    
        $this->createPlayer();
        $this->createOpponents();
    }

    public function getDifficulty() { // Retourne le niveau de difficulté
        return $this->difficulty;
    }

    private function createPlayer() {
        // Crée un joueur aléatoirement parmi les joueurs disponibles
        $characters = [
            new Player("Seong Gi-hun", 15, 2, 1, "Victoire de Seong Gi-hun !"),
            new Player("Kang Sae-byeok", 25, 1, 2, "Victoire de Kang Sae-byeok !"),
            new Player("Cho Sang-woo", 35, 0, 3, "Victoire de Cho Sang-woo !"),
        ];

        $this->player = $characters[rand(0, 2)];
    }

    private function createOpponents() {
        // Crée des adversaires en fonction du niveau de difficulté, avec des noms et des âges aléatoires
        $opponentNames = ["Noah", "Antoine", "Dimitri", "Timothée", "Michel", "Allia", "Léo", "Ambre", "Victoire", "Tom", "Manon", "Laurent", "Sasha", "Cassandra", "Simon", "Alexis", "Nicolas", "Brunic", "Stan", "Lola"];
        $opponentAges = range(20, 60);

        for ($i = 0; $i < $this->totalRounds; $i++) {
            $opponentName = $opponentNames[array_rand($opponentNames)];
            $opponentMarbles = rand(1, 20);
            $opponentAge = $opponentAges[array_rand($opponentAges)];
            $this->opponents[] = new Opponent($opponentName, $opponentMarbles, $opponentAge);
        }
    }

    public function play() {
        // Lance le jeu
        $playerBilles = $this->player->marbles;
        $round = 0;

        foreach ($this->opponents as $opponent) {
            $round++;

            echo "Round $round\n";
            echo "<br>";
            echo "<br>";
            echo "{$this->player->name} a {$playerBilles} billes. ";
            echo "<br>";
            echo "{$opponent->name} a {$opponent->marbles} billes. ";
            echo "<br>";

            $guessResult = $this->player->guess($opponent->marbles);

            if ($guessResult) {
                $playerBilles += $opponent->marbles + $this->player->gain;
                echo "Vous avez gagné le round ! {$this->player->scream_war}. ";
                echo "<br>";
                echo "<br>";
            } else {
                $playerBilles -= $opponent->marbles + $this->player->loss;
                echo "Vous avez perdu le round. ";
                echo "<br>";
                echo "<br>";
            }

            if ($playerBilles <= 0) {
                echo "Game Over. Vous n'avez plus de billes. ";
                break;
            }
        }

        if ($playerBilles > 0) {
            echo "Félicitations ! Vous avez gagné le jeu et gagné 45,6 milliards de Won sud-coréen. ";
        }
    }
}

// Exemple d'utilisation
$game = new Game();
echo "Niveau de difficulté : " . $game->getDifficulty() . "\n";
echo "<br>";
$game->play();
?>