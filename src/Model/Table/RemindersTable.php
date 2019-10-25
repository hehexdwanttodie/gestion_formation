<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reminders Model
 *
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\HasMany $Formations
 *
 * @method \App\Model\Entity\Reminder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reminder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reminder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reminder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reminder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reminder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reminder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reminder findOrCreate($search, callable $callback = null, $options = [])
 */
class RemindersTable extends Table
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

        $this->setTable('reminders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Formations', [
            'foreignKey' => 'reminder_id'
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
            ->scalar('time')
            ->maxLength('time', 255)
            ->requirePresence('time', 'create')
            ->notEmptyString('time');

        return $validator;
    }
}
