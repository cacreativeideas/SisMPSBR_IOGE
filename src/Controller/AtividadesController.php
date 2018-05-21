<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Atividades Controller
 *
 * @property \App\Model\Table\AtividadesTable $Atividades
 */
class AtividadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos.UnidadesOrganizacionais.Empresas', 'Consultores']
        ];
        $atividades = $this->paginate($this->Atividades);

        $this->set(compact('atividades'));
        $this->set('_serialize', ['atividades']);
    }

    /**
     * View method
     *
     * @param string|null $id Atividade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atividade = $this->Atividades->get($id, [
            'contain' => ['Projetos', 'Consultores']
        ]);

        $this->set('atividade', $atividade);
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atividade = $this->Atividades->newEntity();
        if ($this->request->is('post')) {
            $atividade = $this->Atividades->patchEntity($atividade, $this->request->data);
            if ($this->Atividades->save($atividade)) {
                $this->Flash->success(__('The atividade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The atividade could not be saved. Please, try again.'));
            }
        }

        $idII = $this->request->session()->read('InstituicoesOrganizadoras.id');

        $grupoEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->innerJoinWith(
                'Projetos', function ($q) use ($idII) {
                return $q
                    ->where(['instituicao_implementadora_id' => $idII]);
            })
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1])
            ->group(['GruposEmpresas.id']);

        $empresas = $uos = $projetos = $consultores = [];

        $projetos = TableRegistry::get('Projetos')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
            }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);

        $this->set(compact( 'grupoEmpresas', 'empresas', 'uos', 'atividade', 'projetos', 'consultores'));
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Atividade id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atividade = $this->Atividades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atividade = $this->Atividades->patchEntity($atividade, $this->request->data);
            if ($this->Atividades->save($atividade)) {
                $this->Flash->success(__('The atividade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The atividade could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('atividade', 'projetos', 'consultores'));
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Atividade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atividade = $this->Atividades->get($id);
        $atividade->ativo = 0;

        if ($this->Atividades->save($atividade)) {
            $this->Flash->success(__('The atividade has been deleted.'));
        } else {
            $this->Flash->error(__('The atividade could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function listuobyempresa($idEmpresa, $idGrupo)
    {
        //$this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
        }

        $uos = TableRegistry::get('UnidadesOrganizacionais')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['UnidadesOrganizacionais.empresa_id' => $idEmpresa])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1])
            ->andWhere(['UnidadesOrganizacionais.grupo_empresas_id' => $idGrupo]);
        debug($uos);

        $this->set(compact('uos'));
    }

    public function listempresabygrupo($idGrupo)
    {
        //$this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
        }

        $empresas = TableRegistry::get('Empresas')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->innerJoinWith(
                'UnidadesOrganizacionais', function ($q) use ($idGrupo) {
                return $q
                    ->where(['grupo_empresas_id' => $idGrupo]);
            })
            ->andWhere(['Empresas.ativo' => 1]);

        $this->set(compact('empresas'));
    }

    public function listprojetobyuo($idUO){
        //$this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
        }

        $queryProjeto = TableRegistry::get('Projetos')->find('all')
            ->contain(['UnidadesOrganizacionais','Consultores'])
            ->where(['UnidadesOrganizacionais.id' => $idUO]);
        $projeto = $queryProjeto->first();

        $consultores = $projeto['consultores'];

        $this->set(compact('projeto', 'consultores'));
    }
}
