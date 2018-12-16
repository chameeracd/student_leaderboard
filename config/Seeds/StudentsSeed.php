<?php
use Migrations\AbstractSeed;

/**
 * Students seed.
 */
class StudentsSeed extends AbstractSeed
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
                'first_name' => 'Lixue',
                'last_name' => 'Yu',
                'hide_in_leaderboard' => '0',
                'created' => '2018-12-16 04:56:51',
                'modified' => '2018-12-16 04:56:51',
            ],
            [
                'id' => '2',
                'first_name' => 'Taras',
                'last_name' => 'Bulgakov',
                'hide_in_leaderboard' => '1',
                'created' => '2018-12-16 04:57:07',
                'modified' => '2018-12-16 04:57:07',
            ],
            [
                'id' => '3',
                'first_name' => 'Shun',
                'last_name' => 'Yoshihara',
                'hide_in_leaderboard' => '1',
                'created' => '2018-12-16 04:57:34',
                'modified' => '2018-12-16 04:57:34',
            ],
            [
                'id' => '4',
                'first_name' => 'Chen',
                'last_name' => 'Fang',
                'hide_in_leaderboard' => '0',
                'created' => '2018-12-16 04:57:55',
                'modified' => '2018-12-16 04:57:55',
            ],
            [
                'id' => '5',
                'first_name' => 'Priyanka',
                'last_name' => 'Chopra',
                'hide_in_leaderboard' => '0',
                'created' => '2018-12-16 04:58:07',
                'modified' => '2018-12-16 04:58:07',
            ],
            [
                'id' => '6',
                'first_name' => 'Vishal',
                'last_name' => 'Singh',
                'hide_in_leaderboard' => '0',
                'created' => '2018-12-16 04:58:18',
                'modified' => '2018-12-16 04:58:28',
            ],
            [
                'id' => '7',
                'first_name' => 'Felix',
                'last_name' => 'Kaiser',
                'hide_in_leaderboard' => '1',
                'created' => '2018-12-16 04:58:57',
                'modified' => '2018-12-16 04:58:57',
            ],
            [
                'id' => '8',
                'first_name' => 'Martok',
                'last_name' => 'Klasq',
                'hide_in_leaderboard' => '0',
                'created' => '2018-12-16 04:59:12',
                'modified' => '2018-12-16 04:59:12',
            ],
        ];

        $table = $this->table('students');
        $table->insert($data)->save();
    }
}
