<?php
namespace Neutron\SeoBundle\Model;

interface SeoManagerInterface
{
    public function createDefaultSeo();
    
    public function createSeo();
    
    public function getDefaultSeo($useCache = false);
    
}