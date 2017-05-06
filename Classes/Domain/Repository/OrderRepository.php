<?php
namespace KP\Lunch\Domain\Repository;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;
use KP\Lunch\Domain\Model\Database;
use KP\Lunch\Domain\Model\Lunch;
use KP\Lunch\Domain\Model\User;

/**
 * @Flow\Scope("singleton")
 */
class OrderRepository extends Repository
{

    /**
     * 
     * @param int $idlunch
     * @param User $user
     */
    public function addLunchToUser($idlunch, $user) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();  
        $sql = "INSERT INTO flow.order (iduser, idlunch) VALUES (?, ?)";
        $statement = $conn->prepare($sql);
        $userID = $user->getStatus();
        $statement->bind_param('ss', $userID, $idlunch);
        $statement->execute();       
    }
    
    public function findByUser($user) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM flow.order WHERE iduser = ? ORDER BY idlunch";
        $statement = $conn->prepare($sql);
        $userid = $user->getStatus();
        $statement->bind_param('i', $userid);
        $statement->execute();        
        $result = $statement->get_result();
        $lunchIDs = [];
        while($row = $result->fetch_assoc()) {            
            $lunchIDs[] = $row;
        }
        
        return $lunchIDs;                
    }
    
    /**
     * 
     * @param integer $idorder
     */
    public function deleteByID($idorder) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();  
        $sql = "DELETE FROM flow.order WHERE idorder = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $idorder);
        $statement->execute();   
        
    }
    
}
