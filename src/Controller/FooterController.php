<?php

namespace App\Controller;

use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{
    #[Route('/footer', name: 'footer')]
    public function footer(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $OffresRepo = $em->getRepository(OffreDeCasting::class);
        $offresCastingCount = count($OffresRepo->findAll());
        $OffreDeCasting = $OffresRepo->findAll();


        return $this->render('layout/footer.html.twig', [
            'OffreDeCastingCount' => $offresCastingCount,
            'OffreDeCasting' => $OffreDeCasting,

        ]);
    }
}
