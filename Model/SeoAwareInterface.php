<?php
namespace Neutron\SeoBundle\Model;

interface SeoAwareInterface
{
    public function setSeo(SeoInterface $seo);
    
    public function getSeo();
}