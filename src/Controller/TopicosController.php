<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Topicos Controller
 *
 * @property \App\Model\Table\TopicosTable $Topicos
 */
class TopicosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $topicos = $this->paginate($this->Topicos);

        $this->set(compact('topicos'));
        $this->set('_serialize', ['topicos']);
    }

    /**
     * View method
     *
     * @param string|null $id Topico id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topico = $this->Topicos->get($id, [
            'contain' => ['LicoesAprendidas']
        ]);

        $this->set('topico', $topico);
        $this->set('_serialize', ['topico']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $topico = $this->Topicos->newEntity();
        if ($this->request->is('post')) {
            $topico = $this->Topicos->patchEntity($topico, $this->request->data);
            if ($this->Topicos->save($topico)) {
                $this->Flash->success(__('The topico has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The topico could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('topico'));
        $this->set('_serialize', ['topico']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Topico id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $topico = $this->Topicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topico = $this->Topicos->patchEntity($topico, $this->request->data);
            if ($this->Topicos->save($topico)) {
                $this->Flash->success(__('The topico has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The topico could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('topico'));
        $this->set('_serialize', ['topico']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Topico id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topico = $this->Topicos->get($id);
        $topico->ativo = 0;
        if ($this->Topicos->save($topico)) {
            $this->Flash->success(__('The topico has been deleted.'));
        } else {
            $this->Flash->error(__('The topico could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
