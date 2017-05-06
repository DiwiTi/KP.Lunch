<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KP\Lunch\Controller;

use Neos\Flow\Annotations as Flow;

class PdfController extends AbstractBaseController {
    
    public function createAction() {
        
        $uname = $this->account->getAccountIdentifier();        
        $user = $this->userRepository->findByUname($uname);
        $lunchIDs = $this->orderRepository->findByUser($user);
        
        $a = 0;
        $b = 0;
        $c = 0;
        $others = 0;
        $total = 0;
        
        foreach ($lunchIDs as $ids) {    
            
            switch ($this->lunchRepository->getLunchByID($ids['idlunch'])['type']) {
                case 'A': 
                    $a++;
                    break;        
                case 'B': 
                    $b++;
                    break;
                case 'C': 
                    $c++;
                    break;
                default :
                    $others++;
                    break;
            }            
            $total = $total + $this->lunchRepository->getLunchByID($ids['idlunch'])['price'];            
        }
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdfName = 'Pay_' . $uname . '.pdf';
        $pdf->Output('D', $pdfName); 
        
        $this->redirect('pay', 'Order');
        
    }
    
}
