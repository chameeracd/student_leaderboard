<?php

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Rest\Controller\RestController;

/**
 * Api Controller
 *
 */
class ApiController extends RestController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow();
    }
    /**
     * return top 10 scored students
     *
     * @param bool $mock return mock data if true
     * @param int $page_size items per page
     * @param int $page_number page no
     * @param string $include only with specified assessment ids (is set/comma separated)
     * @param string $exclude only without specified assessment ids (is set/comma separated)
     *
     * @return Response|void
     */
    public function leaderboard($mock = false, $page_size = 100, $page_number = 1, $include = null, $exclude = null)
    {
        $data = [];

        if (!$mock) {
            $results = TableRegistry::get('Results');
            $query = $results->find();
            $query->join([
                's' => [
                    'table' => 'students',
                    'type' => 'LEFT',
                    'conditions' => 's.id = Results.student_id AND s.hide_in_leaderboard = 0',
                ]
            ]);

            $full_name = $query->func()->concat([
                's.first_name' => 'identifier',
                ' ',
                's.last_name' => 'identifier'
            ]);

            $query->select([
                'name' => $full_name,
                'total' => $query->func()->sum('score'),
            ])->group(['student_id']);

            if ($include) {
                $query->join([
                    'a' => [
                        'table' => 'assessments',
                        'type' => 'INNER',
                        'conditions' => 'a.id = Results.assessment_id AND a.name IN ('. $include . ')',
                    ]
                ]);
            }

            if ($exclude) {
                $query->join([
                    'a' => [
                        'table' => 'assessments',
                        'type' => 'INNER',
                        'conditions' => 'a.id = Results.assessment_id AND a.name NOT IN (' . $exclude . ')',
                    ]
                ]);
            }

            if($page_size) {
                $query->limit($page_size);
            }

            if($page_number) {
                $query->page($page_number);
            }


            $query->orderDesc('total');

            $data = $query->toArray();
        } else {
            $data = [
                ['name' => 'name 1', 'total' => 22.2],
                ['name' => 'name 2', 'total' => 18.1],
                ['name' => 'name 3', 'total' => 15.1],
                ['name' => 'name 4', 'total' => 3.9],
            ];
        }

        $this->set(compact('data'));
    }
}
