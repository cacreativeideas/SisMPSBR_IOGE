<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * UnidadesOrganizacionais Controller
 *
 * @property \App\Model\Table\UnidadesOrganizacionaisTable $UnidadesOrganizacionais
 */
class UnidadesOrganizacionaisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $unidadesOrganizacionais = $this->UnidadesOrganizacionais->find('all')
            ->contain(['Empresas', 'GruposEmpresas'])
            ->where(['UnidadesOrganizacionais.ativo' => 1]);

        $unidadesOrganizacionais = $this->paginate($unidadesOrganizacionais);

        $this->set(compact('unidadesOrganizacionais'));
        $this->set('_serialize', ['unidadesOrganizacionais']);
    }

    /**
     * View method
     *
     * @param string|null $id Unidades Organizacionai id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unidadesOrganizacionai = $this->UnidadesOrganizacionais->get($id, [
            'contain' => ['Empresas']
        ]);

        $this->set('unidadesOrganizacionai', $unidadesOrganizacionai);
        $this->set('_serialize', ['unidadesOrganizacionai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unidadesOrganizacionai = $this->UnidadesOrganizacionais->newEntity();
        if ($this->request->is('post')) {
            $unidadesOrganizacionai = $this->UnidadesOrganizacionais->patchEntity($unidadesOrganizacionai, $this->request->data);
            if ($this->UnidadesOrganizacionais->save($unidadesOrganizacionai)) {
                $this->Flash->success(__('The unidades organizacionai has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The unidades organizacionai could not be saved. Please, try again.'));
            }
        }

        $empresas = TableRegistry::get('Empresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);

        $this->set(compact('unidadesOrganizacionai', 'empresas'));
        $this->set('_serialize', ['unidadesOrganizacionai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Unidades Organizacionai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unidadesOrganizacionai = $this->UnidadesOrganizacionais->get($id, [
            'contain' => ['Empresas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unidadesOrganizacionai = $this->UnidadesOrganizacionais->patchEntity($unidadesOrganizacionai, $this->request->data);
            if ($this->UnidadesOrganizacionais->save($unidadesOrganizacionai)) {
                $this->Flash->success(__('The unidades organizacionai has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The unidades organizacionai could not be saved. Please, try again.'));
            }
        }
        $empresas = TableRegistry::get('Empresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);

        $this->set(compact('unidadesOrganizacionai', 'empresas'));
        $this->set('_serialize', ['unidadesOrganizacionai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Unidades Organizacionai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unidadesOrganizacionai = $this->UnidadesOrganizacionais->get($id);
        $unidadesOrganizacionai->ativo = 0;
        if ($this->UnidadesOrganizacionais->save($unidadesOrganizacionai)) {
            $this->Flash->success(__('The unidades organizacionai has been deleted.'));
        } else {
            $this->Flash->error(__('The unidades organizacionai could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
