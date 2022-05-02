<?php

namespace App\Controller;

use App\Entity\Domaine;
use App\Entity\Metier;
use App\Entity\OffreDeCasting;
use App\Entity\TypeContrat;
use App\Repository\OffreDeCastingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CastingController extends AbstractController
{
    #[Route('/casting', name: 'casting')]
    public function casting(SessionInterface $session, ManagerRegistry $doctrine,Request $request,OffreDeCastingRepository $offreDeCastingRepository): Response
    {
        $em = $doctrine->getManager();
        $OffreRepo = $em->getRepository(OffreDeCasting::class);
        $offreCasting = $OffreRepo->findAll();

        $DomaineRepo = $em->getRepository(Domaine::class);
        $Domaine = $DomaineRepo->findAll();

        $TypeContratRepo = $em->getRepository(TypeContrat::class);
        $TypeContrat = $TypeContratRepo->findAll();

        $MetierRepo = $em->getRepository(Metier::class);
        $Metier = $MetierRepo->findAll();

        $limit = 6;

        $page = (int)$request->query->get("page", 1);

        $castings = $offreDeCastingRepository->getPaginateCastings($page, $limit);

        $total = $offreDeCastingRepository->getTotalCastings();

        return $this->render('mon/casting.html.twig', [
            'offreDeCasting' => $offreCasting,
            'Domaine' => $Domaine,
            'TypeContrat' => $TypeContrat,
            'Metier' => $Metier,
            'Castings' => $castings,
            'pages' => $page,
            'limit' => $limit,
            'total' => $total,
        ]);
    } 
}
