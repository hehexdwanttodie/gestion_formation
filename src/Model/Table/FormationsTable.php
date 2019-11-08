<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\FrequenciesTable&\Cake\ORM\Association\BelongsTo $Frequencies
 * @property \App\Model\Table\ModalitiesTable&\Cake\ORM\Association\BelongsTo $Modalities
 * @property \App\Model\Table\RemindersTable&\Cake\ORM\Association\BelongsTo $Reminders
 * @property \App\Model\Table\EmployesTable&\Cake\ORM\Association\BelongsToMany $Employes
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsToMany $Positions
 *
 * @method \App\Model\Entity\Formation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormationsTable extends Table
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

        $this->setTable('formations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modalities', [
            'foreignKey' => 'modality_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Reminders', [
            'foreignKey' => 'reminder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Employes', [
            'foreignKey' => 'formation_id',
            'targetForeignKey' => 'employe_id',
            'joinTable' => 'employes_formations'
        ]);
        $this->belongsToMany('Positions', [
            'foreignKey' => 'formation_id',
            'targetForeignKey' => 'position_id',
            'joinTable' => 'positions_formations'
        ]);
        $this->hasMany('EmployesFormations', [
            'foreignKey' => 'formation_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->decimal('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));
        $rules->add($rules->existsIn(['modality_id'], 'Modalities'));
        $rules->add($rules->existsIn(['reminder_id'], 'Reminders'));

        return $rules;
    }
}
