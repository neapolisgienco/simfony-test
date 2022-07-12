<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("products", name="product_list")
     */
    public function indexAction()
    {
        die('123');
    }
    public function showAction()
    {
        die('345');
    }
}