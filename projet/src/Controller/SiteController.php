<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Offres;
use App\Entity\Contrats;
use App\Entity\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class SiteController extends AbstractController
{
    
    /**
     * @Route("/site", name="site")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $repo->findAll();

        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'offres' => $offres
        ]);

        $repo = $this->getDoctrine()->getRepository(Type::class);
        $types = $repo->findAll();

        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'types' => $types
        ]);

        $repo = $this->getDoctrine()->getRepository(Type::class);
        $contrats = $repo->findAll();

        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'contrats' => $contrats
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('site/home.html.twig');
    }

    /**
    * @Route("/site/new",  name="site_create")
    * @Route("/site/{id}/edit",  name="site_edit")
    */
    public function form(Offres $offre = null, Request $request, EntityManagerInterface  $manager) {
        
        if(!$offre) {
            $offre = new Offres();
        }
       
        
        $contrats = new Contrats();

        $form = $this->createFormBuilder($offre)
                    ->add('title')
                    ->add('description')
                    ->add('adresse')
                    ->add('codepostal')
                    ->add('ville')
                 
                    ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            if(!$offre->getId()){
                $offre->setdatedecreation(new \DateTime());
                $offre->setdatedemiseajour(new \DateTime()); 
            }
            

            $manager->persist($offre);
            $manager->flush();

            return $this->redirectToRoute('show', ['id' => $offre->getId()]);
        }

        return $this->render('site/create.html.twig', [
            'formOffre' => $form->createView(),
            'editMode' =>$offre->getId() !== null
        ]);

        $type = new Type();

        $form = $this->createFormBuilder($types)
                    ->add('tcontrat')
                    
                    ->getForm();
        
        


        return $this->render('site/create.html.twig', [
            'formType' => $form->createView()
        ]);

        $contrats = new Contrats();

        $form = $this->createFormBuilder($contrats)
                    ->add('tcontrat')
                    
                    ->getForm();
        
        


        return $this->render('site/create.html.twig', [
            'formContrats' => $form->createView()
        ]);
    }

    /**
    * @Route("/site/{id}", name="page")
    */
    public function page($id) {
        $repo = $this->getDoctrine()->getRepository(Offres::class);

        $offre = $repo->find($id);
        return $this->render('site/page.html.twig', [
            'offre' => $offre
        ]);
    }

    /**
    * @Route("/site/{id}", name="show")
    */
    public function show($id) {
        $repo = $this->getDoctrine()->getRepository(Offres::class);

        $offre = $repo->find($id);
        return $this->render('site/show.html.twig', [
            'offre' => $offre
        ]);
    }
   
}
