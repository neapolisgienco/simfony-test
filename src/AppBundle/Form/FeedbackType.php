<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FeedbackType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')//здесь  можно засетить третьим параметром html классы фром контрол
            ->add('massage', \Symfony\Component\Form\Extension\Core\Type\TextType::class );
        //насильно поменяли тексэриа на поле текст, тут масса настроек
    }
    //;
    //->add('created');

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Feedback'//только это сюда сама форма- сюда передаётся форма
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_feedback';//префикс формы для фронтэнда
    }


}
