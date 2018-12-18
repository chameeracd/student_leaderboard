<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'username' => 'admin',
                'password' => '$2y$10$rIek3eEF5PzAGqD910P3k.GZ/Ytntn/FDO57V.2KKzN0Bve0fTNTu',
                'role' => 'admin',
                'created' => '2018-12-16 00:36:15',
                'modified' => '2018-12-16 02:54:24',
            ],
            [
                'id' => '2',
                'username' => 'api',
                'password' => '$2y$10$Hu61.5D8oW2OEuEY8WM3s.iA5yGxRXKtE3MlTzGWulViRt8iNl.pS',
                'role' => 'api',
                'created' => '2018-12-18 04:06:35',
                'modified' => '2018-12-18 04:06:35',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
