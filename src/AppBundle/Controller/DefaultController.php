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

        // dump($this->container->get('doctrine'));//обект экземпляр доктрины
       dump($this->container->getParameter('api_key'));
        //dump($this->container->getParameter('database_name'));
        //отображаем базы данных файлы не комитятся в репрезенторий
              dump($this->container);
       // die;


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
        return $this->render('@App/default/index.html.twig', [
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
      public function feedbackAction(Request $request)//здесь ревест нужен так как данные сюда прилетят
      {

         $form =$this->createForm(FeedbackType::class);//создана форма
         $form->add ('submut', SubmitType::class);
         //кнопка субмит, какой элемент или подход для нарисования класс
           //dump($form );

           $form->handleRequest($request);//этот метод сетит в форму значения которые мы отправляем
          //как следствие можно их проверить и т.д.
           if($form->isSubmitted()&&$form->isValid()){//если форма валидна и отправлена
               $feedback=$form->getData();//отдаёт либо сущность либо ассоциативный объект
               //экземпляр класса фидбек в папке ентити//т.е. сущность//но нужно если валидно
               //dump($form->getData());
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
               //ретурн обязательно, из базового контролера куда переадресоваться после отпраки формы
               //отлследить в last 10 жмём в панели все редиректы токены просмтореть
               // redirect
           }

         return $this->render('@App/default/feedback.html.twig',[
             'feedback_form' =>$form->createView()//отрендерена форма
         ]);
      }




}
