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
use KP\Lunch\Domain\Repository\OrderRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

class OrderController extends AbstractBaseController 
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
    
    /**
     * @Flow\Inject
     * @var OrderRepository
     */
    protected $orderRepository;
    
    /**
     * 
     * @param string $idlunch
     */
    public function newAction($idlunch) {
        
        $uname = $this->account->getAccountIdentifier();        
        $user = $this->userRepository->findByUname($uname);        
        $this->orderRepository->addLunchToUser($idlunch, $user);        
        
        $this->redirect('list', 'Order');
        
    }
    
    public function listAction() {
        
        $uname = $this->account->getAccountIdentifier();        
        $user = $this->userRepository->findByUname($uname);
        $lunchIDs = $this->orderRepository->findByUser($user);
        
        $lunches = [];
        foreach ($lunchIDs as $ids) {            
            $lunches[$ids['idorder']] = $this->lunchRepository->getLunchByID($ids['idlunch']);            
        }
        
        $this->view->assignMultiple(array('lunches' => $lunches));
    }
    
    /**
     * 
     * @param integer $idorder
     */
    public function deleteAction($idorder) {
        
        $this->orderRepository->deleteByID($idorder);
        
        $this->redirect('list');
    }
    
    public function payAction() {
        
        $uname = $this->account->getAccountIdentifier();        
        $user = $this->userRepository->findByUname($uname);
        $lunchIDs = $this->orderRepository->findByUser($user);
        
        $a = 0;
        $b = 0;
        $c = 0;
        $others = 0;
        $total = 0;
        
        foreach ($lunchIDs as $ids) {    
            
            switch ($this->lunchRepository->getLunchByID($ids['idlunch'])['type']) {
                case 'A': 
                    $a++;
                    break;        
                case 'B': 
                    $b++;
                    break;
                case 'C': 
                    $c++;
                    break;
                default :
                    $others++;
                    break;
            }
            
            $total = $total + $this->lunchRepository->getLunchByID($ids['idlunch'])['price'];            
        }
        
        $this->view->assignMultiple(array(
            'amountA' => $a,
            'amountB' => $b,
            'amountC' => $c,
            'amountOthers' => $others,
            'total' => $total/100
        ));
        
    }
      
}
