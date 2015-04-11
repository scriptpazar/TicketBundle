<?php

namespace Hackzilla\Bundle\TicketBundle\User;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage as SecurityTokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class UserManager implements UserInterface
{
    private $securityContext;
    private $userManager;

    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
        $this->securityContext = $userManager->getSecurityContext();
    }

    /**
     * @return mixed
     */
    public function getCurrentUser()
    {
        $user = $this->securityContext->getToken()->getUser();

        return $user;
    }

    /**
     * @param integer $userId
     * @return mixed
     */
    public function getUserById($userId)
    {
        $user = $this->userManager->findUserBy(array(
            'id' => $userId,
        ));

        return $user;
    }

    /**
     * @param $user
     * @param string $role
     * @return boolean
     */
    public function hasRole($user, $role)
    {
        return $user->hasRole($role);
    }

    /**
     * Current user granted permission
     *
     * @param $user
     * @param string $role
     * @return boolean
     */
    public function isGranted($user, $role)
    {
        return $this->securityContext->isGranted($role);
    }
}
