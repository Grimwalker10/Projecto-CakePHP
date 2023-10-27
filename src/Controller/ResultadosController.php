<?php
declare(strict_types=1);

namespace App\Controller;
use App\PDF\ReportPDF;
use App\Model\Table\JugadoresTable;
/**
 * Resultados Controller
 *
 * @property \App\Model\Table\ResultadosTable $Resultados
 * @method \App\Model\Entity\Resultado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResultadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $resultados = $this->paginate($this->Resultados);

        $this->set(compact('resultados'));
    }


    public function generarPDF() {
        $this->response = $this->response->withType('application/pdf');
        $this->response = $this->response->withDownload('InformeMaximoAnotadores.pdf');
        $pdf = new ReportPDF();
    
        // Obtener los máximos anotadores (código de consulta en Resultados)
        $resultados = $this->Resultados->find()
            ->contain(['Jugadores']) // Asegúrate de que la relación esté configurada correctamente
            ->order(['Resultados.Puntos' => 'DESC'])
            ->toArray();
        $pdf->generarInformeMaximoAnotadores($resultados);
    
        $this->response->getBody()->write($pdf->Output('S'));
        return $this->response;
    }
    


    /**
     * View method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resultado = $this->Resultados->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('resultado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resultado = $this->Resultados->newEmptyEntity();
        if ($this->request->is('post')) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->getData());
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('The resultado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resultado could not be saved. Please, try again.'));
        }
        $this->set(compact('resultado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resultado = $this->Resultados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->getData());
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('The resultado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resultado could not be saved. Please, try again.'));
        }
        $this->set(compact('resultado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resultado = $this->Resultados->get($id);
        if ($this->Resultados->delete($resultado)) {
            $this->Flash->success(__('The resultado has been deleted.'));
        } else {
            $this->Flash->error(__('The resultado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
