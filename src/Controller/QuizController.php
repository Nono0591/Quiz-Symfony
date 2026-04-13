<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Entity\Quiz;
use App\Entity\Reponse;
use App\Entity\Resultat;
use App\Form\QuizType;
use App\Repository\QuizRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/quiz')]
final class QuizController extends AbstractController
{
    #[Route('/', name: 'app_quiz_index', methods: ['GET'])]
    public function index(QuizRepository $quizRepository): Response
    {
        return $this->render('quiz/index.html.twig', [
            'quizzes' => $quizRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_quiz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $quiz = new Quiz();
        $form = $this->createForm(QuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($quiz);
            $entityManager->flush();

            return $this->redirectToRoute('app_quiz_index');
        }

        return $this->render('quiz/new.html.twig', [
            'quiz' => $quiz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quiz_show', methods: ['GET'])]
    public function show(Quiz $quiz): Response
    {
        return $this->render('quiz/show.html.twig', [
            'quiz' => $quiz,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_quiz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Quiz $quiz, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_quiz_index');
        }

        return $this->render('quiz/edit.html.twig', [
            'quiz' => $quiz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quiz_delete', methods: ['POST'])]
    public function delete(Request $request, Quiz $quiz, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quiz->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($quiz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_quiz_index');
    }

    // -----------------------------
    // PAGE POUR ENTRER LE PSEUDO
    // -----------------------------
    #[Route('/{id}/start', name: 'quiz_start')]
    public function start(Request $request, Quiz $quiz, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $pseudo = $request->request->get('pseudo');

            if ($pseudo) {
                $participant = new Participant();
                $participant->setPseudo($pseudo);

                $em->persist($participant);
                $em->flush();

                $request->getSession()->set('participant_id', $participant->getId());

                return $this->redirectToRoute('quiz_play', ['id' => $quiz->getId()]);
            }
        }

        return $this->render('quiz/start.html.twig', [
            'quiz' => $quiz,
        ]);
    }

    // -----------------------------
    // PAGE POUR JOUER LE QUIZ
    // -----------------------------
   #[Route('/{id}/play', name: 'quiz_play')]
public function play(Quiz $quiz, EntityManagerInterface $em): Response
{
    // Récupérer le thème du quiz
    $theme = $quiz->getTheme();

    // Récupérer toutes les questions du thème
    $questions = $em->getRepository(\App\Entity\Question::class)->findBy([
        'quiz' => $quiz
    ]);

    // Mélanger les questions
    shuffle($questions);

    // Limiter à 20 questions
    $questions = array_slice($questions, 0, 20);

    return $this->render('quiz/play.html.twig', [
        'quiz' => $quiz,
        'questions' => $questions,
    ]);
}


    // -----------------------------
    // TRAITEMENT DU QUIZ
    // -----------------------------
    #[Route('/{id}/submit', name: 'quiz_submit', methods: ['POST'])]
    public function submit(Request $request, Quiz $quiz, EntityManagerInterface $em): Response
    {
        $participantId = $request->getSession()->get('participant_id');
        $participant = $em->getRepository(Participant::class)->find($participantId);

        $score = 0;

        foreach ($quiz->getQuestions() as $question) {
            $selected = $request->request->get('q'.$question->getId());

            if ($selected) {
                $reponse = $em->getRepository(Reponse::class)->find($selected);

                if ($reponse && $reponse->isCorrect()) {
                    $score++;
                }
            }
        }

        $resultat = new Resultat();
        $resultat->setQuiz($quiz);
        $resultat->setScore($score);
        $resultat->setParticipant($participant);

        $em->persist($resultat);
        $em->flush();

        return $this->render('quiz/result.html.twig', [
            'quiz' => $quiz,
            'score' => $score,
            'total' => count($quiz->getQuestions()),
        ]);
    }

    #[Route('/{id}/leaderboard', name: 'quiz_leaderboard')]
public function leaderboard(Quiz $quiz, EntityManagerInterface $em): Response
{
    $resultats = $em->getRepository(Resultat::class)->createQueryBuilder('r')
        ->where('r.quiz = :quiz')
        ->setParameter('quiz', $quiz)
        ->orderBy('r.score', 'DESC')
        ->addOrderBy('r.id', 'ASC')
        ->setMaxResults(10) // top 10
        ->getQuery()
        ->getResult();

    return $this->render('quiz/leaderboard.html.twig', [
        'quiz' => $quiz,
        'resultats' => $resultats,
    ]);
}

}
