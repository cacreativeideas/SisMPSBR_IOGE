<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Reunioes Controller
 *
 * @property \App\Model\Table\ReunioesTable $Reunioes
 */
class ReunioesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reunioes = $this->Reunioes->find('all')
            ->contain(['InstituicoesImplementadoras',
                'UnidadesOrganizacionais.Empresas'])
            ->where(['InstituicoesImplementadoras.id' => $this->request->session()->read('InstituicoesImplementadoras.id')])
            ->andWhere(['Reunioes.ativo' => 1]);

        $reunioes = $this->paginate($reunioes);

        $this->set(compact('reunioes'));
        $this->set('_serialize', ['reunioes']);
    }

    /**
     * View method
     *
     * @param string|null $id Reuniao id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reuniao = $this->Reunioes->get($id, [
            'contain' => ['InstituicoesImplementadoras', 'UnidadesOrganizacionais.Empresas', 'Acoes']
        ]);

        $this->set('reuniao', $reuniao);
        $this->set('_serialize', ['reuniao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reuniao = $this->Reunioes->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['instituicao_implementadora_id'] = $this->request->session()->read('InstituicoesImplementadoras.id');
            $reuniao = $this->Reunioes->patchEntity($reuniao, $this->request->data);

            //$reuniao->instituicao_implementadora_id = $this->request->session()->read('InstituicoesImplementadoras.id');

            if ($this->Reunioes->save($reuniao)) {
                $this->Flash->success(__('The reuniao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reuniao could not be saved. Please, try again.'));
            }
        }
      
        //$instituicoesImplementadoras = $this->Reunioes->InstituicoesImplementadoras->find('list', ['limit' => 200]);
        //$consultores = $this->Reunioes->Consultores->find('list', ['limit' => 200]);
        //$unidadesOrganizacionais = $this->Reunioes->UnidadesOrganizacionais->find('list', ['limit' => 200]);
        
        $projetos = TableRegistry::get('Projetos')->find('list', [
          'keyField' => function ($e) {
              return $e->unidades_organizacional->id;
          },
          'valueField' => function ($e) {
              return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
          }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);
      
        $this->set(compact('reuniao', 'instituicoesImplementadoras', 'consultores', 'unidadesOrganizacionais', 'projetos'));
        $this->set('_serialize', ['reuniao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reuniao id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reuniao = $this->Reunioes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['instituicao_implementadora_id'] = $this->request->session()->read('InstituicoesImplementadoras.id');

            $reuniao = $this->Reunioes->patchEntity($reuniao, $this->request->data);
            //$reuniao->instituicao_implementadora_id = $this->request->session()->read('Instituicoesimplementadoras.id');

            if ($this->Reunioes->save($reuniao)) {
                $this->Flash->success(__('The reuniao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reuniao could not be saved. Please, try again.'));
            }
        }
        
        $projetos = TableRegistry::get('Projetos')->find('list', [
          'keyField' => function ($e) {
              return $e->unidades_organizacional->id;
          },
          'valueField' => function ($e) {
              return $e->grupos_empresa->nome." - ".$e->unidades_organizacional->empresa->nome." - ".$e->unidades_organizacional->nome;
          }
        ])
        ->contain(['GruposEmpresas.InstituicoesOrganizadoras', 'UnidadesOrganizacionais.Empresas'])
        ->where(['InstituicoesOrganizadoras.id' => $this->request->session()->read('InstituicoesOrganizadoras.id')]);
      
        $this->set(compact('reuniao', 'instituicoesImplementadoras', 'consultores', 'unidadesOrganizacionais', 'projetos'));
        $this->set('_serialize', ['reuniao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reuniao id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reuniao = $this->Reunioes->get($id);
        $reuniao->ativo = 0;
        if ($this->Reunioes->save($reuniao)) {
            $this->Flash->success(__('The reuniao has been deleted.'));
        } else {
            $this->Flash->error(__('The reuniao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
