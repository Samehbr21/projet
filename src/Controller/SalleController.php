<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Form\SalleType;
use App\Repository\SalleRepository;
use Doctrine\Common\Annotations\Annotation;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SalleController extends AbstractController
{
    /**
     * @Route("/salle", name="salle")
     */
    public function index(): Response
    {
        return $this->render('salle/index.html.twig', [
            'controller_name' => 'SalleController',
        ]);
    }


   /**
   *@param SalleRepository $repository
    * @return Response
    * @Route ("AfficheClass",name ="AfficheClass")
    */
     public function Affiche(SalleRepository $repository){
     //$repo=$this->getDoctrine()->getRepository(Salle::class);
     $salle=$repository ->findAll();
     return $this->render('salle/Affiche.html.twig',
     ['salle' => $salle]);
     }

    /**
     * @Route *("/sup/{idsalle}",name ="d")
     */
    function Delete($idsalle, SalleRepository $repository){
    $Salle=$repository-> find ($idsalle);
    $em= $this -> getDoctrine()->getManager();
    $em ->remove($Salle);
    $em -> flush(); // mettre a jour
    return $this-> redirectToRoute('AfficheClass');
    return new Response('Produit ajouté');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("/salle/Add")
     */
    function Add(Request $request)
    {
        $salle = new Salle();
        $form = $this->createForm(SalleType::class, $salle);
        $form->add('Ajouter', submitType::class);
        $form->handleRequest($request); //gerer la requette, parcourir et extraire
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();
            return $this->redirectToRoute('AfficheClass');
        }
        return $this->render('salle/Add.html.twig', ['form' => $form->createView()
        ]);
    }

        /**
         * @param SalleRepository $repository
         * @return Response
         * @Route ("/salle/Tables")
         */
        function Tables(SalleRepository $repository){
            $salle=$repository ->findAll();
            return $this->render('salle/Tables.html.twig',
                ['salle' => $salle]);
        }

    /**
     * @Route("salle/Update/{idsalle}",name="update")
     */
    function Update(SalleRepository $repository,$idsalle,Request $request){
        $salle=$repository->find($idsalle);
        $form=$this->createForm(SalleType::class,$salle);
        $form->add('Update',submitType::class);
        $form->handleRequest($request); //gerer la requette
         if ($form->isSubmitted() && $form->isValid()){
             $em=$this->getDoctrine()->getManager();
             $em->flush();
             return $this->redirectToRoute("AfficheClass");

         }
    return $this->render('salle/Update.html.twig',
    [
        'f'=> $form->createView()
    ]);
    }
}
