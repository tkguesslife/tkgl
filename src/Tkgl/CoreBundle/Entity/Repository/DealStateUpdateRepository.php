<?php
namespace Tkgl\CoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Tkgl\CoreBundle\Entity\DealStateUpdate;

/**
 * Description of DealStateUpdateRepository
 *
 * @author Tiko Banyini <tiko@falcorp.co.za>
 */
class DealStateUpdateRepository extends EntityRepository {
  
  
  /**
   * 
   * @param \Tkgl\CoreBundle\Entity\Repository\User $objOwner
   * @param Mixed $dealState - String or DealState object
   * return DealStateUpdate
   */
  public function createDealStateUpdate(\Tkgl\UserBundle\Entity\User $objOwner, $dealState, $objDeal){
    
    if(is_string($dealState)){
      $dealState = $this->getEntityManager()->getRepository('TkglCoreBundle:DealState')->getStateByName($dealState);
    }
    
    $objDealStateUpdate = new DealStateUpdate();
    $objDealStateUpdate->setCreatedBy($objOwner);
    $objDealStateUpdate->setDealState($dealState);
    $objDealStateUpdate->setDeal($objDeal);
    $this->getEntityManager()->persist($objDealStateUpdate);
    return $objDealStateUpdate;        
  }
  
}
