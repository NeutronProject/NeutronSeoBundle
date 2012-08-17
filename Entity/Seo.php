<?php
/*
 * This file is part of NeutronSeoBundle
 *
 * (c) Zender <azazen09@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Neutron\SeoBundle\Entity;

use Neutron\SeoBundle\Model\SeoInterface;

use Gedmo\Mapping\Annotation as Gedmo;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Gedmo\TranslationEntity(class="Neutron\SeoBundle\Entity\Translation\SeoTranslation")
 * @ORM\Table(name="neutron_seo")
 * @ORM\Entity(repositoryClass="Neutron\SeoBundle\Entity\Repository\SeoRepository")
 * 
 */
class Seo implements SeoInterface 
{
    /**
     * @var integer 
     *
     * @ORM\Id @ORM\Column(name="id", type="integer")
     * 
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string 
     *
     * @Gedmo\Translatable
     * @ORM\Column(type="string", name="meta_title", length=255, nullable=true, unique=false)
     */
    protected $metaTitle;
    
    /**
     * @var string 
     *
     * @Gedmo\Translatable
     * @ORM\Column(type="string", name="meta_keywords", length=255, nullable=true, unique=false)
     */
    protected $metaKeywords;
    
    /**
     * @var string 
     * 
     * @Gedmo\Translatable
     * @ORM\Column(type="text", name="meta_description", nullable=true)
     */
    protected $metaDescription;
    
    /**
     * @var boolean 
     *
     * @ORM\Column(type="boolean", name="is_default")
     */
    protected $isDefault = false;
    
    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;
    
    public function setMetaTitle($title)
    {
        $this->metaTitle = (string) $title;
        return $this;
    }
    
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }
    
    public function setMetaKeywords($keywords)
    {
        $this->metaKeywords = (string) $keywords;
        return $this;
    }
    
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }
    
    public function setMetaDescription($description)
    {
        $this->metaDescription = (string) $description;
        return $this;
    }
    
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }
    
    public function setIsDefault($bool)
    {
        $this->isDefault = (bool) $bool;
        return $this;
    }
    
    public function isDefault()
    {
        return $this->isDefault;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}