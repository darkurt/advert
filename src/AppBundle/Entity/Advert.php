<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="AppBundle\Repository")
 */
class Advert
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $advert_id;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text")
     */
    private $content;


    /**
    *@var boolean
    * @ORM\Column(name="published", type="boolean")
    */

    private $published = true;


    // Relation one to many entre app et advert.

    /**
   * @ORM\OneToMany(targetEntity="Application", mappedBy="application_advert")
   */
    private $advert_application;



    // relation entre correspond et advert

    /**
    * @ORM\OneToMany(targetEntity="Correspond", mappedBy="correspond_advert")
    */
    private $advert_correspond;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_advert")
     * @ORM\JoinColumn(name="user_advert", referencedColumnName="user_id")
     */
    private $advert_user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->advert_application = new \Doctrine\Common\Collections\ArrayCollection();
        $this->advert_correspond = new \Doctrine\Common\Collections\ArrayCollection();
    }

    //Début des getters et setters.





    /**
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Advert
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }




    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return Advert
     */
    public function getPublished()
    {
        return $this->published;
    }


    /**
     * Get advertId
     *
     * @return integer
     */
    public function getAdvertId()
    {
        return $this->advert_id;
    }

    /**
     * Add advertApplication
     *
     * @param \AppBundle\Entity\Application $advertApplication
     *
     * @return Advert
     */
    public function addAdvertApplication(\AppBundle\Entity\Application $advertApplication)
    {
        $this->advert_application[] = $advertApplication;

        return $this;
    }

    /**
     * Remove advertApplication
     *
     * @param \AppBundle\Entity\Application $advertApplication
     */
    public function removeAdvertApplication(\AppBundle\Entity\Application $advertApplication)
    {
        $this->advert_application->removeElement($advertApplication);
    }

    /**
     * Get advertApplication
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertApplication()
    {
        return $this->advert_application;
    }

    /**
     * Add advertCorrespond
     *
     * @param \AppBundle\Entity\Correspond $advertCorrespond
     *
     * @return Advert
     */
    public function addAdvertCorrespond(\AppBundle\Entity\Correspond $advertCorrespond)
    {
        $this->advert_correspond[] = $advertCorrespond;

        return $this;
    }

    /**
     * Remove advertCorrespond
     *
     * @param \AppBundle\Entity\Correspond $advertCorrespond
     */
    public function removeAdvertCorrespond(\AppBundle\Entity\Correspond $advertCorrespond)
    {
        $this->advert_correspond->removeElement($advertCorrespond);
    }

    /**
     * Get advertCorrespond
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertCorrespond()
    {
        return $this->advert_correspond;
    }

    /**
     * Set userAdvert
     *
     * @param \AppBundle\Entity\User $userAdvert
     *
     * @return Advert
     */
    public function setUserAdvert(\AppBundle\Entity\User $userAdvert = null)
    {
        $this->user_advert = $userAdvert;

        return $this;
    }

    /**
     * Get userAdvert
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserAdvert()
    {
        return $this->user_advert;
    }

    /**
     * Set advertUser
     *
     * @param \AppBundle\Entity\User $advertUser
     *
     * @return Advert
     */
    public function setAdvertUser(\AppBundle\Entity\User $advertUser = null)
    {
        $this->advert_user = $advertUser;

        return $this;
    }

    /**
     * Get advertUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getAdvertUser()
    {
        return $this->advert_user;
    }
}
