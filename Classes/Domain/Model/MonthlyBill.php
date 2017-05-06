<?php
namespace KP\Lunch\Domain\Model;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class MonthlyBill
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $id;




    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
