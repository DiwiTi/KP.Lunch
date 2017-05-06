<?php
namespace KP\Lunch\Controller;

/*
 * This file is part of the Kupper.Lunch package.
 */

use Neos\Flow\Annotations as Flow;

class StandardController extends \Neos\Flow\Mvc\Controller\ActionController
{

    /**
     * @Flow\Inject
     * @var \Neos\Flow\Security\Context
     */
    protected $securityContext;



    /**
     * @return void
     */
    public function indexAction()
    {

        $this->redirect('index','Lunch');
    }

}
