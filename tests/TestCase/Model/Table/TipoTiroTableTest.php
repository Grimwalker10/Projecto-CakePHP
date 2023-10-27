<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoTiroTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoTiroTable Test Case
 */
class TipoTiroTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoTiroTable
     */
    protected $TipoTiro;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TipoTiro',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TipoTiro') ? [] : ['className' => TipoTiroTable::class];
        $this->TipoTiro = $this->getTableLocator()->get('TipoTiro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TipoTiro);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipoTiroTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
