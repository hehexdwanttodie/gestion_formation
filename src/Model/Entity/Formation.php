<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $description
 * @property int $category_id
 * @property int $frequency_id
 * @property int $modality_id
 * @property int $duration
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Frequency $frequency
 * @property \App\Model\Entity\Modality $modality
 * @property \App\Model\Entity\Employe[] $employes
 * @property \App\Model\Entity\Position[] $positions
 */
class Formation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'number' => true,
        'title' => true,
        'description' => true,
        'category_id' => true,
        'frequency_id' => true,
        'modality_id' => true,
        'duration' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'frequency' => true,
        'modality' => true,
        'employes' => true,
        'positions' => true
    ];
}
