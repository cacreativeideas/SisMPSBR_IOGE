<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Treinamentos Controller
 *
 * @property \App\Model\Table\TreinamentosTable $Treinamentos
 */
class TreinamentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GruposEmpresas']
        ];
        $treinamentos = $this->paginate($this->Treinamentos);

        $this->set(compact('treinamentos'));
        $this->set('_serialize', ['treinamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Treinamento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treinamento = $this->Treinamentos->get($id, [
            'contain' => ['GruposEmpresas', 'TreinamentosParticipantes']
        ]);

        $this->set('treinamento', $treinamento);
        $this->set('_serialize', ['treinamento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treinamento = $this->Treinamentos->newEntity();
        if ($this->request->is('post')) {
            $treinamento = $this->Treinamentos->patchEntity($treinamento, $this->request->data);
            if ($this->Treinamentos->save($treinamento)) {
                $this->Flash->success(__('The treinamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treinamento could not be saved. Please, try again.'));
            }
        }

        /* Lista de Grupo de Empresas Associadas a IOGE */
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $this->set(compact('treinamento', 'gruposEmpresas'));
        $this->set('_serialize', ['treinamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treinamento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treinamento = $this->Treinamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treinamento = $this->Treinamentos->patchEntity($treinamento, $this->request->data);
            if ($this->Treinamentos->save($treinamento)) {
                $this->Flash->success(__('The treinamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treinamento could not be saved. Please, try again.'));
            }
        }

        /* Lista de Grupo de Empresas Associadas a IOGE */
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $this->set(compact('treinamento', 'gruposEmpresas'));
        $this->set('_serialize', ['treinamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treinamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treinamento = $this->Treinamentos->get($id);
        $treinamento->ativo = 0;
        if ($this->Treinamentos->save($treinamento)) {
            $this->Flash->success(__('The treinamento has been deleted.'));
        } else {
            $this->Flash->error(__('The treinamento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
