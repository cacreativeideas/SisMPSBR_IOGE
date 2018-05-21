<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Parcelas Controller
 *
 * @property \App\Model\Table\ParcelasTable $Parcelas
 */
class ParcelasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pagamentos']
        ];
        $parcelas = $this->paginate($this->Parcelas);

        $this->set(compact('parcelas'));
        $this->set('_serialize', ['parcelas']);
    }

    /**
     * View method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parcela = $this->Parcelas->get($id, [
            'contain' => ['Pagamentos']
        ]);

        $this->set('parcela', $parcela);
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parcela = $this->Parcelas->newEntity();
        if ($this->request->is('post')) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
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

        $pagamentos = [];

        $this->set(compact('parcela', 'pagamentos', 'projetos'));
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parcela = $this->Parcelas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
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

        $pagamentos = [];

        $this->set(compact('parcela', 'pagamentos', 'projetos'));
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parcela = $this->Parcelas->get($id);
        $parcela->ativo = 0;
        if ($this->Parcelas->save($parcela)) {
            $this->Flash->success(__('The parcela has been deleted.'));
        } else {
            $this->Flash->error(__('The parcela could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
  
    public function addAPagar(){
        $parcela = $this->Parcelas->newEntity();
        
        if ($this->request->is('post')) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
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

        $pagamentos = [];

        $this->set(compact('parcela', 'pagamentos', 'projetos'));
        $this->set('_serialize', ['parcela']);
    }
  
    public function addAReceber(){
        $parcela = $this->Parcelas->newEntity();
      
        if ($this->request->is('post')) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
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

        $pagamentos = [];

        $this->set(compact('parcela', 'pagamentos', 'projetos'));
        $this->set('_serialize', ['parcela']);
    }


    public function getEntradas()
    {
        $retorno = $this->Pagamentos->find('all')
            ->contain(['Projetos.GruposEmpresas.InstituicaoOrganizadora'])
            ->where(['InstituicaoOrganizadora.id' =>
                $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Pagamentos.tipo_pagamento' => 'Entradas'])
            ->andWhere(['Pagamentos.ativo' => 1]);

        //montando JSON a partir da consulta realizada
        foreach ($retorno as $key => $data) {
            $newRetorno[$key][''] = $data[''];
        }

        $retorno = [];
        $retorno = json_encode($newRetorno);

        $this->set(compact('retorno'));
    }

    public function getSaidas()
    {
        $retorno = $this->Pagamentos->find('all')
            ->contain(['Projetos.GruposEmpresas.InstituicaoOrganizadora'])
            ->where(['InstituicaoOrganizadora.id' =>
                $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Pagamentos.tipo_pagamento' => 'Saidas'])
            ->andWhere(['Pagamentos.ativo' => 1]);

        //montando JSON a partir da consulta realizada
        foreach ($retorno as $key => $data) {
            $newRetorno[$key][''] = $data[''];
        }

        $retorno = [];
        $retorno = json_encode($newRetorno);

        $this->set(compact('retorno'));
    }
}
