<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Authentication\PasswordHasher\DefaultPasswordHasher; 


/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Users',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\UsersController::index()
     */
   /* public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\UsersController::view()
     */
    /*public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
*/
    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsersController::add()
     */
   /* public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
*/
    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\UsersController::edit()
     */
   /* public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
*/
    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsersController::delete()
     */
   /* public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    public function testLogin()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $data = [
            'email' => "reachmanikantark@gmail.com",
            'password' =>  "123456789"
        ];
       // debug($data);
        $this->post('users/login', $data); // Simulate POST request to login action
      //  debug($this->_response);
        $this->assertResponseSuccess(); // Assert that the request was successful
        $this->assertResponseCode(302);
        // Optionally, assert that the user is redirected to a specific page upon successful login
        $this->assertRedirect(['controller' => 'Posts', 'action' => 'list']);

        // Optionally, assert that the user is logged in
        $this->assertSession($data['email'], 'Auth.User.email');
    }

    /*public function testLoginWithInvalidCredentials()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $data = [
            'User.email' => 'test@test.com',
            'User.password' => '123456'
        ];
        
        // Assuming your login action is in UsersController
        $this->post('/users/login', $data);
        debug($this->_response);
        // Assert that the response was a redirect (login failed)
       // $this->assertResponseFailure();
        $this->assertResponseCode(200);
        // Assert that the user is not logged in
        $this->assertSession(null, 'User.id');
        // Adjust 'User.id' according to your session key for the logged-in user's ID.
    }*/
}
