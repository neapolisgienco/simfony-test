<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("products", name="product_list")
     * @Template()
     */
    public function indexAction()
    {
        $products= $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();
        dump($products); die;
        $products=[];
        for($i=1; $i<=10; $i++){
            $products[]=rand(1, 100);
        }
        return ['products' => $products];

    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function showAction($id)
    {
        //dump($id);
        return $this->render('@App/product/show.html.twig', ['id'=>$id]);
        die('345');//die('123');
    }
}