<?php

namespace App\Controller;

use App\Entity\OffreDeCasting;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(SessionInterface $session, ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $CastingRepo = $em->getRepository(OffreDeCasting::class);
        $Casting = $CastingRepo->findAll();


        return $this->render('mon/search.html.twig', [
            'casting' => $Casting,
        ]);
    }
}
