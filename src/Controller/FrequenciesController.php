<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frequencies Controller
 *
 * @property \App\Model\Table\FrequenciesTable $Frequencies
 *
 * @method \App\Model\Entity\Frequency[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrequenciesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $frequencies = $this->paginate($this->Frequencies);

        $this->set(compact('frequencies'));
    }

    /**
     * View method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('frequency', $frequency);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequency = $this->Frequencies->newEntity();
        if ($this->request->is('post')) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->getData());
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
        }
        $this->set(compact('frequency'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->getData());
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
        }
        $this->set(compact('frequency'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequency = $this->Frequencies->get($id);
        if ($this->Frequencies->delete($frequency)) {
            $this->Flash->success(__('The frequency has been deleted.'));
        } else {
            $this->Flash->error(__('The frequency could not be deleted. Please, try again.'));
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
