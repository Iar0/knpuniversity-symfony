<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 10/04/17
 * Time: 07:33
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(__DIR__ . '/fixtures.yml', $manager);
    }
}