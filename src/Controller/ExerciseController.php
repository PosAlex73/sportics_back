<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Repository\ExerciseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExerciseController extends AbstractController
{
    public function __construct(protected ExerciseRepository $exerciseRepository)
    {
    }

    #[Route('/exercises', name: 'exercise_list')]
    public function exerciseList(): Response
    {
        return $this->json(
            $this->exerciseRepository->getList()
        );
    }

    #[Route('/exercise/{id}', name: 'exercise_details')]
    public function exerciseDetails(Exercise $exercise)
    {
        return $this->json(
            $this->exerciseRepository->getById($exercise->getId())
        );
    }
}
