<?php
namespace KP\Lunch\Domain\Repository;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;
use KP\Lunch\Domain\Model\Database;

/**
 * @Flow\Scope("singleton")
 */
class LunchRepository extends Repository
{

    public function getLunchesByDate($tstamp) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM lunch WHERE date = ?";
        $statement = $conn->prepare($sql);
        $date = date("Y-m-d", $tstamp);
        $statement->bind_param('s', $date);
        $statement->execute();
        
        $result = $statement->get_result();
        
        $lunches = [];
        
        while($row = $result->fetch_assoc()) {            
            $lunches[] = $row;
        }
      
        return $lunches;
        
    }
    
    public function getLunchByID($id) {
        
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM flow.lunch WHERE idlunch = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();        
        $result = $statement->get_result();
                
        while($row = $result->fetch_assoc()) {            
            $lunch = $row;
        }
      
        return $lunch;
        
    }

}
