<?php

namespace Hackzilla\Bundle\TicketBundle\Extension;

use Hackzilla\Bundle\TicketBundle\User\UserInterface;

class UserExtension extends \Twig_Extension
{
    private $userManager;

    public function setUserManager(UserInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    public function getFilters() {
        return array(
            'isTicketAdmin' => new \Twig_Filter_Method($this, 'isTicketAdmin'),
        );
    }

    public function isTicketAdmin($user, $role)
    {
        if (!is_object($user)) {
            $user = $this->userManager->getUserById($user);
        }

        return $user->hasRole($role);
    }

    public function getName()
    {
        return 'hackzilla_ticket_user_extension';
    }
}
