<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployesFormations Controller
 *
 * @property \App\Model\Table\EmployesFormationsTable $EmployesFormations
 *
 * @method \App\Model\Entity\EmployesFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployesFormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employes', 'Formations']
        ];
        $employesFormations = $this->paginate($this->EmployesFormations);

        $this->set(compact('employesFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Employes Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employesFormation = $this->EmployesFormations->get($id, [
            'contain' => ['Employes', 'Formations']
        ]);

        $this->set('employesFormation', $employesFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employesFormation = $this->EmployesFormations->newEntity();
        if ($this->request->is('post')) {
            $employesFormation = $this->EmployesFormations->patchEntity($employesFormation, $this->request->getData());
            if ($this->EmployesFormations->save($employesFormation)) {
                $this->Flash->success(__('The employes formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employes formation could not be saved. Please, try again.'));
        }
        $employes = $this->EmployesFormations->Employes->find('list', ['limit' => 200]);
        $formations = $this->EmployesFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employesFormation', 'employes', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employes Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employesFormation = $this->EmployesFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employesFormation = $this->EmployesFormations->patchEntity($employesFormation, $this->request->getData());
            if ($this->EmployesFormations->save($employesFormation)) {
                $this->Flash->success(__('The employes formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employes formation could not be saved. Please, try again.'));
        }
        $employes = $this->EmployesFormations->Employes->find('list', ['limit' => 200]);
        $formations = $this->EmployesFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employesFormation', 'employes', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employes Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employesFormation = $this->EmployesFormations->get($id);
        if ($this->EmployesFormations->delete($employesFormation)) {
            $this->Flash->success(__('The employes formation has been deleted.'));
        } else {
            $this->Flash->error(__('The employes formation could not be deleted. Please, try again.'));
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
