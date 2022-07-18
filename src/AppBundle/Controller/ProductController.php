<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
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
        $products= $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive3();

        //findAll();
        return ['products' => $products];

    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function showAction(Product $product)//$id
    {
//        $product= $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
//        if(!$product){
//            throw $this->createNotFoundException('Product not found');
//        }
        //dump($id);
        return $this->render('@App/product/show.html.twig', ['product'=>$product]);
        //die('345');die('123');
    }
}