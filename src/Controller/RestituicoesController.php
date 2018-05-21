<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Restituicoes Controller
 *
 * @property \App\Model\Table\RestituicoesTable $Restituicoes
 */
class RestituicoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pagamentos', 'UnidadesOrganizacionais']
        ];
        $restituicoes = $this->paginate($this->Restituicoes);

        $this->set(compact('restituicoes'));
        $this->set('_serialize', ['restituicoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Restituicao id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restituicao = $this->Restituicoes->get($id, [
            'contain' => ['Pagamentos', 'UnidadesOrganizacionais']
        ]);

        $this->set('restituicao', $restituicao);
        $this->set('_serialize', ['restituicao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restituicao = $this->Restituicoes->newEntity();
        if ($this->request->is('post')) {
            $restituicao = $this->Restituicoes->patchEntity($restituicao, $this->request->data);
            if ($this->Restituicoes->save($restituicao)) {
                $this->Flash->success(__('The restituicao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restituicao could not be saved. Please, try again.'));
            }
        }

        $projetos = TableRegistry::get('Projetos')->find('list', [
            'keyField' => 'UnidadesOrganizacionais.id',
            'valueField' => function ($e) {
                return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
            }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);

        $pagamentos = [];

        //$unidadesOrganizacionais = $this->Restituicoes->UnidadesOrganizacionais->find('list', ['limit' => 200]);

        $this->set(compact('restituicao', 'pagamentos', 'projetos', 'unidadesOrganizacionais'));
        $this->set('_serialize', ['restituicao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Restituicao id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $restituicao = $this->Restituicoes->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $restituicao = $this->Restituicoes->patchEntity($restituicao, $this->request->data);
            if ($this->Restituicoes->save($restituicao)) {
                $this->Flash->success(__('The restituicao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restituicao could not be saved. Please, try again.'));
            }
        }

        $projetos = TableRegistry::get('Projetos')->find('list', [
            'keyField' => 'UnidadesOrganizacionais.id',
            'valueField' => function ($e) {
                return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
            }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);

        $pagamentos = [];

        //$unidadesOrganizacionais = $this->Restituicoes->UnidadesOrganizacionais->find('list', ['limit' => 200]);

        $this->set(compact('restituicao', 'pagamentos', 'projetos', 'unidadesOrganizacionais'));
        $this->set('_serialize', ['restituicao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Restituicao id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $restituicao = $this->Restituicoes->get($id);
        $restituicao->ativo = 0;
        if ($this->Restituicoes->save($restituicao)) {
            $this->Flash->success(__('The restituicao has been deleted.'));
        } else {
            $this->Flash->error(__('The restituicao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
