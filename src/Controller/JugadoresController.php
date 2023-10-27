<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;
use App\PDF\ReportPDF;
/**
 * Jugadores Controller
 *
 * @property \App\Model\Table\JugadoresTable $Jugadores
 * @method \App\Model\Entity\Jugadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JugadoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $jugadores = $this->paginate($this->Jugadores, ['limit' => 5]);

        $this->set(compact('jugadores'));
    }

    public function generarPDF() {
        $this->response = $this->response->withType('application/pdf');
        $this->response = $this->response->withDownload('InformeJugadores.pdf');
        $pdf = new ReportPDF();

        // Consulta a la base de datos para obtener los jugadores agrupados por equipo
        $jugadoresPorEquipo = $this->Jugadores->find('all', [
            'contain' => 'Equipos',
        ])->toArray();

        $jugadoresAgrupados = [];
        foreach ($jugadoresPorEquipo as $jugador) {
            $equipo = $jugador['equipo']['Nombre_equipo'];
            $jugadoresAgrupados[$equipo][] = $jugador;
        }

        $pdf->generarInformeJugadoresPorEquipo($jugadoresAgrupados);

        $this->response->getBody()->write($pdf->Output('S'));
        return $this->response;
    }

    /**
     * View method
     *
     * @param string|null $id Jugadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jugadore = $this->Jugadores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('jugadore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jugadore = $this->Jugadores->newEmptyEntity();
        if ($this->request->is('post')) {

            $jugadore = $this->Jugadores->patchEntity($jugadore, $this->request->getData());

            //Agregar imagen jugador
            $imagen=$this->request->getData('Fotografia');

            if($imagen){
                $tiempo=FrozenTime::now()->toUnixString();

                $nombreImagen=$tiempo."_".$imagen->getClientFileName();
                $destino=WWW_ROOT.'img/Jugadores/'.$nombreImagen;
                $imagen->moveTo($destino);
                $jugadore->Fotografia=$nombreImagen;
            }


            if ($this->Jugadores->save($jugadore)) {
                $this->Flash->success(__('The jugadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jugadore could not be saved. Please, try again.'));
        }
        $this->set(compact('jugadore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Jugadore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jugadore = $this->Jugadores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nombreImagenAnterior = $jugadore->Fotografia;

            $jugadore = $this->Jugadores->patchEntity($jugadore, $this->request->getData());

            $imagen=$this->request->getData('Fotografia');

            $jugadore->Fotografia=$nombreImagenAnterior;

            if($imagen->getClientFileName()){
                if(file_exists(WWW_ROOT.'img/Jugadores/'.$nombreImagenAnterior)){            
                    unlink(WWW_ROOT.'img/Jugadores/'.$nombreImagenAnterior);
                }
                $tiempo=FrozenTime::now()->toUnixString();

                $nombreImagen=$tiempo."_".$imagen->getClientFileName();
                $destino=WWW_ROOT.'img/Jugadores/'.$nombreImagen;
                $imagen->moveTo($destino);
                $jugadore->Fotografia=$nombreImagen;
            }

            if ($this->Jugadores->save($jugadore)) {
                $this->Flash->success(__('The jugadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jugadore could not be saved. Please, try again.'));
        }
        $this->set(compact('jugadore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jugadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jugadore = $this->Jugadores->get($id);

        if(file_exists(WWW_ROOT.'img/Jugadores/'.$jugadore['Fotografia'])){
            
            unlink(WWW_ROOT.'img/Jugadores/'.$jugadore['Fotografia']);
        }

        if ($this->Jugadores->delete($jugadore)) {
            $this->Flash->success(__('The jugadore has been deleted.'));
        } else {
            $this->Flash->error(__('The jugadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
