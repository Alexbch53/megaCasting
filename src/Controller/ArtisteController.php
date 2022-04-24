<?php

namespace App\Controller;

use App\Entity\Artiste;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{
    #[Route('/artiste', name: 'artiste')]
    public function artiste(ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        $em = $doctrine->getManager();
        $artisteRepo = $em->getRepository(Artiste::class);
        $artiste = $artisteRepo->findAll();

        return $this->render('mon/artiste.html.twig', [
            'controller_name' => 'ArtisteController',
            'Artiste' => $artiste,
        ]);
    }
}
