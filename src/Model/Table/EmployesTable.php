<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\BuildingsTable&\Cake\ORM\Association\BelongsTo $Buildings
 * @property \App\Model\Table\CivilitiesTable&\Cake\ORM\Association\BelongsTo $Civilities
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\BelongsToMany $Formations
 *
 * @method \App\Model\Entity\Employe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employe findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployesTable extends Table
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

        $this->setTable('employes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id'
        ]);
        $this->belongsTo('Civilities', [
            'foreignKey' => 'civility_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Formations', [
            'foreignKey' => 'employe_id',
            'targetForeignKey' => 'formation_id',
            'joinTable' => 'employes_formations'
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
            ->scalar('number')
            ->maxLength('number', 255)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('firstName')
            ->maxLength('firstName', 255)
            ->requirePresence('firstName', 'create')
            ->notEmptyString('firstName');

        $validator
            ->scalar('building')
            ->maxLength('building', 255)
            ->requirePresence('building', 'create')
            ->notEmptyString('building');

        $validator
            ->boolean('actif')
            ->requirePresence('actif', 'create')
            ->notEmptyString('actif');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        $rules->add($rules->existsIn(['civility_id'], 'Civilities'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }
}
