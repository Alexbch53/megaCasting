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

class PageCastingController extends AbstractController
{

    #[Route('/casting/{id}', name: 'pagecasting')]
    public function pagecasting(SessionInterface $session,ManagerRegistry $doctrine, $id): Response
    {

        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\OffreDeCasting c WHERE c.identifiant = :id')->setMaxResults(1);
        $query->setParameter('id', $id);
        $casting = $query->getResult();

        $OffreRepo = $em->getRepository(OffreDeCasting::class);
        $offreCasting = $OffreRepo->findAll();

        $DomaineRepo = $em->getRepository(Domaine::class);
        $Domaine = $DomaineRepo->findAll();

        $TypeContratRepo = $em->getRepository(TypeContrat::class);
        $TypeContrat = $TypeContratRepo->findAll();

        $MetierRepo = $em->getRepository(Metier::class);
        $Metier = $MetierRepo->findAll();

        return $this->render('mon/CastingPage.html.twig', [
            'offreDeCasting' => $offreCasting,
            'Domaine' => $Domaine,
            'TypeContrat' => $TypeContrat,
            'Metier' => $Metier,
            'casting' => $casting[0],
        ]);
    }
}
