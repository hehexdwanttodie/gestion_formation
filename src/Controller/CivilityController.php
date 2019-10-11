<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Civility Controller
 *
 * @property \App\Model\Table\CivilityTable $Civility
 *
 * @method \App\Model\Entity\Civility[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CivilityController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $civility = $this->paginate($this->Civility);

        $this->set(compact('civility'));
    }

    /**
     * View method
     *
     * @param string|null $id Civility id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $civility = $this->Civility->get($id, [
            'contain' => ['Employes']
        ]);

        $this->set('civility', $civility);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $civility = $this->Civility->newEntity();
        if ($this->request->is('post')) {
            $civility = $this->Civility->patchEntity($civility, $this->request->getData());
            if ($this->Civility->save($civility)) {
                $this->Flash->success(__('The civility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civility could not be saved. Please, try again.'));
        }
        $this->set(compact('civility'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Civility id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $civility = $this->Civility->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $civility = $this->Civility->patchEntity($civility, $this->request->getData());
            if ($this->Civility->save($civility)) {
                $this->Flash->success(__('The civility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civility could not be saved. Please, try again.'));
        }
        $this->set(compact('civility'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Civility id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $civility = $this->Civility->get($id);
        if ($this->Civility->delete($civility)) {
            $this->Flash->success(__('The civility has been deleted.'));
        } else {
            $this->Flash->error(__('The civility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
