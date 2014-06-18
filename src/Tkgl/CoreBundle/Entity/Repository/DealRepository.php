<?php

namespace Tkgl\CoreBundle\Entity\Repository;

use Tkgl\CoreBundle\Entity\Deal;
use Doctrine\ORM\EntityRepository;

/**
 * Description of DealRepository
 *
 * @author Tiko Banyini <tiko@falcorp.co.za>
 */
class DealRepository extends EntityRepository {

  /**
   * Create a new deal object
   * @param \Tkgl\UserBundle\Entity\User $objOwner
   * @return \Tkgl\CoreBundle\Entity\Deal
   */
  public function getNewDealWithDefaults($objOwner) {

    $objDeal = new Deal();
    $objDealStateUpdate = $this->getEntityManager()->getRepository('TkglCoreBundle:DealStateUpdate')->createDealStateUpdate($objOwner
            , \Tkgl\CoreBundle\Entity\DealState::NEW_LEAD_STATE, $objDeal);
    $objDeal->addDealStateUpdate(
            $objDealStateUpdate
    );

    $objDeal->setCreatedBy($objOwner);

    return $objDeal;
  }

}
