<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;
use App\PDF\ReportPDF;
use App\Model\Table\JugadoresTable;
use Cake\ORM\Query;

/**
 * Equipos Controller
 *
 * @property \App\Model\Table\EquiposTable $Equipos
 * @method \App\Model\Entity\Equipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $equipos = $this->paginate($this->Equipos, ['limit' => 4]);

        $this->set(compact('equipos'));
    }

    public function generarInforme($equipoId) {
        $this->response = $this->response->withType('application/pdf');
        $this->response = $this->response->withDownload('InformeJugadoresEquipo.pdf');
        $pdf = new ReportPDF();

        // Obtén el equipo y sus jugadores relacionados, y ordénalos por apellidos
        $equipo = $this->Equipos->get($equipoId, ['contain' => ['Jugadores' => function (Query $q) {
            return $q->order(['Apellidos' => 'ASC']);
        }]]);
        
        $jugadores = $equipo->jugadores;

        $pdf->generarInformeJugadores($jugadores);

        $this->response->getBody()->write($pdf->Output('S'));
        return $this->response;
    }

    /**
     * View method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('equipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipos->newEmptyEntity();
        if ($this->request->is('post')) {

            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());

            //Agregar imagen del equipo
            $imagen=$this->request->getData('Logo_equipo');

            if($imagen){
                $tiempo=FrozenTime::now()->toUnixString();

                $nombreImagen=$tiempo."_".$imagen->getClientFileName();
                $destino=WWW_ROOT.'img/Equipos/'.$nombreImagen;
                $imagen->moveTo($destino);
                $equipo->Logo_equipo=$nombreImagen;
            }



            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nombreImagenAnterior = $equipo->Logo_equipo;

            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());

            $imagen=$this->request->getData('Logo_equipo');
 
            $equipo->Logo_equipo=$nombreImagenAnterior;

            if($imagen->getClientFileName()){
                if(file_exists(WWW_ROOT.'img/Equipos/'.$nombreImagenAnterior)){            
                    unlink(WWW_ROOT.'img/Equipos/'.$nombreImagenAnterior);
                }
                $tiempo=FrozenTime::now()->toUnixString();

                $nombreImagen=$tiempo."_".$imagen->getClientFileName();
                $destino=WWW_ROOT.'img/Equipos/'.$nombreImagen;
                $imagen->moveTo($destino);
                $equipo->Logo_equipo=$nombreImagen;
            }


            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $equipo = $this->Equipos->get($id);

        if(file_exists(WWW_ROOT.'img/Equipos/'.$equipo['Logo_equipo'])){
            
            unlink(WWW_ROOT.'img/Equipos/'.$equipo['Logo_equipo']);
        }

        if ($this->Equipos->delete($equipo)) {
            $this->Flash->success(__('The equipo has been deleted.'));
        } else {
            $this->Flash->error(__('The equipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
