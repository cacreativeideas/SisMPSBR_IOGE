<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Instituicoes Controller
 *
 * @property \App\Model\Table\InstituicoesTable $Instituicoes
 */
class InstituicoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $instituicoes = $this->paginate($this->Instituicoes);

        $this->set(compact('instituicoes'));
        $this->set('_serialize', ['instituicoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Instituicao id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instituicao = $this->Instituicoes->get($id, [
            'contain' => ['InstituicoesImplementadoras', 'InstituicoesOrganizadoras']
        ]);

        $this->set('instituicao', $instituicao);
        $this->set('_serialize', ['instituicao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $instituicao = $this->Instituicoes->newEntity();
        if ($this->request->is('post')) {
            $instituicao = $this->Instituicoes->patchEntity($instituicao, $this->request->data);
            if ($this->Instituicoes->save($instituicao)) {
                $this->Flash->success(__('The instituicao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituicao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('instituicao'));
        $this->set('_serialize', ['instituicao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Instituicao id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $instituicao = $this->Instituicoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['logo']['name']))
            {
                $diretorio = WWW_ROOT . 'uploads' . DS . 'instituicoes' . DS . $id . DS;
                $file = $this->request->data['logo']; //put the data into a var for easy use

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

            $instituicao = $this->Instituicoes->patchEntity($instituicao, $this->request->data);
            if ($this->Instituicoes->save($instituicao)) {
                $this->Flash->success(__('The instituicao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituicao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('instituicao'));
        $this->set('_serialize', ['instituicao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Instituicao id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instituicao = $this->Instituicoes->get($id);
        if ($this->Instituicoes->delete($instituicao)) {
            $this->Flash->success(__('The instituicao has been deleted.'));
        } else {
            $this->Flash->error(__('The instituicao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
