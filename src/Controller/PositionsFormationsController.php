<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PositionsFormations Controller
 *
 * @property \App\Model\Table\PositionsFormationsTable $PositionsFormations
 *
 * @method \App\Model\Entity\PositionsFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PositionsFormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Formations']
        ];
        $positionsFormations = $this->paginate($this->PositionsFormations);

        $this->set(compact('positionsFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Positions Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positionsFormation = $this->PositionsFormations->get($id, [
            'contain' => ['Positions', 'Formations']
        ]);

        $this->set('positionsFormation', $positionsFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionsFormation = $this->PositionsFormations->newEntity();
        if ($this->request->is('post')) {
            $positionsFormation = $this->PositionsFormations->patchEntity($positionsFormation, $this->request->getData());
            if ($this->PositionsFormations->save($positionsFormation)) {
                $this->Flash->success(__('The positions formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The positions formation could not be saved. Please, try again.'));
        }
        $positions = $this->PositionsFormations->Positions->find('list', ['limit' => 200]);
        $formations = $this->PositionsFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionsFormation', 'positions', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Positions Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positionsFormation = $this->PositionsFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positionsFormation = $this->PositionsFormations->patchEntity($positionsFormation, $this->request->getData());
            if ($this->PositionsFormations->save($positionsFormation)) {
                $this->Flash->success(__('The positions formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The positions formation could not be saved. Please, try again.'));
        }
        $positions = $this->PositionsFormations->Positions->find('list', ['limit' => 200]);
        $formations = $this->PositionsFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionsFormation', 'positions', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Positions Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positionsFormation = $this->PositionsFormations->get($id);
        if ($this->PositionsFormations->delete($positionsFormation)) {
            $this->Flash->success(__('The positions formation has been deleted.'));
        } else {
            $this->Flash->error(__('The positions formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['index','display','add', 'edit', 'delete','view'])) {
            return true;
        }
    }
}
