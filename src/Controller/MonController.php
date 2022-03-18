<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(SessionInterface $session,ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $OffreRepo = $em->getRepository(OffreDeCasting::class);
        $offreCasting = $OffreRepo->findAll();

        return $this->render('mon/index.html.twig', [
            'offreDeCasting' => $offreCasting,
        ]);
    }

}
