<?php
namespace KP\Lunch\Controller;

/*
 * This file is part of the KP.Lunch package.
 */

use KP\Lunch\Domain\Model\Database;
use KP\Lunch\Domain\Model\Lunch;
use KP\Lunch\Domain\Repository\LunchRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

class LunchController extends AbstractBaseController
{

    /**
     * @Flow\Inject
     * @var LunchRepository
     */
    protected $lunchRepository;

    /**
     * @return void
     */
    public function indexAction()
    {

        $lunches = $this->lunchRepository->findAll();

        //$this->view->assign('lunches', $lunches);
        $lunches = 'hi';
        $this->view->assign('hi', $lunches);
    }

    /**
     * url: /kp.lunch/Lunch/show.html?date=YYYY-MM-DD
     * 
     * @param string $tstamp
     */
    public function showAction($tstamp = "") {
        
        if ($tstamp == "") {
            date_default_timezone_set("Europe/Berlin");
            $tstamp = time();
        }
        
        $lunches = $this->lunchRepository->getLunchesByDate($tstamp);
    
        $nextDate = date("Y-m-d", $tstamp+24*60*60);
        $nextTstamp = $tstamp+24*60*60;
        $prevDate = date("Y-m-d", $tstamp-24*60*60);
        $prevTstamp = $tstamp-24*60*60;  
        
        //\Neos\Flow\var_dump($lunches);
    
        $this->view->assignMultiple(array('lunches' => $lunches,
                                        'nextDate' => $nextDate,
                                        'nextTstamp' => $nextTstamp,
                                        'prevDate' => $prevDate,
                                        'prevTstamp' => $prevTstamp));
        
    }
    
    public function listAction() {
        
    }

}
