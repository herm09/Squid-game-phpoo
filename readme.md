// Toute les fois ou il y a un choix à faire, il faut le rendre aléatoire
// A chaque fois générer un chiffre aléatoire entre 1 et 3 = faire une class (class utile)

class Game : 
// Créer mes héros (faire une boucle pour créer plusieurs héros) voir comment recup les infos et instancier
// Créer mes ennemis
// Gérer les rencontres (qui gagne)
// Méthode qui lance les combats boucle while
// Essayer de pouvoir rejouer la partie
// Choix du hero et choix de la difficulté

class Characters :
// nom (commun avec hero)
// nombre de billes (commun avec hero)
// Gagner ou perdre -> abstraite car différent pour hero et ennemy
// Quand un ennemie gagne, il double ses billes pas comme le hero

    triche :
    // Si pair et qu'il a dit pair = true
    // Si impair et qu'il a dit impair = true
    // Si pair et qu'il a dit impair = false
    // Si impair et qu'il a dit pair = false

// points communs entre hero et ennemy
// bonnus 
// malus
// PUBLIC Peut choisir s'il triche ou pas
// PUBLIC Choisir pair ou impair aléatoire + va vérifier si ct pair ou impair = va appeler la méthode check
// PRIVATE Méthode Check = si pair ou impair = renvoie true si c'est pair et false si il a dit pair et que c'est impair et inversement

class Ennemy :
// Age

class Utils :
// Méthode qui va s'appeler GenerateRandomBbr qui génèrera un chiffre (min, max)
// ABSTRACT 
// Appeler sans instancier d'objet = STATIC = Utils::generate