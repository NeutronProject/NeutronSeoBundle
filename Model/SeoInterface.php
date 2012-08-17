<?php
namespace Neutron\SeoBundle\Model;

interface SeoInterface
{
    public function setMetaTitle($title);
    
    public function getMetaTitle();
    
    public function setMetaKeywords($keywords);
    
    public function getMetaKeywords();
    
    public function setMetaDescription($description);
    
    public function getMetaDescription();
    
    public function setIsDefault($bool);
    
    public function isDefault();
}