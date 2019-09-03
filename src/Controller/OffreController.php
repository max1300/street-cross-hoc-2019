<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offre;

class OffreController extends AbstractController
{
    /**
     * @Route("/offres", name="offres_liste")
     */
    public function index()
    {
        $offre = new Offre();
        $offre->setTitle("mon titre")
            ->setDescription("lorem ispsum");

        $offre2 = new Offre();
        $offre2->setTitle("mon titre2")
            ->setDescription("lorem ispsum2");

        $offre3 = new Offre();
        $offre3->setTitle("mon titre3")
            ->setDescription("lorem ispsum3");


        return $this->render('offre/liste_des_offres.html.twig', [
            'offres' => [$offre, $offre2, $offre3]
        ]);
    }
}
