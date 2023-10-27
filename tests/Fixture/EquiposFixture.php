<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EquiposFixture
 */
class EquiposFixture extends TestFixture
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
                'ID_equipo' => 1,
                'Nombre_equipo' => 'Lorem ipsum dolor sit amet',
                'Logo_equipo' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
