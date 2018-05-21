<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * GruposEmpresas Controller
 *
 * @property \App\Model\Table\GruposEmpresasTable $GruposEmpresas
 */
class GruposEmpresasController extends AppController
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
        $gruposEmpresas = $this->GruposEmpresas->find('all')
            ->contain(['InstituicoesOrganizadoras'])
            ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $gruposEmpresas = $this->paginate($gruposEmpresas);

        $this->set(compact('gruposEmpresas'));
        $this->set('_serialize', ['gruposEmpresas']);
    }

    /**
     * View method
     *
     * @param string|null $id Grupos Empresa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gruposEmpresa = $this->GruposEmpresas->get($id, [
            'contain' => ['InstituicoesOrganizadoras.Instituicoes',
                'UnidadesOrganizacionais.Empresas']
        ]);

        $intituicoesImplementadoras = [];
        $intituicoesImplementadoras = TableRegistry::get('InstituicoesImplementadoras')->find()
            ->contain([
                'Instituicoes'
            ])
            ->innerJoinWith(
                'Projetos', function ($q) use ($id) {
                return $q
                    ->where(['grupo_empresas_id' => $id])
                    ->andWhere(['Projetos.ativo' => 1]);
            })
            ->andWhere(['InstituicoesImplementadoras.ativo' => 1])
            ->group(['InstituicoesImplementadoras.id']);

        $instituicoesAvaliadoras = [];
        $instituicoesAvaliadoras = TableRegistry::get('InstituicoesAvaliadoras')->find()
            ->contain([
                'Instituicoes'
            ])
            ->innerJoinWith(
                'Projetos', function ($q) use ($id) {
                return $q
                    ->where(['grupo_empresas_id' => $id])
                    ->andWhere(['Projetos.ativo' => 1]);
            })
            ->andWhere(['InstituicoesAvaliadoras.ativo' => 1])
            ->group(['InstituicoesAvaliadoras.id']);

        $this->set(compact('gruposEmpresa', 'intituicoesImplementadoras', 'instituicoesAvaliadoras'));
        $this->set('_serialize', ['gruposEmpresa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gruposEmpresa = $this->GruposEmpresas->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['instituicao_organizadora_id'] = $this->request->session()->read('InstituicoesOrganizadoras.id');

            $gruposEmpresa = $this->GruposEmpresas->patchEntity($gruposEmpresa, $this->request->data,
                ['associated' => ['InstituicoesOrganizadoras']]);

            if ($this->GruposEmpresas->save($gruposEmpresa)) {
                $this->Flash->success(__('The grupos empresa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('gruposEmpresa'));
        $this->set('_serialize', ['gruposEmpresa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupos Empresa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gruposEmpresa = $this->GruposEmpresas->get($id, [
            'contain' => ['InstituicoesOrganizadoras', 'UnidadesOrganizacionais']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gruposEmpresa = $this->GruposEmpresas->patchEntity($gruposEmpresa, $this->request->data);
            if ($this->GruposEmpresas->save($gruposEmpresa)) {
                $this->Flash->success(__('The grupos empresa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
            }
        }

        /* Lista de Empresas Associadas a IOGE
        $empresas = TableRegistry::get('Empresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);

        /* Busca UO associada ao Grupo de Empresa
        $unidades = TableRegistry::get('UnidadesOrganizacionais')->find()
            ->where(['grupo_empresas_id' => $gruposEmpresa->id])->contain(['Empresas']);

        /* Unidade Associada ao Grupo de Empresas
        $unidade = $unidades->first();

        /* Lista de Unidades Associadas a Empresa selecionada
        $uos = TableRegistry::get('UnidadesOrganizacionais')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['empresa_id' => $unidade['empresa_id']]);

        /* Setando campo selecionado
        $gruposEmpresa['empresa_id'] = $unidade['empresa_id'];
        $gruposEmpresa['unidade_organizacional_id'] = $unidade['id'];
        */

        $this->set(compact('gruposEmpresa'));

        $this->set(compact('gruposEmpresa'));
        $this->set('_serialize', ['gruposEmpresa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupos Empresa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gruposEmpresa = $this->GruposEmpresas->get($id);
        $gruposEmpresa->ativo = 0;
        if ($this->GruposEmpresas->save($gruposEmpresa)) {
            $this->Flash->success(__('The grupos empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The grupos empresa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function associarUnidadeOrganizacional()
    {
        $gruposEmpresa = $this->GruposEmpresas->newEntity();

        $gruposEmpresas = $this->GruposEmpresas->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $empresas = [];

        $uos = [];

        if ($this->request->is('post')) {

            $uoTable = TableRegistry::get('UnidadesOrganizacionais');
            $uo = $uoTable->get($this->request->data['unidades_organizacionais'][0]['id']);
            $uo['grupo_empresas_id'] = $this->request->data['id'];
            $uo['descricao_processo_uo'] = $this->request->data['unidades_organizacionais'][0]['descricao_processo_uo'];

            if ($uoTable->save($uo)) {
                $this->Flash->success(__('The association between grupos empresas and uos has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('gruposEmpresa', 'gruposEmpresas', 'empresas', 'uos'));
        $this->set('_serialize', ['gruposEmpresas']);

    }

    public function associarInstituicaoImplementadora()
    {
        $gruposEmpresas = $this->GruposEmpresas->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $instituicoesImplementadoras = TableRegistry::get('InstituicoesImplementadoras')->find('list', [
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->contain(['Instituicoes'])
            ->where(['InstituicoesImplementadoras.ativo' => 1]);

        $projeto = [];

        if ($this->request->is('post')) {
            $projetoTable = TableRegistry::get('Projetos');

            $success = 0;
            $data = $this->request->input('json_decode', true);

            $projetos = $this->projetoDataTable($data);

            //debug($projetos);exit;

            foreach ($projetos as $proj) {
                if ($proj['id'] == null) {
                    $projeto = $projetoTable->newEntity();
                } else {
                    $projeto = $projetoTable->get($proj['id']);
                }

                $projeto = $projetoTable->patchEntity($projeto, $proj);
                if ($projetoTable->save($projeto)) {
                    $success++;
                }
            }

            if ($success == count($projetos)) {
                $this->Flash->success(__('The grupos empresa has been saved.'));
            } else {
                $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('gruposEmpresas', 'instituicoesImplementadoras'));
        $this->set('_serialize', ['gruposEmpresas']);
    }

    public function associarInstituicaoAvaliadora()
    {
        $gruposEmpresas = $this->GruposEmpresas->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $instituicoesAvaliadoras = TableRegistry::get('InstituicoesAvaliadoras')->find('list', [
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->contain(['Instituicoes'])
            ->where(['InstituicoesAvaliadoras.ativo' => 1]);

        $projeto = [];

        if ($this->request->is('post')) {
            $projetoTable = TableRegistry::get('Projetos');

            $success = 0;
            $data = $this->request->input('json_decode', true);

            $projetos = $this->projetoDataTable($data);

            //debug($projetos);exit;

            foreach ($projetos as $proj) {
                if ($proj['id'] == null) {
                    $projeto = $projetoTable->newEntity();
                } else {
                    $projeto = $projetoTable->get($proj['id']);
                }

                $projeto = $projetoTable->patchEntity($projeto, $proj);
                if ($projetoTable->save($projeto)) {
                    $success++;
                }
            }

            if ($success == count($projetos)) {
                $this->Flash->success(__('The grupos empresa has been saved.'));
            } else {
                $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('gruposEmpresas', 'instituicoesAvaliadoras'));
        $this->set('_serialize', ['gruposEmpresas']);
    }

    public function deleteUoFromGroup($idGrupo, $idUO)
    {
        $this->request->allowMethod(['post', 'delete']);

        $uoTable = TableRegistry::get('UnidadesOrganizacionais');
        $uo = $uoTable->get($idUO);
        $uo['grupo_empresas_id'] = null;
        $uo['descricao_processo_uo'] = null;

        if ($uoTable->save($uo)) {
            $this->Flash->success(__('The UO has been removed frou Group.'));
        } else {
            $this->Flash->error(__('The grupos empresa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'view', $idGrupo]);
    }

    public function deleteIaFromGroup($idGrupo, $idIA)
    {
        $this->request->allowMethod(['post', 'delete']);

        $success = 0;
        $projetoTable = TableRegistry::get('Projetos');

        $projetos = $projetoTable->find();

        foreach ($projetos as $proj) {
            $projeto = $projetoTable->get($proj['id']);

            $proj['instituicao_avaliadora_id'] = null;
            $proj['descricao_processo_ia'] = null;

            $projeto = $projetoTable->patchEntity($projeto, $proj);
            if ($projetoTable->save($projeto)) {
                $success++;
            }
        }

        if ($success == count($projetos)) {
            $this->Flash->success(__('The grupos empresa has been saved.'));
        } else {
            $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $idGrupo]);
    }

    public function deleteIiFromGroup($idGrupo, $idII)
    {
        $this->request->allowMethod(['post', 'delete']);

        $success = 0;
        $projetoTable = TableRegistry::get('Projetos');

        $projetos = $projetoTable->find();

        foreach ($projetos as $proj) {
            $projeto = $projetoTable->get($proj['id']);

            $proj['instituicao_implementadora_id'] = null;
            $proj['descricao_processo_ii'] = null;

            $projeto = $projetoTable->patchEntity($projeto, $proj);
            if ($projetoTable->save($projeto)) {
                $success++;
            }
        }

        if ($success == count($projetos)) {
            $this->Flash->success(__('The grupos empresa has been saved.'));
        } else {
            $this->Flash->error(__('The grupos empresa could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'view', $idGrupo]);
    }

    public function listuobyempresa($idEmpresa)
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
            ->andWhere(['UnidadesOrganizacionais.grupo_empresas_id IS' => null]);

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
            ->contain(['UnidadesOrganizacionais'])
            ->where(['Empresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);

        $this->set(compact('empresas'));
    }

    public function findProjetoByGrupo($idGrupo)
    {
        $retorno = TableRegistry::get('UnidadesOrganizacionais')->find('all')
            ->select(['id', 'nome', 'nivel_mps'])
            ->contain([
                'Empresas' => function ($q) {
                    return $q->autoFields(false)
                        ->select(['id', 'nome'])
                        ->andWhere(['Empresas.ativo' => 1]);
                },
                'Projetos' => function ($q) use ($idGrupo) {
                    return $q->autoFields(false)
                        ->select(['id',
                            'instituicao_implementadora_id', 'descricao_processo_ii',
                            'instituicao_avaliadora_id', 'descricao_processo_ia',
                            'unidade_organizacional_id'])
                        ->where(['Projetos.grupo_empresas_id' => $idGrupo])
                        ->andWhere(['Projetos.ativo' => 1]);
                }
            ])
            ->where(['UnidadesOrganizacionais.grupo_empresas_id' => $idGrupo])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        //montando JSON a partir da consulta realizada
        foreach ($retorno as $key => $data) {
            $newRetorno[$key]['idGrupo'] = $idGrupo;

            $newRetorno[$key]['idUO'] = $data['id'];
            $newRetorno[$key]['uo'] = $data['nome'];
            $newRetorno[$key]['nivelMPS'] = $data['nivel_mps'];

            if (!empty($data['empresa'])) {
                $empresa = $data['empresa'];
                //$newRetorno[$key]['empresaID'] = $empresa['id'];
                $newRetorno[$key]['empresa'] = $empresa['nome'];
            }

            if (!empty($data['projetos'])) {
                $projeto = $data['projetos'][0];

                $newRetorno[$key]['idProjeto'] = $projeto['id'];
                $newRetorno[$key]['idII'] = $projeto['instituicao_implementadora_id'];
                $newRetorno[$key]['descProcessoII'] = $projeto['descricao_processo_ii'];
                $newRetorno[$key]['idIA'] = $projeto['instituicao_avaliadora_id'];
                $newRetorno[$key]['descProcessoIA'] = $projeto['descricao_processo_ia'];
            } else {
                $newRetorno[$key]['idProjeto'] = null;
                $newRetorno[$key]['idII'] = null;
                $newRetorno[$key]['descProcessoII'] = null;
                $newRetorno[$key]['idIA'] = null;
                $newRetorno[$key]['descProcessoIA'] = null;
            }
        }

        $retorno = [];
        $retorno = json_encode($newRetorno);

        $this->set(compact('retorno'));
    }

    public function projetoDataTable($dataProjeto)
    {
        $dataArray = [];

        foreach ($dataProjeto as $key => $data) {
            $dataArray[$key]['id'] = $data['idProjeto'];
            $dataArray[$key]['grupo_empresas_id'] = $data['idGrupo'];
            //$dataArray[$key][''] = $data['uo'];
            //$dataArray[$key][''] = $data['nivelMPS'];
            //$dataArray[$key][''] = $data['empresa'];
            $dataArray[$key]['unidade_organizacional_id'] = $data['idUO'];
            $dataArray[$key]['instituicao_implementadora_id'] = $data['idII'];
            $dataArray[$key]['descricao_processo_ii'] = $data['descProcessoII'];
            $dataArray[$key]['instituicao_avaliadora_id'] = $data['idIA'];
            $dataArray[$key]['descricao_processo_ia'] = $data['descProcessoIA'];
        }

        return $dataArray;
    }
}
