<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Application;
use AppBundle\Entity\Correspond;
use AppBundle\Entity\Advert;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataLoader extends Fixture implements  FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;
    /** @var EntityManager */
    private $em;
    /** @var string */
    private $environment;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $kernel = $this->container->get('kernel');
        if ($kernel) $this->environment=$kernel->getEnvironment();
    }

    public function load(ObjectManager $manager)
    {
        $this->em = $manager;

        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);
        $stackLogger = new DebugStack();
        $echoLogger = new EchoSQLLogger();
        $this->em->getConnection()->getConfiguration()->setSQLLogger($stackLogger);


        // creation des users :


        $user = new User();
        $user->setUsername("user");
        $user->setPassword("12345");
        $this->em->persist($user);

        $admin = new User();
        $admin->setUsername("admin");
        $admin->setPassword("45678");
        $this->em->persist($admin);
        $this->em->flush();


        //Creation d'une advert

        $advert1 = new Advert();
        $advert1->setTitle("Looking php dev");
        $advert1->setContent("Who can help me finish my project");
        $advert1->setPublished(true);
        $advert1->setAdvertUser($user);
        $this->em->persist($advert1);
        $this->em->flush();

        //creation des categories

        $php = new Category();
        $php->setName("PHP");
        $this->em->persist($php);

        $cisco = new Category();
        $cisco->setName("Cisco");
        $this->em->persist($cisco);


        $java = new Category();
        $java->setName("Java");
        $this->em->persist($java);

        $sql = new Category();
        $sql->setName("SQL");
        $this->em->persist($sql);
        $this->em->flush();

        $corres1 = new Correspond();
        $corres1->setCorrespondCategory($php);
        $corres1->setCorrespondAdvert($advert1);
        $this->em->persist($corres1);
        $this->em->flush();


        $applica1 = new Application();
        $applica1->setApplicationUser($admin);
        $applica1->setApplicationAdvert($advert1);
        $applica1->setContent("I'm interested by this job");
        $this->em->persist($applica1);
        $this->em->flush();





    }
}
