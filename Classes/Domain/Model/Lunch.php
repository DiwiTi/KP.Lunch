<?php
namespace KP\Lunch\Domain\Model;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use KP\Lunch\Domain\Model\Order;
/**
 * @Flow\Entity
 */
class Lunch
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     * YYYY-MM-DD
     */
    protected $date;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection<KP\Lunch\Domain\Model\Order>
     * @ORM\ManyToMany(inversedBy="lunches")
     */
    protected $orders;
    
    /**
     * @var integer
     */
    protected $price;


     /**
     * @param string $n
     * @param int $id
     * @param string $t
     * @param string $d
     * @param string $date
     */
    public function __construct($n, $id, $t, $d, $date)
    {
        $this->name = $n;
        $this->id = $id;
        $this->type = $t;
        $this->date = $date;
        $this->description = $d;
    }


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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection<KP\Lunch\Domain\Model\Order>
     */
    public function getOrders() {
        return $this->orders;
    }

    /**
     * 
     * @return integer
     */
    public function getPrice() {
        return $this->price;
    }
    
    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return /DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection<KP\Lunch\Domain\Model\Order> $orders
     */
    public function setOrders($orders) {
        $this->orders = $orders;
    }

    /**
     * 
     * @param integer $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }
    
    /**
     * Adds a Order to this User
     *
     * @param Order $order
     * @return void
     */
    public function addOrder(Order $order) {
            $this->orders->add($order);
    }

    /**
     * Removes a post from this blog
     *
     * @param Order $order
     * @return void
     */
    public function removeOrder(Order $order) {
            $this->orders->removeElement($order);
    }
    
}
