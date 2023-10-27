<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TipoTiro Controller
 *
 * @property \App\Model\Table\TipoTiroTable $TipoTiro
 * @method \App\Model\Entity\TipoTiro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoTiroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tipoTiro = $this->paginate($this->TipoTiro);

        $this->set(compact('tipoTiro'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Tiro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoTiro = $this->TipoTiro->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tipoTiro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoTiro = $this->TipoTiro->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoTiro = $this->TipoTiro->patchEntity($tipoTiro, $this->request->getData());
            if ($this->TipoTiro->save($tipoTiro)) {
                $this->Flash->success(__('The tipo tiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo tiro could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoTiro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Tiro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoTiro = $this->TipoTiro->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoTiro = $this->TipoTiro->patchEntity($tipoTiro, $this->request->getData());
            if ($this->TipoTiro->save($tipoTiro)) {
                $this->Flash->success(__('The tipo tiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo tiro could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoTiro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Tiro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoTiro = $this->TipoTiro->get($id);
        if ($this->TipoTiro->delete($tipoTiro)) {
            $this->Flash->success(__('The tipo tiro has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo tiro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
