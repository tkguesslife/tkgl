<?php

namespace Tkgl\CoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Tkgl\CoreBundle\Entity\DealState;

/**
 * Description of DeaStateRepository
 *
 * @author Tiko Banyini <tiko@falcorp.co.za>
 */
class DealStateRepository extends EntityRepository {

  /**
   * get deal state by name, if object doesn't exist, a new one is created
   * @param type $name
   * @return \Tkgl\CoreBundle\Entity\DealState
   */
  public function getStateByName($name) {

    $objDealState = $this->findOneBy(array('name' => $name));

    if ($objDealState instanceof DealState) {
      return $objDealState;
    }

    $objDealState = new DealState();
    $objDealState->setName($name);

    $this->getEntityManager()->persist($objDealState);

    return $objDealState;
  }

}
