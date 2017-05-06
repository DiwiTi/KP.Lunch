<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KP\Lunch\Controller;

use KP\Lunch\Domain\Model\Lunch;
use KP\Lunch\Domain\Repository\LunchRepository;
use KP\Lunch\Domain\Model\User;
use KP\Lunch\Domain\Repository\UserRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;




class UserController extends AbstractBaseController 
{
    
    /**
     * @Flow\Inject
     * @var LunchRepository
     */
    protected $lunchRepository;
    
    /**
     * @Flow\Inject
     * @var UserRepository
     */
    protected $userRepository;
    
    
    public function showAction() {
        
        $user = $this->userRepository->findByUname($this->account->getAccountIdentifier());  
        
        $this->view->assign('user', $user);
        
    }
    
    /**
     * save the registration
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function changeAction($firstName, $lastName, $email) {
        
        $user = new User($this->account->getAccountIdentifier());
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $this->userRepository->updateUser($user);
        
        $this->redirect('index', 'Standard');
        
    }
    
}
