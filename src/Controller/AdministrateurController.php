<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Form\AdministrateurType;
use App\Repository\AdministrateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdministrateurController extends AbstractController
{
    #[Route('/administrateur', name: 'administrateur')]
    public function index(AdministrateurRepository $repository): Response
    {
        $administrateurs = $repository -> findAll();
        return $this->render('administrateur/index.html.twig', [
            'administrateurs' => $administrateurs
        ]);
    }

    #[Route('/administrateur/{id}', name: 'suppression_administrateur', methods:'delete')]
    public function suppression(Administrateur $administrateurs, Request $request){

        $objectManager=$this->getDoctrine()->getManager();
        if($this->isCsrfTokenValid("SUP". $administrateurs->getId(),$request->get('_token'))){
            $objectManager->remove($administrateurs);
            $objectManager->flush();
            return $this->redirectToRoute("administrateur");
        }
    }

    #[Route('/administrateur/creation', name: 'creation_administrateur')]
    #[Route('/administrateur/{id}', name: 'modification_administrateur', methods:'GET|POST')]
    public function ajout_modification(Administrateur $administrateurs = null, Request $request)
    {
        if(!$administrateurs){

            $administrateurs = new Administrateur();
            
        }
        $objectManager=$this->getDoctrine()->getManager();
        
        $form = $this->createForm(AdministrateurType::class,$administrateurs);

        $form -> handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($administrateurs);
            $objectManager->flush();
            return $this->redirectToRoute("administrateur");
        }
        return $this->render('administrateur/modificationetajoutAdministrateur.html.twig', [
            'administrateurs' => $administrateurs,
            'form' => $form->createView(),
            'isModification' => $administrateurs->getId() !== null
        ]);
    }


   
}
