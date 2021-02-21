<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    public function setUp() {
        $this->client = static::createClient();
        $userRepository = static::$container->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('test@iboss.nl');

        // simulate $testUser being logged in
        $this->client->loginUser($testUser);
    }

    public function testHome()
    {
        $this->client->request('GET', '/');
        $statusCode = $this->client->getResponse()->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }
}
