<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resultados Model
 *
 * @method \App\Model\Entity\Resultado newEmptyEntity()
 * @method \App\Model\Entity\Resultado newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Resultado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resultado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resultado findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Resultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resultado[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resultado|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resultado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resultado[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resultado[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resultado[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resultado[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ResultadosTable extends Table
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

        $this->setTable('resultados');
        $this->setDisplayField('ID_resultado');
        $this->setPrimaryKey('ID_resultado');

        $this->belongsTo('Jugadores', [
            'className' => 'Jugadores', // Asegúrate de que el nombre de la clase sea correcto
            'foreignKey' => 'ID_jugador',
        ]);
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
            ->integer('ID_jugador')
            ->allowEmptyString('ID_jugador');

        $validator
            ->integer('Jornada')
            ->requirePresence('Jornada', 'create')
            ->notEmptyString('Jornada');

        $validator
            ->integer('Puntos')
            ->requirePresence('Puntos', 'create')
            ->notEmptyString('Puntos');

        $validator
            ->integer('ID_tipo_tiro')
            ->allowEmptyString('ID_tipo_tiro');

        return $validator;
    }
}
