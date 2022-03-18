<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{
    #[Route('/mon', name: 'app_mon')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //récupérer un champ
        $em = $doctrine->getManager();
        $artisteRepo = $em->getRepository(Artiste::class);
        $artiste = $artisteRepo->findAll();
        dump($artiste);




        return $this->render('mon/index.html.twig', [
            'controller_name' => 'MonController',
        ]);
    }
}
