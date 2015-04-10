<?php

namespace Hackzilla\Bundle\TicketBundle\User;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface as SecurityTokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class FOSUser implements UserInterface
{
    private $securityContext;
    private $securityToken;
    private $securityChecker;
    private $userManager;

    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    public function setSecurityContext(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function setSecurityToken(SecurityTokenStorageInterface $securityToken)
    {
        $this->securityToken = $securityToken;
    }

    public function setSecurityChecker(AuthorizationCheckerInterface $securityChecker)
    {
        $this->securityChecker = $securityChecker;
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
