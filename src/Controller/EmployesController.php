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
            'contain' => ['Users', 'Positions', 'Buildings', 'Civilities', 'Languages']
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
            'contain' => ['Users', 'Positions', 'Buildings', 'Civilities', 'Languages', 'Formations']
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
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $users = $this->Employes->Users->find('list', ['limit' => 200]);
        $positions = $this->Employes->Positions->find('list', ['limit' => 200]);
        $buildings = $this->Employes->Buildings->find('list', ['limit' => 200]);
        $civilities = $this->Employes->Civilities->find('list', ['limit' => 200]);
        $languages = $this->Employes->Languages->find('list', ['limit' => 200]);
        $formations = $this->Employes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'users', 'positions', 'buildings', 'civilities', 'languages', 'formations'));
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
            'contain' => ['Formations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $users = $this->Employes->Users->find('list', ['limit' => 200]);
        $positions = $this->Employes->Positions->find('list', ['limit' => 200]);
        $buildings = $this->Employes->Buildings->find('list', ['limit' => 200]);
        $civilities = $this->Employes->Civilities->find('list', ['limit' => 200]);
        $languages = $this->Employes->Languages->find('list', ['limit' => 200]);
        $formations = $this->Employes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'users', 'positions', 'buildings', 'civilities', 'languages', 'formations'));
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
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['index','add', 'edit', 'delete','view'])) {
            return true;
        }
    }
}
