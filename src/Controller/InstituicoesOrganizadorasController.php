<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * InstituicoesOrganizadoras Controller
 *
 * @property \App\Model\Table\InstituicoesOrganizadorasTable $InstituicoesOrganizadoras
 */
class InstituicoesOrganizadorasController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add']);
    }

    public function dashboard()
    {

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $instituicoesOrganizadoras = $this->InstituicoesOrganizadoras->find('all')
            ->contain(['Instituicoes'])
            ->where(['InstituicoesOrganizadoras.ativo' => 1]);

        $instituicoesOrganizadoras = $this->paginate($instituicoesOrganizadoras);

        $this->set(compact('instituicoesOrganizadoras'));
        $this->set('_serialize', ['instituicoesOrganizadoras']);
    }

    /**
     * View method
     *
     * @param string|null $id Instituicoes Organizadora id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->get($id, [
            'contain' => ['Instituicoes']
        ]);

        $this->set('instituicoesOrganizadora', $instituicoesOrganizadora);
        $this->set('_serialize', ['instituicoesOrganizadora']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->data['instituicao']['logo']['name']))
            {
                $file = $this->request->data['instituicao']['logo']; //put the data into a var for easy use
                $this->request->data['logo'] = $file['name'];
            }

            $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->patchEntity($instituicoesOrganizadora,
                $this->request->data,
                ['associated'=>['Instituicoes']]
            );
            if ($this->InstituicoesOrganizadoras->save($instituicoesOrganizadora)) {
                $this->Flash->success(__('The instituicoes organizadora has been saved.'));
                
                /*
                if(!empty($this->request->data['instituicao']['logo']['name']))
                {
                    $id = $this->InstituicoesOrganizadoras->Instituicoes->id;
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
                $this->Flash->error(__('The instituicoes organizadora could not be saved. Please, try again.'));
            }
        }

        $instituicoes = $this->getInstituicoes();

        $this->set(compact('instituicoesOrganizadora', 'instituicoes'));
        $this->set('_serialize', ['instituicoesOrganizadora', 'instituicoes']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Instituicoes Organizadora id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->get($id, [
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

            $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->patchEntity($instituicoesOrganizadora, $this->request->data);
            if ($this->InstituicoesOrganizadoras->save($instituicoesOrganizadora)) {
                $this->Flash->success(__('The instituicoes organizadora has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituicoes organizadora could not be saved. Please, try again.'));
            }
        }

        $instituicoes = $this->getInstituicoes();

        $this->set(compact('instituicoesOrganizadora', 'instituicoes'));
        $this->set('_serialize', ['instituicoesOrganizadora', 'instituicoes']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Instituicoes Organizadora id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instituicoesOrganizadora = $this->InstituicoesOrganizadoras->get($id);
        $instituicoesOrganizadora->ativo = 0;
        if ($this->InstituicoesOrganizadoras->save($instituicoesOrganizadora)) {
            $this->Flash->success(__('The instituicoes organizadora has been deleted.'));
        } else {
            $this->Flash->error(__('The instituicoes organizadora could not be deleted. Please, try again.'));
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
            $object['value'] = $data['id'];
            $object['label'] = $data['nome'];
            $object['id'] = $data['id'];
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
