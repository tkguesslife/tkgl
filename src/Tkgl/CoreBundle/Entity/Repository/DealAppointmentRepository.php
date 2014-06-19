<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tkgl\CoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Tkgl\CoreBundle\Entity\DealAppointment;
use Tkgl\CoreBundle\Entity\Appointment;
/**
 * Description of DealAppointmentRepository
 *
 * @author Tiko Banyini <tiko@falcorp.co.za>
 */
class DealAppointmentRepository extends EntityRepository {
  
  
  /**
   * Create a new DealAppointment object
   * @param type $objOwner
   * @return \Tkgl\CoreBundle\Entity\DealAppointment
   * @author Tiko Banyini <admin@tkbean.co.za>
   */
  public function createNew($objOwner){
    $newDealAppointment = new DealAppointment();
    $newDealAppointment->setCreatedBy($objOwner);
    
    $newAppointment = new Appointment();
    $newAppointment->setCreatedBy($objOwner);
    $newDealAppointment->setAppointment($newAppointment);
    
    return $newDealAppointment;
    
  }
}
