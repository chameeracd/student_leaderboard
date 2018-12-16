<?php
use Migrations\AbstractSeed;

/**
 * Assessments seed.
 */
class AssessmentsSeed extends AbstractSeed
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
                'name' => '26',
                'created' => '2018-12-16 05:00:53',
                'modified' => '2018-12-16 05:00:53',
            ],
            [
                'id' => '2',
                'name' => '32',
                'created' => '2018-12-16 05:00:59',
                'modified' => '2018-12-16 05:00:59',
            ],
            [
                'id' => '3',
                'name' => '45',
                'created' => '2018-12-16 05:01:12',
                'modified' => '2018-12-16 05:01:12',
            ],
            [
                'id' => '4',
                'name' => '58',
                'created' => '2018-12-16 05:01:21',
                'modified' => '2018-12-16 05:01:21',
            ],
            [
                'id' => '5',
                'name' => '84',
                'created' => '2018-12-16 05:01:31',
                'modified' => '2018-12-16 05:01:31',
            ],
            [
                'id' => '6',
                'name' => '253',
                'created' => '2018-12-16 05:01:38',
                'modified' => '2018-12-16 05:01:38',
            ],
            [
                'id' => '7',
                'name' => '357',
                'created' => '2018-12-16 05:01:45',
                'modified' => '2018-12-16 05:01:45',
            ],
            [
                'id' => '8',
                'name' => '746',
                'created' => '2018-12-16 05:01:52',
                'modified' => '2018-12-16 05:01:52',
            ],
            [
                'id' => '9',
                'name' => '857',
                'created' => '2018-12-16 05:02:02',
                'modified' => '2018-12-16 05:02:02',
            ],
            [
                'id' => '10',
                'name' => '955',
                'created' => '2018-12-16 05:02:09',
                'modified' => '2018-12-16 05:02:09',
            ],
        ];

        $table = $this->table('assessments');
        $table->insert($data)->save();
    }
}
