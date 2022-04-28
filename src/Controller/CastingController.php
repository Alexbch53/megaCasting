<?php

namespace App\Controller;

use App\Entity\Domaine;
use App\Entity\Metier;
use App\Entity\OffreDeCasting;
use App\Entity\TypeContrat;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CastingController extends AbstractController
{
    #[Route('/casting', name: 'casting')]
    public function casting(SessionInterface $session, ManagerRegistry $doctrine): Response
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

        return $this->render('mon/casting.html.twig', [
            'offreDeCasting' => $offreCasting,
            'Domaine' => $Domaine,
            'TypeContrat' => $TypeContrat,
            'Metier' => $Metier,
        ]);
    } 
}
