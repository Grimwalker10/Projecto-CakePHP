<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResultadosFixture
 */
class ResultadosFixture extends TestFixture
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
                'ID_resultado' => 1,
                'ID_jugador' => 1,
                'Jornada' => 1,
                'Puntos' => 1,
                'ID_tipo_tiro' => 1,
            ],
        ];
        parent::init();
    }
}
