<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsFixture
 */
class PostsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
                //'imgpath' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-03-16 08:26:07',
                'modified' => '2024-03-16 08:26:07',
            ],
        ];
        parent::init();
    }
}
