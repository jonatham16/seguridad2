<?php

namespace molina\seguridadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use molina\seguridadBundle\Entity\Usuario;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('molinaseguridadBundle:Default:index.html.twig', array('name' => $name));
    }

    public function paginaprotegidaAction() {
        return $this->render('molinaseguridadBundle:Default:paginaprotegida.html.twig');
    }

    public function loginAction() {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR, $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        return $this->render('molinaseguridadBundle:Default:login.html.twig', array(
                    'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                    'error' => $error
        ));
    }
    public function registroAction(Request $request) {
        $usuario = new Usuario();
        $formulario=  $this->createFormBuilder($usuario)
            ->add('nombre')
            ->add('login')
            ->add('password')
            ->add('guardar', 'submit', array('label' => 'Guardar Usuario'))    
            ->getForm();
        $formulario->handleRequest($request);
        if ($formulario->isValid()) {
            echo 'hola';
        }
    return $this->render('molinaseguridadBundle:Default:registro.html.twig',
            array('formulario' => $formulario->createView()));
    }

}
