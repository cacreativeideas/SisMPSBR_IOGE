<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * LicoesAprendidas Controller
 *
 * @property \App\Model\Table\LicoesAprendidasTable $LicoesAprendidas
 */
class LicoesAprendidasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos']
        ];
        $licoesAprendidas = $this->paginate($this->LicoesAprendidas);

        $this->set(compact('licoesAprendidas'));
        $this->set('_serialize', ['licoesAprendidas']);
    }

    /**
     * View method
     *
     * @param string|null $id Licoes Aprendida id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $licoesAprendida = $this->LicoesAprendidas->get($id, [
            'contain' => ['Projetos']
        ]);

        $this->set('licoesAprendida', $licoesAprendida);
        $this->set('_serialize', ['licoesAprendida']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $licoesAprendida = $this->LicoesAprendidas->newEntity();
        if ($this->request->is('post')) {
            $licoesAprendida = $this->LicoesAprendidas->patchEntity($licoesAprendida, $this->request->data);
            if ($this->LicoesAprendidas->save($licoesAprendida)) {
                $this->Flash->success(__('The licoes aprendida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The licoes aprendida could not be saved. Please, try again.'));
            }
        }
        
        $projetos = TableRegistry::get('Projetos')->find('list', [
          'keyField' => 'id',
          'valueField' => function ($e) {
              return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
          }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);
      
        $this->set(compact('licoesAprendida', 'projetos'));
        $this->set('_serialize', ['licoesAprendida']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Licoes Aprendida id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $licoesAprendida = $this->LicoesAprendidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $licoesAprendida = $this->LicoesAprendidas->patchEntity($licoesAprendida, $this->request->data);
            if ($this->LicoesAprendidas->save($licoesAprendida)) {
                $this->Flash->success(__('The licoes aprendida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The licoes aprendida could not be saved. Please, try again.'));
            }
        }
      
        $projetos = TableRegistry::get('Projetos')->find('list', [
          'keyField' => 'id',
          'valueField' => function ($e) {
              return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
          }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);
      
        $this->set(compact('licoesAprendida', 'projetos'));
        $this->set('_serialize', ['licoesAprendida']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Licoes Aprendida id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $licoesAprendida = $this->LicoesAprendidas->get($id);
        if ($this->LicoesAprendidas->delete($licoesAprendida)) {
            $this->Flash->success(__('The licoes aprendida has been deleted.'));
        } else {
            $this->Flash->error(__('The licoes aprendida could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
