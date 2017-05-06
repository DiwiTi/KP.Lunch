<?php
namespace KP\Lunch\Domain\Model;

/*
 * This file is part of the KP.Lunch package.
 */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use KP\Lunch\Domain\Model\User;

/**
 * @Flow\Entity
 */
class Order
{

    /**
     * @var string
     */
    protected $name;

    
    /**
    * Orders contains Lunches
    * 
    * @var ArrayCollection<Lunch>
    * @ORM\ManyToMany(mappedBy="orders")
    */
    protected $lunches;
    
    /**
    * Order has 1 User
    * 
    * @var User    
    * @ORM\ManyToOne(inversedBy="orders")
    */
    protected $user;

    /**
    * already paid
    *
    * @var bool
    */
    protected $paid;
    
    /**
    * Order date
    *
    * @var \DateTime
    */
    protected $date;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return Collection<Lunch>
     */
    public function getLunches() {
        return $this->lunches;
    }

    /**
     * 
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }

    /**
     * 
     * @return bool
     */
    public function getPaid() {
        return $this->paid;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @param Collection<Lunch> $lunches
     * @return void
     */
    public function setLunches($lunches) {
        $this->lunches = $lunches;
    }

    /**
     * @param User $user
     * @return void
     */
    public function setUser(User $user) {
        $this->user = $user;
    }


    /**
     * 
     * @param bool $paid
     */
    public function setPaid($paid) {
        $this->paid = $paid;
    }

    /**
     * 
     * @param type $date
     */
    public function setDate($date) {
        $this->date = $date;
    }


    
}
