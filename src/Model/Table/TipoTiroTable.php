<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoTiro Model
 *
 * @method \App\Model\Entity\TipoTiro newEmptyEntity()
 * @method \App\Model\Entity\TipoTiro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TipoTiro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoTiro get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoTiro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TipoTiro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoTiro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoTiro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoTiro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoTiro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoTiro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoTiro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoTiro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TipoTiroTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tipo_tiro');
        $this->setDisplayField('Nombre');
        $this->setPrimaryKey('ID_tipo_tiro');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('Nombre')
            ->maxLength('Nombre', 50)
            ->requirePresence('Nombre', 'create')
            ->notEmptyString('Nombre');

        $validator
            ->integer('Puntaje')
            ->requirePresence('Puntaje', 'create')
            ->notEmptyString('Puntaje');

        return $validator;
    }
}
