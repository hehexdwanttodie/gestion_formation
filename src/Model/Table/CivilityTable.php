<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Civility Model
 *
 * @property \App\Model\Table\EmployesTable&\Cake\ORM\Association\HasMany $Employes
 *
 * @method \App\Model\Entity\Civility get($primaryKey, $options = [])
 * @method \App\Model\Entity\Civility newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Civility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Civility|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civility saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Civility[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Civility findOrCreate($search, callable $callback = null, $options = [])
 */
class CivilityTable extends Table
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

        $this->setTable('civility');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Employes', [
            'foreignKey' => 'civility_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
