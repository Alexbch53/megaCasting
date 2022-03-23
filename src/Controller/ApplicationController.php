<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\OffreDeCasting;
use App\Form\Type\ApplicationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application/new/{id}', name: 'app_application')]
    public function new(Request $request, ManagerRegistry $doctrine, $id): Response
    {
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\OffreDeCasting c WHERE c.identifiant = :id')->setMaxResults(1);
        $query->setParameter('id', $id);
        $casting = $query->getResult();

        $application = new Application();
        $application->setFirstName('Alexis');
        $application->setLastName('Beucher');
        $application->setApplicationDate(new \DateTime('tomorrow'));

        $form = $this->createForm(ApplicationType::class, $application);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $application = $form->getData();


            return $this->redirectToRoute('task_success');
        }

        return $this->renderForm('application/new.html.twig', [
            'form' => $form,
            'casting' => $casting[0],

        ]);
    }
}
