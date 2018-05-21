<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Acoes Controller
 *
 * @property \App\Model\Table\AcoesTable $Acoes
 */
class AcoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $acoes = $this->Acoes->find('all')
            ->contain(['Reunioes'])
            ->where(['Acoes.ativo' => 1 ])
            ->andWhere(['Reunioes.instituicao_implementadora_id' =>
                $this->request->session()->read('InstituicoesImplementadoras.id') ]);

        $acoes = $this->paginate($acoes);

        $this->set(compact('acoes'));
        $this->set('_serialize', ['acoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Acao id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acao = $this->Acoes->get($id, [
            'contain' => ['Reunioes']
        ]);

        $this->set('acao', $acao);
        $this->set('_serialize', ['acao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($reuniaoId = null)
    {
        if($reuniaoId == null){
            $this->Flash->error(__('Selecione uma reunião para cadastrar ações'));
            return $this->redirect(['controller' => 'Reunioes', 'action' => 'index']);
        }

        $reuniao = TableRegistry::get('Reunioes')->get($reuniaoId);

        if (count($reuniao) == 0) {
            return $this->redirect(['controller' => 'Reunioes', 'action' => 'index']);
        }

        $acao = $this->Acoes->newEntity();
        if ($this->request->is('post')) {
            $acao = $this->Acoes->patchEntity($acao, $this->request->data);
            $acao->reuniao_id = $reuniao->id;

            if ($this->Acoes->save($acao)) {
                $this->Flash->success(__('The acao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The acao could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('acao', 'reuniao'));
        $this->set('_serialize', ['acao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Acao id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $acao = $this->Acoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acao = $this->Acoes->patchEntity($acao, $this->request->data);
            if ($this->Acoes->save($acao)) {
                $this->Flash->success(__('The acao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The acao could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('acao'));
        $this->set('_serialize', ['acao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Acao id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acao = $this->Acoes->get($id);
        $acao->ativo = 0;
        if ($this->Acoes->save($acao)) {
            $this->Flash->success(__('The acao has been deleted.'));
        } else {
            $this->Flash->error(__('The acao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
