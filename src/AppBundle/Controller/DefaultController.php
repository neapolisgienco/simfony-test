<?php

namespace AppBundle\Controller;

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
        $products2 =$this ->getDoctrine() ->getRepository('AppBundle:Product2') ->findAll();
        dump($products2);

        $products=[];
        for ($i=1; $i <= 10; $i++){//урок 6 2.40
            $products[] =rand(1, 100);
        }


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['products' => $products,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
