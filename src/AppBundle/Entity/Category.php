<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $cat_id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;




    /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Correspond", mappedBy="correspond_category")
    */
    private $category_correspond;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category_correspond = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get catId
     *
     * @return integer
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * Add categoryCorrespond
     *
     * @param \AppBundle\Entity\Correspond $categoryCorrespond
     *
     * @return Category
     */
    public function addCategoryCorrespond(\AppBundle\Entity\Correspond $categoryCorrespond)
    {
        $this->category_correspond[] = $categoryCorrespond;

        return $this;
    }

    /**
     * Remove categoryCorrespond
     *
     * @param \AppBundle\Entity\Correspond $categoryCorrespond
     */
    public function removeCategoryCorrespond(\AppBundle\Entity\Correspond $categoryCorrespond)
    {
        $this->category_correspond->removeElement($categoryCorrespond);
    }

    /**
     * Get categoryCorrespond
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryCorrespond()
    {
        return $this->category_correspond;
    }
}
