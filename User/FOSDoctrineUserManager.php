<?php

namespace Hackzilla\Bundle\TicketBundle\User;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage as SecurityTokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class FOSDoctrineUserManager extends \FOS\UserBundle\Doctrine\UserManager
{
    private $securityContext;
    private $securityToken;
    private $securityChecker;
    private $userManager;

//    public function setUserManager($userManager)
//    {
//        $this->userManager = $userManager;
//    }

    public function getSecurityContext()
    {
        return $this->securityContext;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }
//
//    public function setSecurityToken(SecurityTokenStorage $securityToken)
//    {
//        $this->securityToken = $securityToken;
//    }
//
//    public function setSecurityChecker(AuthorizationCheckerInterface $securityChecker)
//    {
//        $this->securityChecker = $securityChecker;
//    }
}
