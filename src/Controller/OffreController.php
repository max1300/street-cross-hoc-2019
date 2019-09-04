<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offre;
use App\Repository\OffreRepository;


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
    * @Route("/offres/{id}", name="offre_showOne")
    */
     public function show(Offre $offre)
    {
         return $this->render('offre/showOne.html.twig', [
             'offre' => $offre
         ]);
    }


    // /**
    //  * @Route("/create", name="offre_create")
    //  */
    // public function create(EntityManagerInterface $entityManager): Response
    // {

    //     $faker = Faker\Factory::create('fr_FR');

    //     for($i= 0; $i < 10; $i++){
    //         $offre = new Offre();
    //         $offre->setTitle("Mon offre" . $i)
    //             ->setDescription("tentative d enregistrement d'offre" . $i)
    //             ->setCreatedAt(new \DateTime('now'));

    //         $entityManager->persist($offre);
    //     }
        
    //     $entityManager->flush();


    //     return $this->render(
    //         'offre\create.html.twig'
    //     );

    // }
}
