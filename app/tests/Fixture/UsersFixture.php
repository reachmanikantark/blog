<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'username' => 'manikanta',
                'email' => 'reachmanikantark@gmail.com',
                'password' => '123456789',
                'created' => '2024-03-16 07:57:09',
                'modified' => '2024-03-16 07:57:09',
            ],
        ];
        parent::init();
    }
}
