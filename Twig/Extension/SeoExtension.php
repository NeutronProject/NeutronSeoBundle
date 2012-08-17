<?php
/*
 * This file is part of NeutronSeoBundle
 *
 * (c) Zender <azazen09@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Neutron\SeoBundle\Twig\Extension;

use Neutron\SeoBundle\Model\SeoManagerInterface;

use Neutron\SeoBundle\Model\SeoInterface;


/**
 * Twig extension
 *
 * @author Zender <azazen09@gmail.com>
 * @since 1.0
 */
class SeoExtension extends \Twig_Extension
{

    protected $seoManager;
    
    public function __construct(SeoManagerInterface $seoManager)
    {
        $this->seoManager = $seoManager;
    }

    public function getTitle(SeoInterface $seo = null)
    {
        $defaultSeo = $this->seoManager->getDefaultSeo(true);
        
        if ($seo){
            $title = $seo->getMetaTitle();
        } else if($defaultSeo instanceof SeoInterface) {
            $title = $defaultSeo->getMetaTitle();
        } else {
            $title = null;
        }
        
        return $title;
    }

    public function getKeywords(SeoInterface $seo = null)
    {
        $defaultSeo = $this->seoManager->getDefaultSeo(true);
        
        if ($seo){
            $keywords = $seo->getMetaKeywords();
        } else if($defaultSeo instanceof SeoInterface) {
            $keywords = $defaultSeo->getMetaKeywords();
        } else {
            $keywords = null;
        }
        
        return $keywords;
    }

    public function getDescription(SeoInterface $seo = null)
    {
        $defaultSeo = $this->seoManager->getDefaultSeo(true);
        
        if ($seo){
            $description = $seo->getMetaDescription();
        } else if($defaultSeo instanceof SeoInterface) {
            $description = $defaultSeo->getMetaDescription();
        } else {
            $description = null;
        }
        
        return $description;
    }

    /**
     * (non-PHPdoc)
     * @see Twig_Extension::getFunctions()
     */
    public function getFunctions()
    {
        return array(
            'neutron_seo_title' =>
                new \Twig_Function_Method($this, 'getTitle'),
                
            'neutron_seo_keywords' =>
                new \Twig_Function_Method($this, 'getKeywords'),
                
            'neutron_seo_description' =>
                new \Twig_Function_Method($this, 'getDescription'),
        );
    }

    /**
     * (non-PHPdoc)
     * @see Twig_ExtensionInterface::getName()
     */
    public function getName()
    {
        return 'neutron_seo_extension';
    }

}
