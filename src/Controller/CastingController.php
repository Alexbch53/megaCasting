<?php

namespace App\Controller;

use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CastingController extends AbstractController
{

    #[Route('/casting', name: 'casting')]
    public function casting(SessionInterface $session,ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $OffreRepo = $em->getRepository(OffreDeCasting::class);
        $offreCasting = $OffreRepo->findAll();

        return $this->render('mon/casting.html.twig', [
            'offreDeCasting' => $offreCasting,
        ]);
    }
}
