<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{
    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\NoResultException
     */
    #[Route('/artiste', name: 'artiste')]
    public function artiste(ManagerRegistry $doctrine, SessionInterface $session, Request $request, ArtisteRepository $artisteRepository): Response
    {
        $em = $doctrine->getManager();
        $artisteRepo = $em->getRepository(Artiste::class);
        $artiste = $artisteRepo->findAll();

        $limit = 8;

        $page = (int)$request->query->get("page", 1);

        $artistes = $artisteRepository->getPaginateArtiste($page, $limit);

        $total = $artisteRepository->getTotalArtiste();


        return $this->render('mon/artiste.html.twig', [
            'controller_name' => 'ArtisteController',
            'Artiste' => $artiste,
            'artistes' => $artistes,
            'pages' => $page,
            'limit' => $limit,
            'total' => $total,
        ]);
    }
}
