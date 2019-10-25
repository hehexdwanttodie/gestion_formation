<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modalities Model
 *
 * @property \App\Model\Table\FormationsTable&\Cake\ORM\Association\HasMany $Formations
 *
 * @method \App\Model\Entity\Modality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modality|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modality saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modality findOrCreate($search, callable $callback = null, $options = [])
 */
class ModalitiesTable extends Table
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

        $this->setTable('modalities');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->hasMany('Formations', [
            'foreignKey' => 'modality_id'
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
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}
