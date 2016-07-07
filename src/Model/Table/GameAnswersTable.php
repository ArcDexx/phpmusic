<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GameAnswers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $GameUsers
 * @property \Cake\ORM\Association\BelongsTo $Samples
 *
 * @method \App\Model\Entity\GameAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\GameAnswer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GameAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GameAnswer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GameAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GameAnswer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GameAnswer findOrCreate($search, callable $callback = null)
 */
class GameAnswersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('game_answers');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('GameUsers', [
            'foreignKey' => 'game_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Samples', [
            'foreignKey' => 'sample_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('artist')
            ->requirePresence('artist', 'create')
            ->notEmpty('artist');

        $validator
            ->boolean('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['game_user_id'], 'GameUsers'));
        $rules->add($rules->existsIn(['sample_id'], 'Samples'));
        return $rules;
    }
}
