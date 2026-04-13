<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use App\Entity\Quiz;
use App\Entity\Question;
use App\Entity\Reponse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*
        |--------------------------------------------------------------------------
        | 1. DÉFINITION DES QUESTIONS PAR THÈME
        |--------------------------------------------------------------------------
        */

        $cultureGenerale = [
            "Quelle est la capitale de la France ?" => [
                ["Paris", true],
                ["Lyon", false],
                ["Marseille", false],
                ["Nice", false],
            ],
            "Quel est le plus grand océan du monde ?" => [
                ["Pacifique", true],
                ["Atlantique", false],
                ["Indien", false],
                ["Arctique", false],
            ],
            "Combien font 7 × 8 ?" => [
                ["56", true],
                ["48", false],
                ["64", false],
                ["54", false],
            ],
            "Quel est le métal principal de l’acier ?" => [
                ["Fer", true],
                ["Cuivre", false],
                ["Aluminium", false],
                ["Zinc", false],
            ],
            "Quel est le plus long fleuve du monde ?" => [
                ["Nil", true],
                ["Amazone", false],
                ["Yangtsé", false],
                ["Mississippi", false],
            ],
            "Quel pays a inventé le papier ?" => [
                ["Chine", true],
                ["Égypte", false],
                ["Grèce", false],
                ["Inde", false],
            ],
            "Combien de continents existe-t-il ?" => [
                ["6", true],
                ["5", false],
                ["7", false],
                ["4", false],
            ],
            "Quel est l’organe principal du système nerveux ?" => [
                ["Le cerveau", true],
                ["Le cœur", false],
                ["Le foie", false],
                ["Les poumons", false],
            ],
            "Quel est le symbole chimique de l’eau ?" => [
                ["H2O", true],
                ["O2", false],
                ["CO2", false],
                ["HO", false],
            ],
            "Quel pays a remporté la Coupe du Monde 2018 ?" => [
                ["France", true],
                ["Brésil", false],
                ["Allemagne", false],
                ["Argentine", false],
            ],
            "Quel est le plus grand désert du monde ?" => [
                ["Sahara", true],
                ["Gobi", false],
                ["Kalahari", false],
                ["Atacama", false],
            ],
            "Quel est l’animal terrestre le plus rapide ?" => [
                ["Guépard", true],
                ["Lion", false],
                ["Tigre", false],
                ["Antilope", false],
            ],
            "Quel est le plus petit pays du monde ?" => [
                ["Vatican", true],
                ["Monaco", false],
                ["Malte", false],
                ["Andorre", false],
            ],
            "Quel est le plus grand mammifère ?" => [
                ["Baleine bleue", true],
                ["Éléphant", false],
                ["Girafe", false],
                ["Orque", false],
            ],
            "Quel est le plus grand pays du monde ?" => [
                ["Russie", true],
                ["Canada", false],
                ["Chine", false],
                ["États-Unis", false],
            ],
            "Quel est le plus haut sommet du monde ?" => [
                ["Everest", true],
                ["K2", false],
                ["Kangchenjunga", false],
                ["Mont Blanc", false],
            ],
            "Quel est le plus grand organe du corps humain ?" => [
                ["La peau", true],
                ["Le foie", false],
                ["Le cœur", false],
                ["Le cerveau", false],
            ],
            "Quel est le plus grand pays d’Afrique ?" => [
                ["Algérie", true],
                ["Nigeria", false],
                ["Égypte", false],
                ["Soudan", false],
            ],
            "Quel est le plus grand lac d’Afrique ?" => [
                ["Lac Victoria", true],
                ["Lac Tanganyika", false],
                ["Lac Malawi", false],
                ["Lac Tchad", false],
            ],
            "Quel est le plus grand océan ?" => [
                ["Pacifique", true],
                ["Atlantique", false],
                ["Indien", false],
                ["Arctique", false],
            ],
        ];

        $informatique = [
            "Que signifie HTML ?" => [
                ["HyperText Markup Language", true],
                ["HighText Machine Language", false],
                ["Hyper Tool Multi Language", false],
                ["Home Tool Markup Language", false],
            ],
            "Quel est le système d’exploitation de Microsoft ?" => [
                ["Windows", true],
                ["Linux", false],
                ["MacOS", false],
                ["Android", false],
            ],
            "Quel langage est utilisé pour le style des pages web ?" => [
                ["CSS", true],
                ["Java", false],
                ["Python", false],
                ["SQL", false],
            ],
            "Quel langage est principalement utilisé côté serveur ?" => [
                ["PHP", true],
                ["HTML", false],
                ["CSS", false],
                ["Photoshop", false],
            ],
            "Que signifie CPU ?" => [
                ["Central Processing Unit", true],
                ["Computer Power Unit", false],
                ["Control Program Utility", false],
                ["Central Program Unit", false],
            ],
            "Quel est le langage de programmation de Python ?" => [
                ["Guido van Rossum", true],
                ["Linus Torvalds", false],
                ["James Gosling", false],
                ["Dennis Ritchie", false],
            ],
            "Quel protocole est utilisé pour envoyer des emails ?" => [
                ["SMTP", true],
                ["FTP", false],
                ["HTTP", false],
                ["SSH", false],
            ],
            "Quel est le navigateur de Google ?" => [
                ["Chrome", true],
                ["Firefox", false],
                ["Safari", false],
                ["Edge", false],
            ],
            "Quel est le format d’image compressé ?" => [
                ["JPEG", true],
                ["BMP", false],
                ["RAW", false],
                ["SVG", false],
            ],
            "Quel est le langage utilisé pour les bases de données ?" => [
                ["SQL", true],
                ["CSS", false],
                ["C#", false],
                ["HTML", false],
            ],
            "Quel est le système d’exploitation d’Apple ?" => [
                ["MacOS", true],
                ["Windows", false],
                ["Ubuntu", false],
                ["Android", false],
            ],
            "Quel est le langage de JavaScript ?" => [
                ["ECMAScript", true],
                ["TypeScript", false],
                ["Java", false],
                ["C++", false],
            ],
            "Quel est le port HTTP ?" => [
                ["80", true],
                ["21", false],
                ["443", false],
                ["22", false],
            ],
            "Quel est le port HTTPS ?" => [
                ["443", true],
                ["80", false],
                ["21", false],
                ["25", false],
            ],
            "Quel est le créateur de Linux ?" => [
                ["Linus Torvalds", true],
                ["Bill Gates", false],
                ["Steve Jobs", false],
                ["Mark Zuckerberg", false],
            ],
            "Quel est le langage utilisé pour Android ?" => [
                ["Java", true],
                ["Swift", false],
                ["C#", false],
                ["Ruby", false],
            ],
            "Quel est le langage utilisé pour iOS ?" => [
                ["Swift", true],
                ["Java", false],
                ["Kotlin", false],
                ["C", false],
            ],
            "Quel est le protocole sécurisé ?" => [
                ["HTTPS", true],
                ["HTTP", false],
                ["FTP", false],
                ["SMTP", false],
            ],
            "Quel est le langage utilisé pour l’IA ?" => [
                ["Python", true],
                ["HTML", false],
                ["CSS", false],
                ["PHP", false],
            ],
            "Quel est le langage compilé ?" => [
                ["C++", true],
                ["HTML", false],
                ["CSS", false],
                ["SQL", false],
            ],
        ];

        $jeuxVideo = [
            "Quel est le héros principal de Zelda ?" => [
                ["Link", true],
                ["Zelda", false],
                ["Ganon", false],
                ["Epona", false],
            ],
            "Quel studio a créé GTA ?" => [
                ["Rockstar Games", true],
                ["Ubisoft", false],
                ["EA", false],
                ["Activision", false],
            ],
            "Quel Pokémon est le numéro 25 ?" => [
                ["Pikachu", true],
                ["Bulbizarre", false],
                ["Salamèche", false],
                ["Rondoudou", false],
            ],
            "Dans quel jeu trouve-t-on le Creeper ?" => [
                ["Minecraft", true],
                ["Fortnite", false],
                ["Roblox", false],
                ["Terraria", false],
            ],
            "Quel jeu a popularisé le Battle Royale ?" => [
                ["Fortnite", true],
                ["PUBG", false],
                ["Apex Legends", false],
                ["Warzone", false],
            ],
            "Quel est le plombier le plus célèbre ?" => [
                ["Mario", true],
                ["Luigi", false],
                ["Wario", false],
                ["Toad", false],
            ],
            "Quel jeu contient la Triforce ?" => [
                ["Zelda", true],
                ["Final Fantasy", false],
                ["Skyrim", false],
                ["Dark Souls", false],
            ],
            "Quel jeu se déroule à Los Santos ?" => [
                ["GTA V", true],
                ["GTA IV", false],
                ["GTA San Andreas", false],
                ["GTA III", false],
            ],
            "Quel jeu contient les champions ?" => [
                ["League of Legends", true],
                ["Dota 2", false],
                ["Valorant", false],
                ["Overwatch", false],
            ],
            "Quel jeu contient les imposteurs ?" => [
                ["Among Us", true],
                ["Fall Guys", false],
                ["Roblox", false],
                ["Minecraft", false],
            ],
            "Quel jeu contient les Sims ?" => [
                ["Les Sims", true],
                ["Animal Crossing", false],
                ["Second Life", false],
                ["SimCity", false],
            ],
            "Quel jeu contient les Goombas ?" => [
                ["Mario", true],
                ["Zelda", false],
                ["Kirby", false],
                ["Metroid", false],
            ],
            "Quel jeu contient les chocobos ?" => [
                ["Final Fantasy", true],
                ["Zelda", false],
                ["Dragon Quest", false],
                ["Skyrim", false],
            ],
            "Quel jeu contient les pokéballs ?" => [
                ["Pokémon", true],
                ["Digimon", false],
                ["Yu-Gi-Oh", false],
                ["Monster Hunter", false],
            ],
            "Quel jeu contient les creeps ?" => [
                ["Dota 2", true],
                ["Minecraft", false],
                ["Fortnite", false],
                ["Overwatch", false],
            ],
            "Quel jeu contient les fusils à encre ?" => [
                ["Splatoon", true],
                ["Fortnite", false],
                ["Valorant", false],
                ["Overwatch", false],
            ],
            "Quel jeu contient les dragons Elder ?" => [
                ["Monster Hunter", true],
                ["Skyrim", false],
                ["Dark Souls", false],
                ["Elden Ring", false],
            ],
            "Quel jeu contient les cartes Hearthstone ?" => [
                ["Hearthstone", true],
                ["Magic", false],
                ["Yu-Gi-Oh", false],
                ["Gwent", false],
            ],
            "Quel jeu contient les champions Overwatch ?" => [
                ["Overwatch", true],
                ["Valorant", false],
                ["CS:GO", false],
                ["Apex Legends", false],
            ],
            "Quel jeu contient les blocs Tetris ?" => [
                ["Tetris", true],
                ["Minecraft", false],
                ["Roblox", false],
                ["Pac-Man", false],
            ],
        ];

        $sport = [
            "Combien de joueurs dans une équipe de football ?" => [
                ["11", true],
                ["10", false],
                ["12", false],
                ["9", false],
            ],
            "Quel pays a gagné la Coupe du Monde 2018 ?" => [
                ["France", true],
                ["Brésil", false],
                ["Allemagne", false],
                ["Argentine", false],
            ],
            "Quel sport utilise une raquette ?" => [
                ["Tennis", true],
                ["Football", false],
                ["Rugby", false],
                ["Boxe", false],
            ],
            "Quel sport utilise un ballon ovale ?" => [
                ["Rugby", true],
                ["Football", false],
                ["Basketball", false],
                ["Handball", false],
            ],
            "Quel sport se joue sur glace ?" => [
                ["Hockey", true],
                ["Football", false],
                ["Tennis", false],
                ["Golf", false],
            ],
            "Quel sport utilise un panier ?" => [
                ["Basketball", true],
                ["Handball", false],
                ["Volley", false],
                ["Rugby", false],
            ],
            "Quel sport utilise un filet ?" => [
                ["Volley", true],
                ["Football", false],
                ["Rugby", false],
                ["Boxe", false],
            ],
            "Quel sport utilise un ring ?" => [
                ["Boxe", true],
                ["Tennis", false],
                ["Football", false],
                ["Golf", false],
            ],
            "Quel sport utilise un club ?" => [
                ["Golf", true],
                ["Tennis", false],
                ["Rugby", false],
                ["Basketball", false],
            ],
            "Quel sport utilise un tatami ?" => [
                ["Judo", true],
                ["Football", false],
                ["Rugby", false],
                ["Boxe", false],
            ],
            "Quel sport utilise un volant ?" => [
                ["Badminton", true],
                ["Tennis", false],
                ["Volley", false],
                ["Handball", false],
            ],
            "Quel sport utilise un arc ?" => [
                ["Tir à l’arc", true],
                ["Boxe", false],
                ["Football", false],
                ["Golf", false],
            ],
            "Quel sport utilise un sabre ?" => [
                ["Escrime", true],
                ["Boxe", false],
                ["Rugby", false],
                ["Tennis", false],
            ],
            "Quel sport utilise un ballon orange ?" => [
                ["Basketball", true],
                ["Football", false],
                ["Rugby", false],
                ["Handball", false],
            ],
            "Quel sport utilise des skis ?" => [
                ["Ski", true],
                ["Snowboard", false],
                ["Surf", false],
                ["Patinage", false],
            ],
            "Quel sport utilise une piscine ?" => [
                ["Natation", true],
                ["Football", false],
                ["Rugby", false],
                ["Tennis", false],
            ],
            "Quel sport utilise un ballon rond ?" => [
                ["Football", true],
                ["Rugby", false],
                ["Basketball", false],
                ["Volley", false],
            ],
            "Quel sport utilise une batte ?" => [
                ["Baseball", true],
                ["Football", false],
                ["Rugby", false],
                ["Tennis", false],
            ],
            "Quel sport utilise un filet haut ?" => [
                ["Volley", true],
                ["Basketball", false],
                ["Football", false],
                ["Rugby", false],
            ],
        ];

        $histoire = [
            "Qui a découvert l’Amérique ?" => [
                ["Christophe Colomb", true],
                ["Vasco de Gama", false],
                ["Magellan", false],
                ["Marco Polo", false],
            ],
            "En quelle année a eu lieu la Révolution française ?" => [
                ["1789", true],
                ["1776", false],
                ["1815", false],
                ["1914", false],
            ],
            "Qui était le premier empereur romain ?" => [
                ["Auguste", true],
                ["César", false],
                ["Néron", false],
                ["Trajan", false],
            ],
            "Qui a peint la Joconde ?" => [
                ["Léonard de Vinci", true],
                ["Michel-Ange", false],
                ["Raphaël", false],
                ["Donatello", false],
            ],
            "Quel pays a construit les pyramides ?" => [
                ["Égypte", true],
                ["Grèce", false],
                ["Chine", false],
                ["Mexique", false],
            ],
            "Qui était le roi du rock ?" => [
                ["Elvis Presley", true],
                ["Michael Jackson", false],
                ["Prince", false],
                ["Freddie Mercury", false],
            ],
            "Qui a inventé l’imprimerie ?" => [
                ["Gutenberg", true],
                ["Newton", false],
                ["Einstein", false],
                ["Tesla", false],
            ],
            "Qui a fondé l’Empire mongol ?" => [
                ["Gengis Khan", true],
                ["Kublai Khan", false],
                ["Tamerlan", false],
                ["Attila", false],
            ],
            "Qui a écrit 'Les Misérables' ?" => [
                ["Victor Hugo", true],
                ["Balzac", false],
                ["Zola", false],
                ["Flaubert", false],
            ],
            "Qui a découvert la pénicilline ?" => [
                ["Fleming", true],
                ["Pasteur", false],
                ["Curie", false],
                ["Einstein", false],
            ],
            "Qui était le premier homme sur la Lune ?" => [
                ["Neil Armstrong", true],
                ["Buzz Aldrin", false],
                ["Youri Gagarine", false],
                ["Michael Collins", false],
            ],
            "Quel pays a déclenché la Seconde Guerre mondiale ?" => [
                ["Allemagne", true],
                ["Italie", false],
                ["Japon", false],
                ["URSS", false],
            ],
            "Qui a construit le Taj Mahal ?" => [
                ["Shah Jahan", true],
                ["Akbar", false],
                ["Aurangzeb", false],
                ["Babur", false],
            ],
            "Qui a écrit 'Le Petit Prince' ?" => [
                ["Saint-Exupéry", true],
                ["Molière", false],
                ["Hugo", false],
                ["Camus", false],
            ],
            "Qui a été le premier président de la Ve République ?" => [
                ["Charles de Gaulle", true],
                ["Pompidou", false],
                ["Mitterrand", false],
                ["Sarkozy", false],
            ],
            "Qui a été le premier président des États-Unis ?" => [
                ["George Washington", true],
                ["Abraham Lincoln", false],
                ["Thomas Jefferson", false],
                ["John Adams", false],
            ],
            "Qui a été le premier homme à voler ?" => [
                ["Wright Brothers", true],
                ["Leonardo da Vinci", false],
                ["Amelia Earhart", false],
                ["Charles Lindbergh", false],
            ],
            "Qui a été le premier homme à nager la Manche ?" => [
                ["Matthew Webb", true],
                ["Michael Phelps", false],
                ["Mark Spitz", false],
                ["Ryan Lochte", false],
            ],
            "Qui a été le premier homme à escalader l’Everest ?" => [
                ["Edmund Hillary", true],
                ["Tenzing Norgay", false],
                ["Reinhold Messner", false],
                ["Jerzy Kukuczka", false],
            ],
        ];

        $geographie = [
            "Quel est le plus long fleuve du monde ?" => [
                ["Le Nil", true],
                ["L’Amazone", false],
                ["Le Yangtsé", false],
                ["Le Mississippi", false],
            ],
            "Quel est le plus grand océan de la planète ?" => [
                ["L’océan Pacifique", true],
                ["L’océan Atlantique", false],
                ["L’océan Indien", false],
                ["L’océan Arctique", false],
            ],
            "Quel pays possède la plus grande population ?" => [
                ["La Chine", true],
                ["L’Inde", false],
                ["Les États-Unis", false],
                ["L’Indonésie", false],
            ],
            "Quel est le plus haut sommet du monde ?" => [
                ["L’Everest", true],
                ["Le K2", false],
                ["Le Kangchenjunga", false],
                ["Le Lhotse", false],
            ],
            "Dans quel pays se trouve la ville de Marrakech ?" => [
                ["Maroc", true],
                ["Algérie", false],
                ["Tunisie", false],
                ["Égypte", false],
            ],
            "Quel désert est le plus vaste au monde ?" => [
                ["L’Antarctique", true],
                ["Le Sahara", false],
                ["Le Gobi", false],
                ["Le Kalahari", false],
            ],
            "Quel pays possède le plus grand nombre d’îles ?" => [
                ["La Suède", true],
                ["L’Indonésie", false],
                ["Les Philippines", false],
                ["Le Japon", false],
            ],
            "Quel est le plus grand lac d’Afrique ?" => [
                ["Le lac Victoria", true],
                ["Le lac Tanganyika", false],
                ["Le lac Malawi", false],
                ["Le lac Tchad", false],
            ],
            "Quel pays a la plus grande superficie ?" => [
                ["La Russie", true],
                ["Le Canada", false],
                ["La Chine", false],
                ["Les États-Unis", false],
            ],
            "Quel est le plus petit pays du monde ?" => [
                ["Le Vatican", true],
                ["Monaco", false],
                ["Nauru", false],
                ["Saint-Marin", false],
            ],
            "Quel est le plus grand archipel du monde ?" => [
                ["L’Indonésie", true],
                ["Les Philippines", false],
                ["Le Japon", false],
                ["La Norvège", false],
            ],
            "Quel pays est surnommé « le pays du soleil levant » ?" => [
                ["Le Japon", true],
                ["La Chine", false],
                ["La Corée du Sud", false],
                ["La Thaïlande", false],
            ],
            "Quel est le plus grand pays d’Amérique du Sud ?" => [
                ["Le Brésil", true],
                ["L’Argentine", false],
                ["Le Pérou", false],
                ["La Colombie", false],
            ],
            "Quel est le plus grand désert chaud du monde ?" => [
                ["Le Sahara", true],
                ["Le Gobi", false],
                ["Le Mojave", false],
                ["Le Kalahari", false],
            ],
            "Quel pays possède la ville de Sydney ?" => [
                ["L’Australie", true],
                ["La Nouvelle-Zélande", false],
                ["Le Royaume-Uni", false],
                ["Les États-Unis", false],
            ],
            "Quel est le plus grand continent ?" => [
                ["L’Asie", true],
                ["L’Afrique", false],
                ["L’Amérique", false],
                ["L’Europe", false],
            ],
            "Quel pays possède la plus longue frontière terrestre avec les États-Unis ?" => [
                ["Le Canada", true],
                ["Le Mexique", false],
                ["La Russie", false],
                ["Cuba", false],
            ],
            "Quel pays possède la ville du Caire ?" => [
                ["L’Égypte", true],
                ["Le Maroc", false],
                ["La Turquie", false],
                ["L’Arabie Saoudite", false],
            ],
            "Quel est le plus haut sommet d’Afrique ?" => [
                ["Le Kilimandjaro", true],
                ["Le Mont Kenya", false],
                ["Le Ras Dashen", false],
                ["Le Simien", false],
            ],
            "Quel pays possède la ville de Buenos Aires ?" => [
                ["L’Argentine", true],
                ["Le Chili", false],
                ["Le Pérou", false],
                ["L’Uruguay", false],
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | 2. CRÉATION DES THÈMES
        |--------------------------------------------------------------------------
        */

        $themesData = [
            "Culture Générale" => $cultureGenerale,
            "Informatique" => $informatique,
            "Jeux Vidéo" => $jeuxVideo,
            "Sport" => $sport,
            "Histoire" => $histoire,
            "Géographie" => $geographie,
        ];

        foreach ($themesData as $themeName => $questionsData) {

            // 1. Création du thème
            $theme = new Theme();
            $theme->setLibelle($themeName);
            $manager->persist($theme);

            // 2. Création du quiz lié au thème
            $quiz = new Quiz();
            $quiz->setTitle("Quiz " . $themeName);
            $quiz->setTheme($theme);
            $manager->persist($quiz);

            // 3. Création des questions
            foreach ($questionsData as $questionText => $answers) {

                // Mélanger les réponses
                shuffle($answers);

                $question = new Question();
                $question->setTitle($questionText);
                $question->setQuiz($quiz);   // IMPORTANT
                $question->setTheme($theme); // LA CORRECTION

                foreach ($answers as $answerData) {
                    [$label, $isCorrect] = $answerData;

                    $reponse = new Reponse();
                    $reponse->setLibelle($label);
                    $reponse->setIsCorrect($isCorrect);
                    $reponse->setQuestion($question);

                    $manager->persist($reponse);
                }

                $manager->persist($question);
            }

            $manager->flush();
        }
    }
}
