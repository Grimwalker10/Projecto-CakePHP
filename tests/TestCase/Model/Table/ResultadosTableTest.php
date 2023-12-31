<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResultadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResultadosTable Test Case
 */
class ResultadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResultadosTable
     */
    protected $Resultados;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Resultados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Resultados') ? [] : ['className' => ResultadosTable::class];
        $this->Resultados = $this->getTableLocator()->get('Resultados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Resultados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResultadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
