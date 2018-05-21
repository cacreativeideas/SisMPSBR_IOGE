<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Riscos Controller
 *
 * @property \App\Model\Table\RiscosTable $Riscos
 */
class RiscosController extends AppController
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
        $riscos = $this->paginate($this->Riscos);

        $this->set(compact('riscos'));
        $this->set('_serialize', ['riscos']);
    }

    /**
     * View method
     *
     * @param string|null $id Risco id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $risco = $this->Riscos->get($id, [
            'contain' => ['Projetos']
        ]);

        $this->set('risco', $risco);
        $this->set('_serialize', ['risco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $risco = $this->Riscos->newEntity();
        if ($this->request->is('post')) {
            $risco = $this->Riscos->patchEntity($risco, $this->request->data);
            if ($this->Riscos->save($risco)) {
                $this->Flash->success(__('The risco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The risco could not be saved. Please, try again.'));
            }
        }
      
        //$projetos = $this->Riscos->Projetos->find('list', ['limit' => 200]);
        $projetos = TableRegistry::get('Projetos')->find('list', [
          'keyField' => 'id',
          'valueField' => function ($e) {
              return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
          }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);
      
        $this->set(compact('risco', 'projetos'));
        $this->set('_serialize', ['risco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Risco id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $risco = $this->Riscos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $risco = $this->Riscos->patchEntity($risco, $this->request->data);
            if ($this->Riscos->save($risco)) {
                $this->Flash->success(__('The risco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The risco could not be saved. Please, try again.'));
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
      
        $this->set(compact('risco', 'projetos'));
        $this->set('_serialize', ['risco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Risco id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $risco = $this->Riscos->get($id);
        $risco->ativo = 0;

        if ($this->Riscos->save($risco)) {
            $this->Flash->success(__('The risco has been deleted.'));
        } else {
            $this->Flash->error(__('The risco could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
