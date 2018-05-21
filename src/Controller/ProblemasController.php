<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Problemas Controller
 *
 * @property \App\Model\Table\ProblemasTable $Problemas
 */
class ProblemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos.GruposEmpresas', 'Projetos.UnidadesOrganizacionais.Empresas']
        ];
        $problemas = $this->paginate($this->Problemas);

        $this->set(compact('problemas'));
        $this->set('_serialize', ['problemas']);
    }

    /**
     * View method
     *
     * @param string|null $id Problema id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $problema = $this->Problemas->get($id, [
            'contain' => ['Projetos']
        ]);

        $this->set('problema', $problema);
        $this->set('_serialize', ['problema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $problema = $this->Problemas->newEntity();
        if ($this->request->is('post')) {
            $problema = $this->Problemas->patchEntity($problema, $this->request->data);
            if ($this->Problemas->save($problema)) {
                $this->Flash->success(__('The problema has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problema could not be saved. Please, try again.'));
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
      
        $this->set(compact('problema', 'projetos'));
        $this->set('_serialize', ['problema']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Problema id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $problema = $this->Problemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problema = $this->Problemas->patchEntity($problema, $this->request->data);
            if ($this->Problemas->save($problema)) {
                $this->Flash->success(__('The problema has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problema could not be saved. Please, try again.'));
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
      
        $this->set(compact('problema', 'projetos'));
        $this->set('_serialize', ['problema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Problema id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $problema = $this->Problemas->get($id);
        $problema->ativo = 0;
        if ($this->Problemas->save($problema)) {
            $this->Flash->success(__('The problema has been deleted.'));
        } else {
            $this->Flash->error(__('The problema could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
