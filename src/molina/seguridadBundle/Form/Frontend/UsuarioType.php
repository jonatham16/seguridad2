<?php
namespace molina\seguridadBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nombre')
                ->add('login','email')
                ->add('password', 'repeated', array(
                                                'type' => 'password',
                                                'invalid_message' => 'Las dos contraseñas deben coincidir',
                                                'options' => array('label' => 'Contraseña')
                                                ))
                ->add('guardar', 'submit', array('label' => 'Guardar Usuario'))
                ;
    }
    public function getName() {
        return 'molina_seguridadbundle_usuariotype';
    }

}