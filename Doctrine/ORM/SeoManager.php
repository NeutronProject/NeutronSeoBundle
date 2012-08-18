<?php
namespace Neutron\SeoBundle\Doctrine\ORM;

use Neutron\SeoBundle\Model\SeoInterface;

use Doctrine\ORM\EntityManager;

use Neutron\SeoBundle\Model\SeoManagerInterface;

class SeoManager implements SeoManagerInterface 
{
    const SEO = 'Neutron\\SeoBundle\\Entity\\Seo';
    
    protected $em;
    
    protected $repository;
    
    protected $cache;
    
    protected $useFallback;
    
    public function __construct(EntityManager $em, $useFallback)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(self::SEO);   
        $this->cache = $em->getConfiguration()->getResultCacheImpl();  
        $this->useFallback = (bool) $useFallback;
    }
    
    public function getDefaultSeo($useCache = false)
    {
        $default =  $this->repository->getDefaultSeo($useCache);
        
        if (!$default){
            $class = self::SEO;
            $default = new $class;
            $default->setIsDefault(true); 
        }
        
        return $default;
    }
    
    public function createSeo()
    {
        $class = self::SEO;
        $entity = new $class;
        $default = $this->repository->getDefaultSeo();
        if ($default && $this->useFallback){
            $entity->setMetaTitle($default->getMetaTitle());
            $entity->setMetaKeywords($default->getMetaKeywords());
            $entity->setMetaDescription($default->getMetaDescription());
        }
        
        return $entity;    
    }
    
    public function updateDefaultSeo(SeoInterface $entity)
    {
        $this->cache->delete($this->repository->generateDefaultCacheId());
        $this->em->persist($entity);
        $this->em->flush();
    }
    
}