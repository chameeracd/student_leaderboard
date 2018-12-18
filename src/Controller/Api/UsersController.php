<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use Rest\Controller\RestController;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Api Controller
 *
 */
class UsersController extends RestController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    public function login()
    {
        $this->set([
            'success' => false,
            'data' => [
                'error' => 'Request token from above form',
                '_serialize' => ['success', 'data']
            ]
        ]);
    }

    public function token()
    {
        $data = [];
        $user = $this->Auth->identify();
        if ($user) {
            $data = [
                'success' => true,
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 604800
                ],
                    Security::salt())
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'Invalid Credentials'
            ];
        }



        $this->set(compact('data'));
    }
}
