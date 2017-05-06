<?php
namespace KP\Lunch\Controller;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use KP\Lunch\Domain\Model\MonthlyBill;

class MonthlyBillController extends ActionController
{

    /**
     * @Flow\Inject
     * @var \KP\Lunch\Domain\Repository\MonthlyBillRepository
     */
    protected $monthlyBillRepository;

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('monthlyBills', $this->monthlyBillRepository->findAll());
    }

    /**
     * @param \KP\Lunch\Domain\Model\MonthlyBill $monthlyBill
     * @return void
     */
    public function showAction(MonthlyBill $monthlyBill)
    {
        $this->view->assign('monthlyBill', $monthlyBill);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param \KP\Lunch\Domain\Model\MonthlyBill $newMonthlyBill
     * @return void
     */
    public function createAction(MonthlyBill $newMonthlyBill)
    {
        $this->monthlyBillRepository->add($newMonthlyBill);
        $this->addFlashMessage('Created a new monthly bill.');
        $this->redirect('index');
    }

    /**
     * @param \KP\Lunch\Domain\Model\MonthlyBill $monthlyBill
     * @return void
     */
    public function editAction(MonthlyBill $monthlyBill)
    {
        $this->view->assign('monthlyBill', $monthlyBill);
    }

    /**
     * @param \KP\Lunch\Domain\Model\MonthlyBill $monthlyBill
     * @return void
     */
    public function updateAction(MonthlyBill $monthlyBill)
    {
        $this->monthlyBillRepository->update($monthlyBill);
        $this->addFlashMessage('Updated the monthly bill.');
        $this->redirect('index');
    }

    /**
     * @param \KP\Lunch\Domain\Model\MonthlyBill $monthlyBill
     * @return void
     */
    public function deleteAction(MonthlyBill $monthlyBill)
    {
        $this->monthlyBillRepository->remove($monthlyBill);
        $this->addFlashMessage('Deleted a monthly bill.');
        $this->redirect('index');
    }

}
