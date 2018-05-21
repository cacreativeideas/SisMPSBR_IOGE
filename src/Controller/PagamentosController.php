<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Pagamentos Controller
 *
 * @property \App\Model\Table\PagamentosTable $Pagamentos
 */
class PagamentosController extends AppController
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
        $pagamentos = $this->paginate($this->Pagamentos);

        $this->set(compact('pagamentos'));
        $this->set('_serialize', ['pagamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => ['Projetos', 'Parcelas', 'Restituicoes']
        ]);

        $this->set('pagamento', $pagamento);
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagamento = $this->Pagamentos->newEntity();
        if ($this->request->is('post')) {
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $this->request->data);
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success(__('The pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagamento could not be saved. Please, try again.'));
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

        $this->set(compact('pagamento', 'projetos'));
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $this->request->data);
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success(__('The pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagamento could not be saved. Please, try again.'));
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

        $this->set(compact('pagamento', 'projetos'));
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagamento = $this->Pagamentos->get($id);
        $pagamento->ativo = 0;
        if ($this->Pagamentos->save($pagamento)) {
            $this->Flash->success(__('The pagamento has been deleted.'));
        } else {
            $this->Flash->error(__('The pagamento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
