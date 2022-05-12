<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $products =$this ->getDoctrine() ->getRepository('AppBundle:Product') ->findAll();
        dump($products);

        $productsQB =$this ->getDoctrine() ->getRepository('AppBundle:Product') ->findActive();
        dump($productsQB);

        $productsQB2 =$this ->getDoctrine() ->getRepository('AppBundle:Product') ->findActive2();
        dump($productsQB2);
        $productsQB3 =$this ->getDoctrine() ->getRepository('AppBundle:Product') ->findActive3();
        dump($productsQB3);
        $products2 =$this ->getDoctrine() ->getRepository('AppBundle:Product2') ->findAll();
        dump($products2);

        $productsMassiv=[];
        for ($i=1; $i <= 10; $i++){//урок 6 2.40
            $productsMassiv[] =rand(1, 100);
        }




        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['productsMassiv' => $productsMassiv, 'products' => $products,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,

        ]);
    }


      /**
       * @Route("/feedback", name="feedback")
       */
      public function feedbackAction()
      {

         $form =$this->createForm(FeedbackType::class);
           dump($form );
         return $this->render('default/feedback.html.twig',[
             'feedback_form' =>$form->createView()
         ]);
      }




}
