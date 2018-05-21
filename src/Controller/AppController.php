<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'userModel' => 'Usuarios'
                ]
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'InstituicoesOrganizadoras',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => true,
            'storage' => 'Session'
        ]);

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display', 'login']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if ( isset($user['ativo']) && $user['ativo'] === 1) {
            switch($user['role']){
                case 'admin':
                    $this->findIOGEbyUserID($user);
                    $this->findIIByUserID($user, 0);
                    break;
                case 'coord_ioge':
                    $this->findIOGEbyUserID($user);
                    break;
                case 'coord_ii':
                    $this->findIIByUserID($user, 1);
                    break;
                case 'consultor':
                    $this->findIIByUserID($user, 0);
                    break;

            }
            return true;
        }

        // Default deny
        return false;
    }

    protected function findIOGEbyUserID($user){
        $ioge = TableRegistry::get('CoordenadoresIoges')->find()->where(['usuario_id' => $user['id'] ]);
        $ioge = $ioge->first();
        $this->request->session()->write('InstituicoesOrganizadoras.id',
            isset($ioge['instituicao_organizadora_id']) ? $ioge['instituicao_organizadora_id'] : 0 );
    }

    protected function findIIByUserID($user, $is_coordenador){
        $ii = TableRegistry::get('Consultores')->find()->where(['usuario_id' => $user['id'],
            'is_coordenador' => $is_coordenador ]);
        $ii = $ii->first();
        $this->request->session()->write('InstituicoesImplementadoras.id',
            isset($ii['instituicao_implementadora_id']) ? $ii['instituicao_implementadora_id'] : 0 );
    }
}
