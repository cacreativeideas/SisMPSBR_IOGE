<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * InstituicoesImplementadoras Controller
 *
 * @property \App\Model\Table\InstituicoesImplementadorasTable $InstituicoesImplementadoras
 */
class InstituicoesImplementadorasController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $instituicoesImplementadoras = $this->InstituicoesImplementadoras->find('all')
            ->contain(['Instituicoes'])
            ->where(['InstituicoesImplementadoras.ativo' => 1]);

        $instituicoesImplementadoras = $this->paginate($instituicoesImplementadoras);

        $this->set(compact('instituicoesImplementadoras'));
        $this->set('_serialize', ['instituicoesImplementadoras']);
    }

    /**
     * View method
     *
     * @param string|null $id Instituicoes Implementadora id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instituicoesImplementadora = $this->InstituicoesImplementadoras->get($id, [
            'contain' => ['Instituicoes']
        ]);

        $this->set('instituicoesImplementadora', $instituicoesImplementadora);
        $this->set('_serialize', ['instituicoesImplementadora']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $instituicoesImplementadora = $this->InstituicoesImplementadoras->newEntity();
        if ($this->request->is('post')) {

            if(!empty($this->request->data['instituicao']['logo']['name']))
            {
                $file = $this->request->data['instituicao']['logo']; //put the data into a var for easy use
                $this->request->data['logo'] = $file['name'];
            }

            $instituicoesImplementadora = $this->InstituicoesImplementadoras->patchEntity($instituicoesImplementadora, $this->request->data,
                ['associated'=> ['Instituicoes' => [ 'accessibleFields' => ['id' => true] ]]]);
          
            if( $this->request->data['instituicao']['id'] != null) {
                $this->request->data['instituicao_id'] = $this->request->data['instituicao']['id'];
                $instituicoesImplementadora->instituicao->id = $this->request->data['instituicao']['id'];
                $instituicoesImplementadora->instituicao_id = $this->request->data['instituicao']['id'];
                $instituicoesImplementadora->instituicao->isNew(false);
            }
          
            $instituicoesImplementadora->instituicaoorganizadora_id = $this->request->session()->read('InstituicoesOrganizadoras.id');
          
            //debug($instituicoesImplementadora); exit;
          
            if ($this->InstituicoesImplementadoras->save($instituicoesImplementadora)) {
                $this->Flash->success(__('The instituicoes implementadora has been saved.'));
                
                /*
                if(!empty($this->request->data['instituicao']['logo']['name']))
                {
                    $id = $this->InstituicoesImplementadoras->Instituicoes->id;
                    $diretorio = WWW_ROOT . 'uploads' . DS . 'instituicoes' . DS . $id . DS;
                    $file = $this->request->data['instituicao']['logo']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'png', 'gif'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                        // verifica se diretorio existe
                        if (!is_dir($diretorio)) {
                            mkdir($diretorio);
                        }

                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        if (!move_uploaded_file($file['tmp_name'],
                            $diretorio . $file['name']) ){
                            $this->Flash->error(__('Erro ao fazer upload da logo. Please, try again.'));
                        }
                    }
                }
                */

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituicoes implementadora could not be saved. Please, try again.'));
            }
        }

        $instituicoes = $this->getInstituicoes();

        $this->set(compact('instituicoesImplementadora', 'instituicoes'));
        $this->set('_serialize', ['instituicoesImplementadora', 'instituicoes']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Instituicoes Implementadora id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $instituicoesImplementadora = $this->InstituicoesImplementadoras->get($id, [
            'contain' => ['Instituicoes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            /*
            if(!empty($this->request->data['instituicao']['logo']['name']))
            {
                $diretorio = WWW_ROOT . 'uploads' . DS . 'instituicoes' . DS . $id . DS;
                $file = $this->request->data['instituicao']['logo']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png', 'gif'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    // verifica se diretorio existe
                    if (!is_dir($diretorio)) {
                        mkdir($diretorio);
                    }

                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'],
                        $diretorio . $file['name']);

                    //prepare the filename for database entry
                    $this->request->data['logo'] = $file['name'];
                }
            }
            */

            $instituicoesImplementadora = $this->InstituicoesImplementadoras->patchEntity($instituicoesImplementadora, $this->request->data);
            if ($this->InstituicoesImplementadoras->save($instituicoesImplementadora)) {
                $this->Flash->success(__('The instituicoes implementadora has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituicoes implementadora could not be saved. Please, try again.'));
            }
        }

        $instituicoes = $this->getInstituicoes();

        $this->set(compact('instituicoesImplementadora', 'instituicoes'));
        $this->set('_serialize', ['instituicoesImplementadora', 'instituicoes']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Instituicoes Implementadora id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instituicoesImplementadora = $this->InstituicoesImplementadoras->get($id);
        $instituicoesImplementadora->ativo = 0;
        if ($this->InstituicoesImplementadoras->save($instituicoesImplementadora)) {
            $this->Flash->success(__('The instituicoes implementadora has been deleted.'));
        } else {
            $this->Flash->error(__('The instituicoes implementadora could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getInstituicoes(){
        $instituicoesTable = TableRegistry::get('Instituicoes');
        $data = $instituicoesTable->find('all');

        //debug($data); exit;

        $newData = [];

        foreach($data as $key => $data){
            $object = [];
            $object['id'] = $data['id'];
            $object['value'] = $data['id'];
            $object['label'] = $data['nome'];
            $object['razaoSocial'] = $data['razao_social'];
            $object['cnpj'] = $data['cnpj'];
            $object['endereco'] = $data['endereco'];
            $object['telefone'] = $data['telefone'];
            $object['website'] = $data['website'];
            $object['logo'] = $data['logo'];
            $newData[] = $object;
        }

        $instituicoes = json_encode($newData);

        return $instituicoes;
    }
}
