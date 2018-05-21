<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * TreinamentosParticipantes Controller
 *
 * @property \App\Model\Table\TreinamentosParticipantesTable $TreinamentosParticipantes
 */
class TreinamentosParticipantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $treinamentosParticipanteTable = TableRegistry::get('TreinamentosParticipantes');

        $this->paginate = [
            'contain' => ['Treinamentos', 'Empresas']
        ];
        $treinamentosParticipantes = $this->paginate($treinamentosParticipanteTable);

        $this->set(compact('treinamentosParticipantes'));
        $this->set('_serialize', ['treinamentosParticipantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Treinamentos Participante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treinamentosParticipanteTable = TableRegistry::get('TreinamentosParticipantes');

        $treinamentosParticipante = $treinamentosParticipanteTable->get($id, [
            'contain' => ['Treinamentos']
        ]);

        $this->set('treinamentosParticipante', $treinamentosParticipante);
        $this->set('_serialize', ['treinamentosParticipante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($idTreinamento = null)
    {
        $treinamentosParticipanteTable = TableRegistry::get('TreinamentosParticipantes');

        $treinamentosParticipante = $treinamentosParticipanteTable->newEntity();

        if($idTreinamento != null){
            $treinamentosParticipante->treinamento_id = $idTreinamento;
        }

        if ($this->request->is('post')) {
            $treinamentosParticipante = $treinamentosParticipanteTable->patchEntity($treinamentosParticipante, $this->request->data);
            if ($treinamentosParticipanteTable->save($treinamentosParticipante)) {
                $this->Flash->success(__('The treinamentos participante has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treinamentos participante could not be saved. Please, try again.'));
            }
        }

        $treinamentos =  TableRegistry::get('Treinamentos')->find();

        $this->set(compact('treinamentosParticipante', 'treinamentos', 'treinamento_id'));
        $this->set('_serialize', ['treinamentosParticipante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treinamentos Participante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treinamentosParticipante = $this->TreinamentosParticipantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treinamentosParticipante = $this->TreinamentosParticipantes->patchEntity($treinamentosParticipante, $this->request->data);
            if ($this->TreinamentosParticipantes->save($treinamentosParticipante)) {
                $this->Flash->success(__('The treinamentos participante has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treinamentos participante could not be saved. Please, try again.'));
            }
        }
        $treinamentos = $this->TreinamentosParticipantes->Treinamentos->find('list', ['limit' => 200]);
        $this->set(compact('treinamentosParticipante', 'treinamentos'));
        $this->set('_serialize', ['treinamentosParticipante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treinamentos Participante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treinamentosParticipante = $this->TreinamentosParticipantes->get($id);
        if ($this->TreinamentosParticipantes->delete($treinamentosParticipante)) {
            $this->Flash->success(__('The treinamentos participante has been deleted.'));
        } else {
            $this->Flash->error(__('The treinamentos participante could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
