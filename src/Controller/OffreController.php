<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offre;
use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\OffreType;
use Doctrine\ORM\EntityManagerInterface;

class OffreController extends AbstractController
{

    /**
     * @Route("/offres", name="offres_liste")
     */
    public function index(OffreRepository $offreRepo)
    {
        $offre = $offreRepo->findAll();

        return $this->render('offre/liste_des_offres.html.twig', [
            'offres' => $offre
        ]);
    }


    /**
    * @Route("/create", name="offre_create")
    * @Route("/offres/{id}/edit", name="offre_edit")
    */
     public function create(Offre $offre = null, Request $request, EntityManagerInterface $entityManager) 
     {
        if(!$offre){
            $offre = new Offre();
        }
        

        $form = $this->createForm(OffreType::class, $offre);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offre);
            $entityManager->flush();

            
            return $this->redirectToRoute('offre_showOne', ['id' => $offre -> getId()]);
        }

        return $this->render(
            'offre\create.html.twig', [
            'form' => $form -> createView(),
            'editMode' => $offre -> getId() !== null
        ]);

     }

     
    /**
    * @Route("/offres/{id}", name="offre_showOne")
    */
     public function show(Offre $offre)
    {
         return $this->render('offre/showOne.html.twig', [
             'offre' => $offre
         ]);
    }


    
}
