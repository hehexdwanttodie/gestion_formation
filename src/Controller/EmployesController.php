<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employes Controller
 *
 * @property \App\Model\Table\EmployesTable $Employes
 *
 * @method \App\Model\Entity\Employe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Users', 'Buildings']
        ];
        $employes = $this->paginate($this->Employes);

        $this->set(compact('employes'));
    }

    /**
     * View method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => ['Positions', 'Users', 'Buildings']
        ]);

        $this->set('employe', $employe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employe = $this->Employes->newEntity();
        if ($this->request->is('post')) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());

            $employe->user_id = $this->Auth->user('id');
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $buildings = $this->Employes->Buildings->find('list', ['limit' => 200]);
        $positions = $this->Employes->Positions->find('list', ['limit' => 200]);
        $users = $this->Employes->Users->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'positions', 'users', 'buildings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData(),[
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $buildings = $this->Employes->Buildings->find('list', ['limit' => 200]);
        $positions = $this->Employes->Positions->find('list', ['limit' => 200]);
        $users = $this->Employes->Users->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'positions', 'users', 'buildings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employe = $this->Employes->get($id);
        if ($this->Employes->delete($employe)) {
            $this->Flash->success(__('The employe has been deleted.'));
        } else {
            $this->Flash->error(__('The employe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([]);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['add','positions','delete','edit','view','index'])) {
            return true;
        }
    }
}
