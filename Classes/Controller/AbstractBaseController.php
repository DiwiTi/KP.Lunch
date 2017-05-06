<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KP\Lunch\Controller;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\ViewInterface;

/**
 * Description of AbstractBaseController
 *
 * @author timdi
 */
abstract class AbstractBaseController extends ActionController {

    /**
    * @var \Neos\Flow\Security\Account
    */
    protected $account;

    /**
    * @Flow\Inject
    * @var \Neos\Flow\Security\Context
    */
    protected $securityContext;

    /**
    * @return void
    */
    protected function initializeAction() {
        
        if ($this->securityContext->getAccount() == null) {
            $this->redirect('index', 'login');
        } else {
            $this->account = $this->securityContext->getAccount();
        }
        
    }

    /**
    * @param \Neos\Flow\Mvc\View\ViewInterface $view
    * @return void
    */
    protected function initializeView(ViewInterface $view) {
        $view->assign('accountID', $this->account->getAccountIdentifier());
    }
}
