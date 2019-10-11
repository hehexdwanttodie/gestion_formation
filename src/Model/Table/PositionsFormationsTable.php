<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionsFormations Model
 *
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsTo $Formations
 *
 * @method \App\Model\Entity\PositionsFormation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionsFormation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionsFormation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionsFormation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsFormation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsFormation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsFormation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsFormation findOrCreate($search, callable $callback = null, $options = [])
 */
class PositionsFormationsTable extends Table
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

        $this->setTable('positions_formations');
        $this->setDisplayField('position_id');
        $this->setPrimaryKey(['position_id', 'formation_id']);

        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));

        return $rules;
    }
}
