<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations
 *
 * @method \App\Model\Entity\Formation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $formations = $this->paginate($this->Formations);

        $this->set(compact('formations'));
    }

    /**
     * View method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['Positions']
        ]);

        $this->set('formation', $formation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formation = $this->Formations->newEntity();
        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $positions = $this->Formations->Positions->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'positions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['Positions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $positions = $this->Formations->Positions->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'positions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);
        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formation could not be deleted. Please, try again.'));
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
        if (in_array($action, ['add', 'positions', 'delete', 'edit','view','index'])) {
            return true;
        }
    }
}
