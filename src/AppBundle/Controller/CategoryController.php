<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * @Route("/categorys", name="category_list")
     * @Template()
     */
    public function indexAction()
    {
        $categorys= $this
            ->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findBy([],['name'=> 'ASC']);

        //findAll();
        return ['categorys' => $categorys];

    }


}