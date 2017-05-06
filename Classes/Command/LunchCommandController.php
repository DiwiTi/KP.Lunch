<?php
namespace KP\Lunch\Command;

/*
 * This file is part of the KP.Lunch package.
 */

use KP\Lunch\Domain\Model\Lunch;
use KP\Lunch\Domain\Repository\LunchRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class LunchCommandController extends CommandController
{


    /**
     * @Flow\Inject
     * @var LunchRepository
     */
    protected $lunchRepository;

    /**
     * @param string $name This argument is required
     * @return void
     */
    public function exampleCommand($name)
    {
        $date = date('Y-m-d', time());        
        $lunch = new Lunch($name, 0, 's', 'kleiner Testsalat', $date);
        $this->lunchRepository->add($lunch);

        $this->outputLine('Erfolgreich ein Essen angelegt mit dem Namen:  "%s"', [$name]);
    }

}
