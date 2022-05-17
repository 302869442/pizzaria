<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\Size;
use Doctrine\DBAL\Types\ObjectType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fname', TextType::class, array(
                'label' => 'first name'
            ))
            ->add('lname', TextType::class, array(
                'label' => 'last name'
            ))
            ->add('address')
            ->add('city')
            ->add('zipcode')
            ->add('size', EntityType::class, array(
                // 'choices' => [
                //     'medium(25cm)' => new Size(1),
                //     'large(30cm)' => new Size(2),
                //     'calzone' => new Size(3),
                // ]
                'class' => Size::class,
                'choice_label' => 'name'
            ))
            ->add('submit', SubmitType::class, array(
                'attr' => ['class' => 'btn'],
                'label' => 'Place Order',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
