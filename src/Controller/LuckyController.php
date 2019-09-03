<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number", name="lucky_number")
     */
    public function number()
    {
        $lucky_number= random_int(0, 100);
        $nom = "antoine";

        return $this->render(
            'lucky/number.html.twig', 
            ['lucky_number' => $lucky_number,
            'nom' => $nom
            ]
        );
    }


    
}
