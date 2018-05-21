<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 */
class ProjetosController extends AppController
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
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('all')
            ->where(['GruposEmpresas.ativo' => 1]);

        $gruposEmpresas = $this->paginate($gruposEmpresas);

        $this->set(compact('gruposEmpresas'));
        $this->set('_serialize', ['gruposEmpresas']);
    }

    public function indexParecer()
    {
        $this->paginate = [
            'contain' => ['GruposEmpresas']
        ];
        $projetos = $this->paginate($this->Projetos);

        $this->set(compact('projetos'));
        $this->set('_serialize', ['projetos']);
    }

    /**
     * View method
     *
     * @param string|null $idGrupo GrupoEmpresas id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idGrupo = null)
    {
        $projeto = $this->Projetos->get($id, [
            'contain' => ['GruposEmpresas', 'Atividades', 'LicoesAprendidas', 'Pagamentos', 'Problemas', 'Riscos']
        ]);

        $this->set('projeto', $projeto);
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projetos->newEntity();

        if ($this->request->is('post')) {
            $success = 0;
            $data = $this->request->input('json_decode', true);

            $projetos = $this->projetoDataTable($data);
            //debug($projetos);exit;

            foreach ($projetos as $proj){
                if($proj['id'] == null){
                    $projeto = $this->Projetos->newEntity();
                }else{
                    $projeto = $this->Projetos->get($proj['id']);
                }

                $projeto = $this->Projetos->patchEntity($projeto, $proj);
                if ($this->Projetos->save($projeto)) {
                    $success++;
                }
            }

            if($success == count($projetos)){
                $this->Flash->success(__('The projeto has been saved.'));
            }else{
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
        }

        /* Lista de Grupo de Empresas Associadas a IOGE */
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $this->set(compact('projeto', 'gruposEmpresas'));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $idGrupo GrupoEmpresas id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idGrupo = null)
    {
        $projeto = $this->findProjetoByGrupo($idGrupo);

        $projetoTable = $projeto;
        $projetoTable = $this->createProjetoJson($projetoTable, $idGrupo);

        //$projeto = $this->findProjetoByGrupo($idGrupo);
        $grupoEmpresa = TableRegistry::get('GruposEmpresas')->get($idGrupo);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $success = 0;
            $data = $this->request->input('json_decode', true);

            $projetos = $this->projetoDataTable($data);
            //debug($projetos);exit;

            foreach ($projetos as $proj){
                if($proj['id'] == null){
                    $projeto = $this->Projetos->newEntity();
                }else{
                    $projeto = $this->Projetos->get($proj['id']);
                }

                $projeto = $this->Projetos->patchEntity($projeto, $proj);
                if ($this->Projetos->save($projeto)) {
                    $success++;
                }
            }

            if($success == count($projetos)){
                $this->Flash->success(__('The projeto has been saved.'));
            }else{
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
        }
        /* Lista de Grupo de Empresas Associadas a IOGE */

        $this->set(compact('projeto', 'projetoTable', 'grupoEmpresa'));
        $this->set('_serialize', ['projeto', 'projetoTable', 'grupoEmpresa']);
    }

    public function addParecerIi()
    {
        $projeto = $this->Projetos->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->data);
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The parecer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecer could not be saved. Please, try again.'));
            }
        }
        /* Lista de Grupo de Empresas Associadas a IOGE */
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);

        $uos = [];

        $this->set(compact('projeto', 'gruposEmpresas', 'uos'));
        $this->set('_serialize', ['projeto']);
    }

    public function addParecerIoge()
    {
        $projeto = $this->Projetos->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->data);
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The parecer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecer could not be saved. Please, try again.'));
            }
        }
        /* Lista de Grupo de Empresas Associadas a IOGE */
        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['GruposEmpresas.instituicao_organizadora_id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['GruposEmpresas.ativo' => 1]);
        $uos = [];

        $this->set(compact('projeto', 'gruposEmpresas', 'uos'));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $idGrupo GrupoEmpresas idGrupo.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idGrupo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        $projeto->ativo = 0;
        if ($this->Projetos->save($projeto)) {
            $this->Flash->success(__('The projeto has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function listuobygrupoempresas($idGrupo){
        //$this->autoRender = false;
        if ($this->request->is('ajax') ){
            $this->viewBuilder()->layout('ajax');
        }

        $uos = TableRegistry::get('UnidadesOrganizacionais')->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'])
            ->where(['UnidadesOrganizacionais.grupo_empresas_id' => $idGrupo])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        $this->set(compact('uos'));

    }

    public function projetoDataTable($dataProjeto){
        $dataArray = [];

        foreach($dataProjeto as $key => $data){
            $dataArray[$key]['id'] = $data['idProjeto'];
            $dataArray[$key]['grupo_empresas_id'] = $data['idGrupo'];
            //$dataArray[$key][''] = $data['uo'];
            //$dataArray[$key][''] = $data['nivelMPS'];
            //$dataArray[$key][''] = $data['empresa'];
            $dataArray[$key]['unidade_organizacional_id'] = $data['idUO'];
            $dataArray[$key]['data_assinatura_convenio'] = $data['dataAssinaturaConvenio']->format('Y/m/d');
            $dataArray[$key]['data_inicio_implementacao'] = $data['dataInicioImplementacao']->format('Y/m/d');
            $dataArray[$key]['data_prevista_marco_50'] = $data['dataPrevistaMarco50']->format('Y/m/d');
            $dataArray[$key]['data_prevista_marco_100'] = $data['dataPrevistaMarco100']->format('Y/m/d');
            $dataArray[$key]['data_prevista_avaliacao'] = $data['dataPrevistaAvaliacao']->format('Y/m/d');
            $dataArray[$key]['data_realizacao_marco_50'] = $data['dataRealizacaoMarco50']->format('Y/m/d');
            $dataArray[$key]['data_realizacao_marco_100'] = $data['dataRealizacaoMarco100']->format('Y/m/d');
            $dataArray[$key]['data_realizacao_avaliacao'] = $data['dataRealizacaoAvaliacao']->format('Y/m/d');
        }

        return $dataArray;
    }

    public function getprojetobygrupo($idGrupo){
        $this->autoRender = false;
        $this->response->type('json');

        $retorno = $this->findProjetoByGrupo($idGrupo);
        $retorno = $this->createProjetoJson($retorno, $idGrupo);

        $this->response->body($retorno);
    }

    public function findProjetoByGrupo($idGrupo){
        $retorno = TableRegistry::get('UnidadesOrganizacionais')->find('all')
            ->select(['id','nome', 'nivel_mps'])
            ->contain([
                'Empresas' => function ($q) {
                    return $q->autoFields(false)
                        ->select(['id','nome'])
                        ->andWhere(['Empresas.ativo' => 1]);
                },
                'Projetos' => function ($q) use ($idGrupo) {
                    return $q->autoFields(false)
                        ->select(['id',
                            'data_assinatura_convenio','data_inicio_implementacao',
                            'data_prevista_marco_50','data_prevista_marco_100','data_prevista_avaliacao',
                            'data_realizacao_marco_50','data_realizacao_marco_100','data_realizacao_avaliacao',
                            'unidade_organizacional_id'])
                        ->where(['Projetos.grupo_empresas_id' => $idGrupo ])
                        ->andWhere(['Projetos.ativo' => 1]);
                }
            ])
            ->where(['UnidadesOrganizacionais.grupo_empresas_id' => $idGrupo])
            ->andWhere(['UnidadesOrganizacionais.ativo' => 1]);

        $retorno = $retorno->toArray();

        return $retorno;
    }

    public function createProjetoJson($retorno, $idGrupo){
        $newRetorno = [];

        //montando JSON a partir da consulta realizada
        foreach($retorno as $key => $data){
            $newRetorno[$key]['idGrupo'] = $idGrupo;

            $newRetorno[$key]['idUO'] = $data['id'];
            $newRetorno[$key]['uo'] = $data['nome'];
            $newRetorno[$key]['nivelMPS'] = $data['nivel_mps'];

            if(!empty($data['empresa'])) {
                $empresa = $data['empresa'];
                //$newRetorno[$key]['empresaID'] = $empresa['id'];
                $newRetorno[$key]['empresa'] = $empresa['nome'];
            }

            if(!empty($data['projetos'])) {
                $projeto = $data['projetos'][0];

                $newRetorno[$key]['idProjeto'] = $projeto['id'];
                $newRetorno[$key]['dataAssinaturaConvenio'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_assinatura_convenio']->format('Y/m/d') : null;
                $newRetorno[$key]['dataInicioImplementacao'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_inicio_implementacao']->format('Y/m/d') : null;
                $newRetorno[$key]['dataPrevistaMarco50'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_prevista_marco_50']->format('Y/m/d') : null;
                $newRetorno[$key]['dataPrevistaMarco100'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_prevista_marco_100']->format('Y/m/d') : null;
                $newRetorno[$key]['dataPrevistaAvaliacao'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_prevista_avaliacao']->format('Y/m/d') : null;
                $newRetorno[$key]['dataRealizacaoMarco50'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_realizacao_marco_50']->format('Y/m/d') : null;
                $newRetorno[$key]['dataRealizacaoMarco100'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_realizacao_marco_100']->format('Y/m/d') : null;
                $newRetorno[$key]['dataRealizacaoAvaliacao'] = $projeto['data_assinatura_convenio'] != null ? $projeto['data_realizacao_avaliacao']->format('Y/m/d') : null;
            }
            else{
                $newRetorno[$key]['idProjeto'] = null;
                $newRetorno[$key]['dataAssinaturaConvenio'] = null;
                $newRetorno[$key]['dataInicioImplementacao'] = null;
                $newRetorno[$key]['dataPrevistaMarco50'] = null;
                $newRetorno[$key]['dataPrevistaMarco100'] = null;
                $newRetorno[$key]['dataPrevistaAvaliacao'] = null;
                $newRetorno[$key]['dataRealizacaoMarco50'] = null;
                $newRetorno[$key]['dataRealizacaoMarco100'] = null;
                $newRetorno[$key]['dataRealizacaoAvaliacao'] = null;
            }
        }

        $retorno = [];
        $retorno = json_encode($newRetorno);

        return $retorno;
    }

}
