<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PostsController;
use Cake\Http\Session;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;
use Authentication\Identity;

/**
 * App\Controller\PostsController Test Case
 *
 * @uses \App\Controller\PostsController
 */
class PostsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Posts',
        'app.Users',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->enableCsrfToken();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\PostsController::index()
     */
    public function testIndex(): void
    {
        // $this->markTestIncomplete('Not implemented yet.');

        $this->get('/posts');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\PostsController::view()
     */
    public function testView(): void
    {
        // $this->markTestIncomplete('Not implemented yet.');
        $postId = '1';
        $this->get('/posts/view/' . $postId);
        $this->assertResponseOk();
        $this->assertTemplate('view');

    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\PostsController::add()
     */

    public function testAdd(): void
    {
        // $this->markTestIncomplete('Not implemented yet.');
        $user = TableRegistry::getTableLocator()
            ->get('Users')->find()->where(['id=' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->session(['Auth.User.id' => 1]);

        $filePath = WWW_ROOT . 'img\uploads\R8P-00027.png';
        $file = fopen($filePath, 'r');

        $data = [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
            'user_id' => '1',
            'imgpath' => new \Laminas\Diactoros\UploadedFile(
                $file,
                filesize($filePath),
                UPLOAD_ERR_OK,
                'testimage.png',
                'image/png',
            )
        ];
        $this->configRequest([
            'headers' => [
                'Content-Type' => 'multipart/form-data'
            ]
        ]);
        //debug($data);
        $this->post('/posts/add', $data);
        $this->assertResponseSuccess('Post Added');
        $this->assertResponseCode(302);
        //$locationHeader = $this->_response->getHeaderLine('Location');
        //debug($this->_response);
        //debug($locationHeader);
        //$this->assertRedirect($locationHeader);
        $this->assertRedirect(['controller' => 'Posts', 'action' => 'list']);

    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\PostsController::edit()
     */
    public function testEdit(): void
    {

        //$this->markTestIncomplete('Not implemented yet.');
      
        $user = TableRegistry::getTableLocator()
            ->get('Users')->find()->where(['id=' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();


        $this->session(['Auth.User.id' => 1]);

        //$this->markTestIncomplete('Not implemented yet.');
        $postId = 1;
        $this->get('/posts/edit/' . $postId);
        $this->assertResponseOk();
        $filePath = WWW_ROOT . 'img\uploads\sample.png';
        $file = fopen($filePath, 'r');
       // debug($file);
        $postData = [
            'title' => 'Test Post Edit',
            'content' => 'This is a test post content for edit',
            'user_id' => '1',
            'imgpath' => new \Laminas\Diactoros\UploadedFile(
                $file,
                filesize($filePath),
                UPLOAD_ERR_OK,
                'testeditimage.png',
                'image/png',
            )
        ];
        $this->configRequest([
            'headers' => [
                'Content-Type' => 'multipart/form-data'
            ]
        ]);
      //  debug($postData);
        $this->post('/posts/edit/' . $postId, $postData);
       // debug($this->_response);
        $this->assertResponseCode(302);
        $this->assertRedirect(['controller' => 'Posts', 'action' => 'list']);
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\PostsController::delete()
     */
    public function testDelete(): void
    {
        $user = TableRegistry::getTableLocator()
            ->get('Users')->find()->where(['id=' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();


        $this->session(['Auth.User.id' => 1]);
        $postId = 1;
        $this->enableRetainFlashMessages();
        $this->post('/posts/delete/' . $postId);
        $this->assertResponseCode(302);
        $this->assertRedirect('/posts/list');
        //$this->markTestIncomplete('Not implemented yet.');
    }
}
