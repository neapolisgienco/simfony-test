<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
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




        $a=123;
        $someArray=[1,2,3];
        $someVelue= false;
        return $this->render('default/index.html.twig', [
            'a'=> $a,
            'some_array'=>$someArray,
            'some_velue'=>$someVelue,
            'productsMassiv' => $productsMassiv, 'products' => $products,
                  ]);
    }


    /**
     * @Route("/feedback", name="feedback")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
      public function feedbackAction(Request $request)
      {

         $form =$this->createForm(FeedbackType::class);
         $form->add ('submut', SubmitType::class);
           //dump($form );

           $form->handleRequest($request);
           if($form->isSubmitted()&&$form->isValid()){
               $feedback=$form->getData();//отдаёт либо сущность либо ассоциативный объект
               //dump($feedback);
               $em=$this->getDoctrine()->getManager();//энтети менеджер заботиться о том чтобы
               //в частности сохранять сущность в базу данных
               //сущность надо добавить в поле зрения менеджера
               //после того как вы добавили вы можете её сохранять
               $em->persist($feedback);//гит эдд
               //вы можете на создовать кучу сущностей новых понасоздавать из разных таблиц
               //их всех заперсистить
               //а потом один раз сделать флаш
               // так же как мы добавляем много файлов потом один раз комитим
               //var_dump($request->server);//$feedback
               dump($request->server->get('REMOTE_ADDR'));//die;
               $em->flush();//гит комит
               $this->addFlash('success','Saved');// выдали сообщение о том что всё сохранено
               //всё запаковано в транзакции в случае чаго можно сделать откат
               //  save
               return $this->redirectToRoute('feedback');
               // redirect
           }

         return $this->render('default/feedback.html.twig',[
             'feedback_form' =>$form->createView()
         ]);
      }




}
