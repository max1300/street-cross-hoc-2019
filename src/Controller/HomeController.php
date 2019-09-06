<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $entityManager)
    {
        $user = new User();
        

        $form = $this->createForm(ContactType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre message a été envoyé, merci."
            );

            return $this->redirectToRoute('display_flash');
        }

        return $this->render(
            'home/contact.html.twig', [
            'form' => $form -> createView()
            ]
            );
    }

    /**
     * @Route("/display/message", name="display_flash")
     */
    public function flash(){

        return $this->render(
            'home/flash.html.twig'
        );
    }
}
