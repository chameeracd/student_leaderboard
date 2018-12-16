<?php
use Migrations\AbstractSeed;

/**
 * Results seed.
 */
class ResultsSeed extends AbstractSeed
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
                'student_id' => '1',
                'assessment_id' => '7',
                'score' => '5.50',
                'created' => '2018-12-16 05:03:23',
                'modified' => '2018-12-16 05:03:23',
            ],
            [
                'id' => '2',
                'student_id' => '1',
                'assessment_id' => '8',
                'score' => '12.10',
                'created' => '2018-12-16 05:03:49',
                'modified' => '2018-12-16 05:03:49',
            ],
            [
                'id' => '3',
                'student_id' => '1',
                'assessment_id' => '4',
                'score' => '9.80',
                'created' => '2018-12-16 05:04:04',
                'modified' => '2018-12-16 05:04:04',
            ],
            [
                'id' => '4',
                'student_id' => '1',
                'assessment_id' => '2',
                'score' => '6.20',
                'created' => '2018-12-16 05:04:16',
                'modified' => '2018-12-16 05:04:16',
            ],
            [
                'id' => '5',
                'student_id' => '1',
                'assessment_id' => '4',
                'score' => '4.20',
                'created' => '2018-12-16 05:04:29',
                'modified' => '2018-12-16 05:04:29',
            ],
            [
                'id' => '6',
                'student_id' => '1',
                'assessment_id' => '9',
                'score' => '10.90',
                'created' => '2018-12-16 05:04:44',
                'modified' => '2018-12-16 05:04:44',
            ],
            [
                'id' => '7',
                'student_id' => '2',
                'assessment_id' => '3',
                'score' => '12.50',
                'created' => '2018-12-16 05:04:55',
                'modified' => '2018-12-16 05:04:55',
            ],
            [
                'id' => '8',
                'student_id' => '2',
                'assessment_id' => '6',
                'score' => '15.80',
                'created' => '2018-12-16 05:05:07',
                'modified' => '2018-12-16 05:05:07',
            ],
            [
                'id' => '9',
                'student_id' => '3',
                'assessment_id' => '5',
                'score' => '5.50',
                'created' => '2018-12-16 05:05:23',
                'modified' => '2018-12-16 05:05:23',
            ],
            [
                'id' => '10',
                'student_id' => '3',
                'assessment_id' => '4',
                'score' => '7.80',
                'created' => '2018-12-16 05:05:35',
                'modified' => '2018-12-16 05:05:35',
            ],
            [
                'id' => '11',
                'student_id' => '4',
                'assessment_id' => '1',
                'score' => '28.30',
                'created' => '2018-12-16 05:07:24',
                'modified' => '2018-12-16 05:07:24',
            ],
            [
                'id' => '12',
                'student_id' => '5',
                'assessment_id' => '10',
                'score' => '17.40',
                'created' => '2018-12-16 05:07:34',
                'modified' => '2018-12-16 05:07:34',
            ],
            [
                'id' => '13',
                'student_id' => '5',
                'assessment_id' => '5',
                'score' => '10.90',
                'created' => '2018-12-16 05:07:45',
                'modified' => '2018-12-16 05:07:45',
            ],
            [
                'id' => '14',
                'student_id' => '6',
                'assessment_id' => '4',
                'score' => '10.50',
                'created' => '2018-12-16 05:07:57',
                'modified' => '2018-12-16 05:07:57',
            ],
            [
                'id' => '15',
                'student_id' => '6',
                'assessment_id' => '7',
                'score' => '5.20',
                'created' => '2018-12-16 05:08:13',
                'modified' => '2018-12-16 05:08:13',
            ],
        ];

        $table = $this->table('results');
        $table->insert($data)->save();
    }
}
