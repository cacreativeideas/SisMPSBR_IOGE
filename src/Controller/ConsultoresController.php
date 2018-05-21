<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Consultores Controller
 *
 * @property \App\Model\Table\ConsultoresTable $Consultores
 */
class ConsultoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $consultores = $this->Consultores->find('all')
            ->contain(['InstituicoesImplementadoras.Instituicoes', 'Usuarios'])
            ->where(['InstituicoesImplementadoras.ativo' => 1])
            ->andWhere(['Consultores.ativo' => 1]);

        $consultores = $this->paginate($consultores);

        $this->set(compact('consultores'));
        $this->set('_serialize', ['consultores']);
    }

    /**
     * View method
     *
     * @param string|null $id Consultor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultor = $this->Consultores->get($id, [
            'contain' => ['Usuarios', 'InstituicoesImplementadoras']
        ]);

        $this->set('consultor', $consultor);
        $this->set('_serialize', ['consultor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consultor = $this->Consultores->newEntity();
        if ($this->request->is('post')) {
            $consultor = $this->Consultores->patchEntity($consultor, $this->request->data,
                ['associated'=>['Usuarios']]);

            if($consultor['is_coordenador'] == 0){
                $consultor['usuario']['role'] = 'consultor';
            }
            else {
                $consultor['usuario']['role'] = 'coord_ii';
            }
          
            if( $this->request->data['usuario']['id'] != null) {
                $this->request->data['usuario_id'] = $this->request->data['usuario']['id'];
                $consultor->usuario->id = $this->request->data['usuario']['id'];
                $consultor->usuario_id = $this->request->data['usuario']['id'];
                $consultor->usuario->isNew(false);
            }

            $consultor->usuario->cod_verificador = md5(md5($consultor->usuario->email));

            $consultor->usuario->password = 'teste';
          
            if ($this->Consultores->save($consultor)) {
                /*
                $to = $consultor->usuario->email;

                $email = new Email();

                $email->transport('gmail');

                $email
                    ->template('confirm_email')
                    ->emailFormat('html');

                $email
                    ->to($to);

                $email->viewVars(['nome' => $consultor->usuario->nome]);
                $email->viewVars(['cod_verificador' => $consultor->usuario->cod_verificador]);

                $email->send();
                */
                $this->Flash->success(__('The consultor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The consultor could not be saved. Please, try again.'));
            }
        }
        
        $usuarios = $this->getUsuarios();
      
        $instituicoesImplementadoras = TableRegistry::get('InstituicoesImplementadoras')->find('list',[
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->where(['InstituicoesImplementadoras.ativo' => 1])
            ->contain(['Instituicoes']);

        $this->set(compact('consultor', 'instituicoesImplementadoras', 'usuarios'));
        $this->set('_serialize', ['consultor']);
    }

    public function associarConsultorProjeto(){

        if ($this->request->is('post')) {
//            $projetoTable = TableRegistry::get('Projetos');
            $consultorProjetoTable = TableRegistry::get('ProjetoConsultores');

            $success = 0;
            $dataForm = $this->request->input('json_decode', true);

            $consultores = [];

            foreach ($dataForm as $key => $data) {
//                $projeto = $projetoTable->find()
//                    ->contain(['GrupoEmpresas', 'UnidadesOrganizacionais'])
//                    ->where(['GrupoEmpresas.id' => $data['idGrupo'],
//                        'UnidadesOrganizacionais.id' => $data['idUO']])
//                    ->andWhere(['Projeto.ativo' => 1]);
//
//                $idProjeto = $projeto['id'];

                $consultores[$key]['consultor_id'] = $data['id'];
                $consultores[$key]['projeto_id'] = $dataForm['projeto_id'];
            }

            foreach ($consultores as $consultor) {
                $consultorProjeto = $consultorProjetoTable->newEntity();

                $consultorProjeto = $consultorProjetoTable->patchEntity($consultorProjeto, $consultor);
                if ($consultorProjetoTable->save($consultorProjeto)) {
                    $success++;
                }
            }
        }

        $idII = $this->request->session()->read('InstituicoesImplementadoras.id');

        $gruposEmpresas = TableRegistry::get('GruposEmpresas')->find('list',[
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

        $empresas = [];

        $uos = [];

        $consultores = $this->Consultores->find('all')
            ->contain(['InstituicoesImplementadoras', 'Usuarios' ])
            ->where(['InstituicoesImplementadoras.id' => $idII])
            ->andWhere(['InstituicoesImplementadoras.ativo' => 1])
            ->andWhere(['Consultores.ativo' => 1]);

        $consultores = $consultores->toArray();
        $dados = [];

        foreach ($consultores as $key => $data) {
            $dados[$key]['id'] = $data['id'];
            $dados[$key]['nome'] = $data['usuario']['nome'];
            $dados[$key]['modeloReferencia'] = $data['modelo_referencia'];
        }

        $consultores = json_encode($dados);

        $projetos = TableRegistry::get('Projetos')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
            }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);

        $this->set(compact( 'gruposEmpresas', 'empresas', 'uos', 'consultores', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consultor = $this->Consultores->get($id, [
            'contain' => ['Usuarios', 'InstituicoesImplementadoras']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->data);exit;

            $consultor = $this->Consultores->patchEntity($consultor, $this->request->data);

            if($consultor['is_coordenador'] == 0){
                $consultor['usuario']['role'] = 'consultor';
            }
            else {
                $consultor['usuario']['role'] = 'coord_ii';
            }

            /*
            $modeloReferencia = "";
            if( isset($this->request->data['modelo_referencia'][0]) && $this->request->data['modelo_referencia'][0] == 'MR-MPS-SW') {
                $modeloReferencia += "MR-MPS-SW;";
            }
            if( isset($this->request->data['modelo_referencia'][1]) && $this->request->data['modelo_referencia'][1] == 'MR-MPS-SV') {
                $modeloReferencia += "MR-MPS-SV;";
            }
            $consultor['modelo_referencia'] = $modeloReferencia;

            debug($consultor['modelo_referencia']);exit;
            */

            if ($this->Consultores->save($consultor)) {
                $this->Flash->success(__('The consultor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The consultor could not be saved. Please, try again.'));
            }
        }

        $instituicoesImplementadoras = TableRegistry::get('InstituicoesImplementadoras')->find('list',[
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->where(['InstituicoesImplementadoras.ativo' => 1])
            ->contain(['Instituicoes']);

        $this->set(compact('consultor', 'instituicoesImplementadoras'));
        $this->set('_serialize', ['consultor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultor = $this->Consultores->get($id);
        $consultor->ativo = 0;
        if ($this->Consultores->save($consultor)) {
            $this->Flash->success(__('The consultor has been deleted.'));
        } else {
            $this->Flash->error(__('The consultor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
  
    public function getUsuarios(){
        $usuariosTable = TableRegistry::get('Usuarios');
        $data = $usuariosTable->find('all');

        $newData = [];

        foreach($data as $key => $data){
            $object = [];
            $object['id'] = $data['id'];
            $object['value'] = $data['id'];
            $object['label'] = $data['nome'];
            $object['endereco'] = $data['endereco'];
            $object['telefone'] = $data['telefone'];
            $object['email'] = $data['email'];
            $newData[] = $object;
        }

        $usuarios = json_encode($newData);

        return $usuarios;
    }
}
