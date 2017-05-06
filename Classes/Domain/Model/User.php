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
class User
{

   /**
   * @var KP\Lunch\Domain\Model\Order
   * @ORM\OneToMany(mappedBy="user")
   */
  protected $orders;

  /**
   * @var string
   * @ORM\Column(length=100)
   */
  protected $firstName;
  
   /**
   * @var string
   * @ORM\Column(length=100)
   */
  protected $lastName;

  /**
   * @var string
   * @ORM\Column(length=100)
   */
  protected $username;

  /**
   * @var string
   * @ORM\Column(type="text")
   */
  protected $email;
  
  /**
   * @var string
   * @ORM\Column(length=10)
   */
  protected $status;
          
  
  public function __construct($username) {
      $this->username = $username;
  }

  
  public function getFirstName() {
      return $this->firstName;
  }

  public function getLastName() {
      return $this->lastName;
  }

  public function getUsername() {
      return $this->username;
  }

  public function getEmail() {
      return $this->email;
  }

  public function getStatus() {
      return $this->status;
  }

  public function setFirstName($firstName) {
      $this->firstName = $firstName;
  }

  public function setLastName($lastName) {
      $this->lastName = $lastName;
  }

  public function setUsername($username) {
      $this->username = $username;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function setStatus($status) {
      $this->status = $status;
  }


}
