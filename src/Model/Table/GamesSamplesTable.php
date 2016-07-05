<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GamesSamples Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Samples
 * @property \Cake\ORM\Association\BelongsTo $Games
 *
 * @method \App\Model\Entity\GamesSample get($primaryKey, $options = [])
 * @method \App\Model\Entity\GamesSample newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GamesSample[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GamesSample|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GamesSample patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GamesSample[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GamesSample findOrCreate($search, callable $callback = null)
 */
class GamesSamplesTable extends Table
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

        $this->table('games_samples');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Samples', [
            'foreignKey' => 'sample_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Games', [
            'foreignKey' => 'game_id',
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
        $rules->add($rules->existsIn(['sample_id'], 'Samples'));
        $rules->add($rules->existsIn(['game_id'], 'Games'));
        return $rules;
    }
}
