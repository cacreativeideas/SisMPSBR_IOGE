<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 */
class EmpresasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $empresas = $this->Empresas->find('all')
            ->contain(['InstituicoesOrganizadoras'])
            ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')])
            ->andWhere(['Empresas.ativo' => 1]);

        $empresas = $this->paginate($empresas);

        $this->set(compact('empresas'));
        $this->set('_serialize', ['empresas']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['instituicao_organizadora_id'] = $this->request->session()->read('InstituicoesOrganizadoras.id');

            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));
                /*
                if(!empty($this->request->data['logo']['name']))
                {
                    $id = $this->Empresas->id;

                    $diretorio = WWW_ROOT . 'uploads' . DS . 'empresas' . DS . $id . DS;
                    $file = $this->request->data['empresas']['logo']; //put the data into a var for easy use

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

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }
        //$gruposEmpresas = $this->Empresas->GruposEmpresas->find('list', ['limit' => 200]);
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['instituicao_organizadora_id'] = $this->request->session()->read('InstituicoesOrganizadoras.id');
            
            /*
            if(!empty($this->request->data['logo']['name']))
            {
                $diretorio = WWW_ROOT . 'uploads' . DS . 'empresas' . DS . $id . DS;
                $file = $this->request->data['empresas']['logo']; //put the data into a var for easy use

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

            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        $empresa->ativo = 0;
        if ($this->Empresas->save($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function validarCnpj(){
        if ($this->request->is(['ajax', 'post'])) {
            $this->viewBuilder()->layout('ajax');

            $isValid = false;
            $cnpj = $this->request->input('json_decode', true);

            $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

            $isValid = $this->checkCnpj($cnpj);

        }
        $this->set(compact('isValid'));
    }

    public function checkCnpj($cnpj){

        //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
        $j=0;
        for($i=0; $i<(strlen($cnpj)); $i++)
        {
            if(is_numeric($cnpj[$i]))
            {
                $num[$j]=$cnpj[$i];
                $j++;
            }
        }

        //Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
        if(count($num)!=14)
        {
            $isCnpjValid=false;
        }

        //Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após
        // o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
        if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 &&
            $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0){
            $isCnpjValid=false;
        }

        //Etapa 4: Calcula e compara o primeiro dígito verificador.
        else{
            $j=5;
            for($i=0; $i<4; $i++){
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $j=9;
            for($i=4; $i<12; $i++){
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2){
                $dg=0;
            }
            else{
                $dg=11-$resto;
            }
            if($dg!=$num[12]){
                $isCnpjValid=false;
            }
        }
        //Etapa 5: Calcula e compara o segundo dígito verificador.
        if(!isset($isCnpjValid)){
            $j=6;

            for($i=0; $i<5; $i++){
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $j=9;

            for($i=5; $i<13; $i++){
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }

            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2){
                $dg=0;
            }

            else{
                $dg=11-$resto;
            }

            if($dg!=$num[13]){
                $isCnpjValid=false;
            }

            else{
                $isCnpjValid=true;
            }
        }
        
        //Etapa 6: Retorna o Resultado em um valor booleano.
        return $isCnpjValid;
    }
}
