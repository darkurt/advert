<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApplicationRepository")
 */
class Application
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $appli_id;



    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;



    /**
   * @ORM\ManyToOne(targetEntity="Advert", inversedBy="advert_application")
   * @ORM\JoinColumn(nullable=false, name="advert_application", referencedColumnName="advert_id")
   */

    private $application_advert;

    /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="user_application")
   * @ORM\JoinColumn(nullable=false, name="user_application", referencedColumnName="user_id")
   */

    private $application_user;





    /**
     * Set content
     *
     * @param string $content
     *
     * @return Application
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
     * Get appliId
     *
     * @return integer
     */
    public function getAppliId()
    {
        return $this->appli_id;
    }

    /**
     * Set applicationAdvert
     *
     * @param \AppBundle\Entity\Advert $applicationAdvert
     *
     * @return Application
     */
    public function setApplicationAdvert(\AppBundle\Entity\Advert $applicationAdvert)
    {
        $this->application_advert = $applicationAdvert;

        return $this;
    }

    /**
     * Get applicationAdvert
     *
     * @return \AppBundle\Entity\Advert
     */
    public function getApplicationAdvert()
    {
        return $this->application_advert;
    }

    /**
     * Set applicationUser
     *
     * @param \AppBundle\Entity\User $applicationUser
     *
     * @return Application
     */
    public function setApplicationUser(\AppBundle\Entity\User $applicationUser)
    {
        $this->application_user = $applicationUser;

        return $this;
    }

    /**
     * Get applicationUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getApplicationUser()
    {
        return $this->application_user;
    }
}
