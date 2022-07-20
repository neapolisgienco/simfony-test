<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;

class SerializeProductServise
{
  public function serialize(Product $product)
  {
      $arr=[
             'title' => $product->getTitle(),
             'category' => $product->getCategory()->getName(),
             'prise' => $product->getPrice()
          ];
      return $arr;//$this->serialize()
  }
}