<?php

namespace App\Controller;

use App\Controller\AppController;

class ReportsController extends AppController {

    public function playerListByTeam() {
        $this->loadModel('jugadores'); // Cargar el modelo de jugadores
        $jugadore = $this->Jugadores->find('all')
            ->contain(['ID_equipo']) // Asegurarse de que se incluyan los equipos de los jugadores
            ->order(['equipos.Nombre_equipo' => 'ASC', 'jugadores.Apellido' => 'ASC'])
            ->toArray();

        $this->set(compact('jugadores'));
    }
}

?>