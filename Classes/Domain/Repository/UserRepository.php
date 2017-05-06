<?php
namespace KP\Lunch\Domain\Repository;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;
use KP\Lunch\Domain\Model\Database;
use KP\Lunch\Domain\Model\User;

/**
 * @Flow\Scope("singleton")
 */
class UserRepository extends Repository
{

    public function findByUname($uname) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM user WHERE uname = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $uname);
        $statement->execute();
        
        $result = $statement->get_result();
        
        $row = $result->fetch_assoc();
             
        $user = new User($uname);
        $user->setStatus($row['iduser']);
        $user->setFirstName($row['firstname']);
        $user->setLastName($row['lastname']);
        $user->setEmail($row['email']);
        return $user;
        
    }
    
    public function updateUser(User $user) {
        
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();
        $email = $user->getEmail();
        $uname = $user->getUsername();
        
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE user SET firstname = ?, lastname = ?, email = ? WHERE uname = ?";
        $statement = $conn->prepare($sql); 
        
        $statement->bind_param('ssss', $firstname, $lastname, $email, $uname);
        $statement->execute();
        
        
    }
}
