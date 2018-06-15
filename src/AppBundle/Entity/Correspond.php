<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="correspond")
 * @ORM\HasLifecycleCallbacks()
 */
class Correspond
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $correspond_id;


  /**
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="category_correspond")
   * @ORM\JoinColumn(name="category_correspond", referencedColumnName="cat_id")
   */
  private $correspond_category;

  /**
   * @ORM\ManyToOne(targetEntity="Advert", inversedBy="advert_correspond")
   * @ORM\JoinColumn(name="advert_correspond", referencedColumnName="advert_id")
   */
  private $correspond_advert;





    /**
     * Get correspondId
     *
     * @return integer
     */
    public function getCorrespondId()
    {
        return $this->correspond_id;
    }

    /**
     * Set correspondCategory
     *
     * @param \AppBundle\Entity\Category $correspondCategory
     *
     * @return Correspond
     */
    public function setCorrespondCategory(\AppBundle\Entity\Category $correspondCategory = null)
    {
        $this->correspond_category = $correspondCategory;

        return $this;
    }

    /**
     * Get correspondCategory
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCorrespondCategory()
    {
        return $this->correspond_category;
    }

    /**
     * Set correspondAdvert
     *
     * @param \AppBundle\Entity\Advert $correspondAdvert
     *
     * @return Correspond
     */
    public function setCorrespondAdvert(\AppBundle\Entity\Advert $correspondAdvert = null)
    {
        $this->correspond_advert = $correspondAdvert;

        return $this;
    }

    /**
     * Get correspondAdvert
     *
     * @return \AppBundle\Entity\Advert
     */
    public function getCorrespondAdvert()
    {
        return $this->correspond_advert;
    }
}
