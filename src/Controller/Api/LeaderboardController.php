<?php

namespace App\Controller\Api;

use Rest\Controller\RestController;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Leaderboard Api Controller
 *
 */
class LeaderboardController extends RestController
{

    /**
     * return top scored students
     *
     * @query string $mock return mock data if 'true'
     * @query int $page_size items per page
     * @query int $page_number page no
     * @query string|array $include only with specified assessment ids
     * @query string|array $exclude only without specified assessment ids
     *
     * @return Response|void
     */
    public function index()
    {
        $mock = ($this->request->getQuery('mock')) ? $this->request->getQuery('mock') : 'false';
        $page_size = ($this->request->getQuery('page_size')) ? $this->request->getQuery('page_size') : 100;
        $page_number = ($this->request->getQuery('page_number')) ? $this->request->getQuery('page_number') : 1;
        $include = ($this->request->getQuery('include')) ? $this->request->getQuery('include') : null;
        $exclude = ($this->request->getQuery('exclude')) ? $this->request->getQuery('exclude') : null;

        $data = [];

        if ($mock == 'true') {
            $data = [
                ['name' => 'name 1', 'total' => 22.2],
                ['name' => 'name 2', 'total' => 18.1],
                ['name' => 'name 3', 'total' => 15.1],
                ['name' => 'name 4', 'total' => 3.9],
            ];
        } else {
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

            $include = (is_array($include)) ? implode(',', $include) : $include;
            if ($include) {
                $query->join([
                    'a' => [
                        'table' => 'assessments',
                        'type' => 'INNER',
                        'conditions' => 'a.id = Results.assessment_id AND a.id IN ('. $include . ')',
                    ]
                ]);
            }

            $exclude = (is_array($exclude)) ? implode(',', $exclude) : $exclude;
            if ($exclude) {
                $query->join([
                    'a' => [
                        'table' => 'assessments',
                        'type' => 'INNER',
                        'conditions' => 'a.id = Results.assessment_id AND a.id NOT IN (' . $exclude . ')',
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
        }

        $this->set(compact('data'));
    }
}
