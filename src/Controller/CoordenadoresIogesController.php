<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CoordenadoresIoges Controller
 *
 * @property \App\Model\Table\CoordenadoresIogesTable $CoordenadoresIoges
 */
class CoordenadoresIogesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $coordenadoresIoges = $this->CoordenadoresIoges->find('all')
            ->contain(['InstituicoesOrganizadoras.Instituicoes', 'Usuarios'])
            ->where(['InstituicoesOrganizadoras.ativo' => 1])
            ->andWhere(['CoordenadoresIoges.ativo' => 1]);

        $coordenadoresIoges = $this->paginate($coordenadoresIoges);

        $this->set(compact('coordenadoresIoges'));
        $this->set('_serialize', ['coordenadoresIoges']);
    }

    /**
     * View method
     *
     * @param string|null $id Coordenadores Ioge id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coordenadoresIoge = $this->CoordenadoresIoges->get($id, [
            'contain' => ['InstituicoesOrganizadoras', 'Usuarios']
        ]);

        $this->set('coordenadoresIoge', $coordenadoresIoge);
        $this->set('_serialize', ['coordenadoresIoge']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coordenadoresIoge = $this->CoordenadoresIoges->newEntity();
        if ($this->request->is('post')) {
            $coordenadoresIoge = $this->CoordenadoresIoges->patchEntity($coordenadoresIoge,
                $this->request->data,
                ['associated'=>['Usuarios']]);

            $coordenadoresIoge['usuario']['role'] = 'coord_ioge';
            $coordenadoresIoge['usuario']['cod_verificador'] = md5(md5($coordenadoresIoge['usuario']['email']));
          
            //teste
            $coordenadoresIoge['usuario']['password'] = 'teste';

            if ($this->CoordenadoresIoges->save($coordenadoresIoge)) {
                /*
                $to = $coordenadoresIoge->usuario->email;

                $email = new Email();

                $email->transport('gmail');

                $email
                    ->template('confirm_email')
                    ->emailFormat('html');

                $email
                    ->to($to);

                $email->viewVars(['nome' => $coordenadoresIoge->usuario->nome]);
                $email->viewVars(['cod_verificador' => $coordenadoresIoge->usuario->cod_verificador]);

                $email->send();
                */
              
                $this->Flash->success(__('The coordenadores ioge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coordenadores ioge could not be saved. Please, try again.'));
            }
        }

        $instituicoesOrganizadoras = TableRegistry::get('InstituicoesOrganizadoras')->find('list',[
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->where(['InstituicoesOrganizadoras.ativo' => 1])
            ->contain(['Instituicoes']);

        $this->set(compact('coordenadoresIoge', 'instituicoesOrganizadoras'));
        $this->set('_serialize', ['coordenadoresIoge']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coordenadores Ioge id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coordenadoresIoge = $this->CoordenadoresIoges->get($id, [
            'contain' => ['InstituicoesOrganizadoras', 'Usuarios']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coordenadoresIoge = $this->CoordenadoresIoges->patchEntity($coordenadoresIoge, $this->request->data);

            if ($this->CoordenadoresIoges->save($coordenadoresIoge)) {
                $this->Flash->success(__('The coordenadores ioge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coordenadores ioge could not be saved. Please, try again.'));
            }
        }

        $instituicoesOrganizadoras = TableRegistry::get('InstituicoesOrganizadoras')->find('list',[
            'keyField' => 'id',
            'valueField' => 'instituicao.nome'])
            ->where(['InstituicoesOrganizadoras.ativo' => 1])
            ->contain(['Instituicoes']);

        $this->set(compact('coordenadoresIoge', 'instituicoesOrganizadoras'));
        $this->set('_serialize', ['coordenadoresIoge']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coordenadores Ioge id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coordenadoresIoge = $this->CoordenadoresIoges->get($id,
            ['contain' => ['Usuarios']]);

        $coordenadoresIoge->ativo = 0;
        $coordenadoresIoge->Usuarios->ativo = 0;

        if ($this->CoordenadoresIoges->save($coordenadoresIoge)) {

            $this->Flash->success(__('The coordenadores ioge has been deleted.'));
        } else {
            $this->Flash->error(__('The coordenadores ioge could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
