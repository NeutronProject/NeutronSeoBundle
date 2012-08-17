<?php
/*
 * This file is part of NeutronSeoBundle
 *
 * (c) Zender <azazen09@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Neutron\SeoBundle\Entity\Repository;

use Gedmo\Translatable\Entity\Repository\TranslationRepository;

class SeoRepository extends TranslationRepository
{
    public function deleteDefaultSeo()
    {
        $cache = $this->getEntityManager()->getConfiguration()->getResultCacheImpl();
        $cache->delete($this->generateDefaultCacheId());
        
        $qb = $this->createQueryBuilder();
        $qb
            ->delete($this->getClassName(), 's')
            ->where('s.isDefault = ?1')
            ->setParameter(1, true);
        ;
        
        $qb->getQuery()->execute();
        
    }
    
    public function getDefaultSeoQueryBuilder()
    {
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.isDefault = ?1');
        $qb->setParameter(1, true);
        return $qb;
    }
    
    public function getDefaultSeoQuery($useCache = false)
    {
        $query = $this->getDefaultSeoQueryBuilder()->getQuery();
        return $query->useResultCache($useCache, 7200, $this->generateDefaultCacheId());
    }
    
    public function getDefaultSeo($useCache = false)
    {
        return $this->getDefaultSeoQuery($useCache)->getOneOrNullResult();
    }
    
    
    public function generateDefaultCacheId()
    {
        return md5('Default' . $this->getClassName());
    }
}