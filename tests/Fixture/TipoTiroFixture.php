<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TipoTiroFixture
 */
class TipoTiroFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tipo_tiro';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ID_tipo_tiro' => 1,
                'Nombre' => 'Lorem ipsum dolor sit amet',
                'Puntaje' => 1,
            ],
        ];
        parent::init();
    }
}
