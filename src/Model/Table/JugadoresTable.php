<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jugadores Model
 *
 * @method \App\Model\Entity\Jugadore newEmptyEntity()
 * @method \App\Model\Entity\Jugadore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Jugadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jugadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jugadore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Jugadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jugadore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jugadore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jugadore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jugadore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Jugadore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Jugadore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Jugadore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class JugadoresTable extends Table
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

        $this->setTable('jugadores');
        $this->setDisplayField('Nombres');
        $this->setPrimaryKey('ID_jugador');

                // Define la relación con la tabla Equipos
                $this->belongsTo('Equipos', [
                    'foreignKey' => 'ID_equipo',
                    'joinType' => 'INNER',
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
            ->scalar('Nombres')
            ->maxLength('Nombres', 255)
            ->requirePresence('Nombres', 'create')
            ->notEmptyString('Nombres');

        $validator
            ->scalar('Apellidos')
            ->maxLength('Apellidos', 255)
            ->requirePresence('Apellidos', 'create')
            ->notEmptyString('Apellidos');

        $validator
            ->date('Fecha_Nacimiento')
            ->requirePresence('Fecha_Nacimiento', 'create')
            ->notEmptyDate('Fecha_Nacimiento');

        $validator
            ->scalar('Fotografia')
            ->maxLength('Fotografia', 255)
            ->allowEmptyString('Fotografia');

        $validator
            ->integer('ID_equipo')
            ->allowEmptyString('ID_equipo');

        return $validator;
    }
}
