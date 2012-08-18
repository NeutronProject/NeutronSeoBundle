<?php
namespace Neutron\SeoBundle\Model;

interface SeoManagerInterface
{
    
    public function createSeo();
    
    public function getDefaultSeo($useCache = false);
    
    public function updateDefaultSeo(SeoInterface $entity);
    
}