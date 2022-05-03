<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\Postuler;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function profil(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $artiste = $this->getUser();

        $queryPostulations = $em->createQueryBuilder()
            ->select('p')
            ->from(Postuler::class, 'p')
            ->where('p.artiste = :artiste')
            ->setParameter('artiste', $this->getUser()->getIdentifiant());
        $postulations = $queryPostulations->getQuery()->getResult();


        return $this->render('profil/profil.html.twig', [
            'artiste' => $artiste,
            'postulations' => $postulations,

        ]);
    }
}

