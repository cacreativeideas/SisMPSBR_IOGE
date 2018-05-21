<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ProjetosUos Controller
 *
 * @property \App\Model\Table\ProjetosUosTable $ProjetosUos
 */
class ProjetosUosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $projetosUos = $this->ProjetosUos->find('all')
            ->contain(['UnidadesOrganizacionais.Empresas'])
            ->where(['ProjetosUos.ativo' => 1])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        $projetosUos = $this->paginate($projetosUos);

        $this->set(compact('projetosUos'));
        $this->set('_serialize', ['projetosUos']);
    }

    /**
     * View method
     *
     * @param string|null $id Projetos Uo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projetosUo = $this->ProjetosUos->get($id, [
            'contain' => ['UnidadesOrganizacionais']
        ]);

        $this->set('projetosUo', $projetosUo);
        $this->set('_serialize', ['projetosUo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projetosUo = $this->ProjetosUos->newEntity();
        if ($this->request->is('post')) {
            $projetosUo = $this->ProjetosUos->patchEntity($projetosUo, $this->request->data);
            if ($this->ProjetosUos->save($projetosUo)) {
                $this->Flash->success(__('The projetos uo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projetos uo could not be saved. Please, try again.'));
            }
        }

        /* Lista de Empresas Associadas a IOGE */
        $empresas = TableRegistry::get('Empresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);

        $unidadesOrganizacionais = [];

        $this->set(compact('projetosUo', 'empresas', 'unidadesOrganizacionais'));
        $this->set('_serialize', ['projetosUo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projetos Uo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projetosUo = $this->ProjetosUos->get($id, [
            'contain' => ['UnidadesOrganizacionais']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projetosUo = $this->ProjetosUos->patchEntity($projetosUo, $this->request->data);
            if ($this->ProjetosUos->save($projetosUo)) {
                $this->Flash->success(__('The projetos uo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projetos uo could not be saved. Please, try again.'));
            }
        }

        /* Lista de Empresas Associadas a IOGE */
        $empresas = TableRegistry::get('Empresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);;

        /* Busca UO associada ao Projeto da UO */
        $unidadeTable = TableRegistry::get('UnidadesOrganizacionais');
        $unidade = $unidadeTable->get($projetosUo['unidade_organizacional_id'], ['contain' => ['Empresas']]);

        /* Lista de Unidades Associadas a Empresa selecionada */
        $unidadesOrganizacionais = TableRegistry::get('UnidadesOrganizacionais')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['empresa_id' => $unidade['empresa_id']])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        /* Setando campo selecionado */
        $projetosUo['empresa_id'] = $unidade['empresa_id'];
        $projetosUo['unidade_organizacional_id'] = $unidade['id'];

        $this->set(compact('projetosUo', 'unidadesOrganizacionais', 'empresas'));
        $this->set('_serialize', ['projetosUo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projetos Uo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projetosUo = $this->ProjetosUos->get($id);
        $projetosUo->ativo = 0;
        if ($this->ProjetosUos->save($projetosUo)) {
            $this->Flash->success(__('The projetos uo has been deleted.'));
        } else {
            $this->Flash->error(__('The projetos uo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function listuobyempresa($idEmpresa){
        //$this->autoRender = false;
        if ($this->request->is('ajax') ){
            $this->viewBuilder()->layout('ajax');
        }
        $uos = TableRegistry::get('UnidadesOrganizacionais')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['empresa_id' => $idEmpresa])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        $this->set(compact('uos'));

    }
}
