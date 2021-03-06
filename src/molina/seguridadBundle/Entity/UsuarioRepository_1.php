<?php

namespace molina\seguridadBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository implements UserProviderInterface {

    public function loadUserByUsername($username) {
     return $this->getEntityManager()
         ->createQuery('SELECT u FROM
         molinaseguridadBundle:Usuario u
         WHERE u.login = :username')
         ->setParameters(array(
                       'username' => $username
                        ))
         ->getOneOrNullResult();
    }

    public function refreshUser(UserInterface $user) {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return $class === 'molina\seguridadBundle\Entity\Usuario';
    }

}
