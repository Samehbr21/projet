<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    /**
     * @return Response
     * @Route ("/affiche",name="affiche")
     */
    public function affiche(){
        return new Response("Bonjour sameh");
    }

    /**
     * @param $name
     * @return mixed
     * @Route ("/afficheN/{name}",name="afficheN")
     */
    public function AfficheName($name){
        return $this->render('club/affiche.html.twig',
            ['n'=>$name]);
    }
}
