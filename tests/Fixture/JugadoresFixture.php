<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JugadoresFixture
 */
class JugadoresFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ID_jugador' => 1,
                'Nombres' => 'Lorem ipsum dolor sit amet',
                'Apellidos' => 'Lorem ipsum dolor sit amet',
                'Fecha_Nacimiento' => '2023-10-25',
                'Fotografia' => 'Lorem ipsum dolor sit amet',
                'ID_equipo' => 1,
            ],
        ];
        parent::init();
    }
}
