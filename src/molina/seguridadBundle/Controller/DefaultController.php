<?php

namespace molina\seguridadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use molina\seguridadBundle\Entity\Usuario;
use molina\seguridadBundle\Form\Frontend\UsuarioType;
use Symfony\Component\HttpFoundation\Request;

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
        /*      $formulario=  $this->createFormBuilder($usuario)
          ->add('nombre')
          ->add('login')
          ->add('password')
          ->add('guardar', 'submit', array('label' => 'Guardar Usuario'))
          ->getForm();
         * 
         */



        $usuario->setNombre('pruebadatoprimario');
        $formulario = $this->createForm(new UsuarioType(), $usuario);
        $formulario->handleRequest($request);
        if ($formulario->isValid()) {
            // perform some action, such as saving the task to the database
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($usuario);
            $em->flush();
            
            return $this->redirect($this->generateUrl('paginaprotegida'));
        }
        return $this->render('molinaseguridadBundle:Default:registro.html.twig', array('formulario' => $formulario->createView()));
    }

}
