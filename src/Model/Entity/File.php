<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * File Entity
 *
 * @property int $id
 * @property int $employeFormation_id
 * @property string $name
 * @property string $path
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modfied
 * @property bool $status
 */
class File extends Entity
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
        'employeFormation_id' => true,
        'name' => true,
        'path' => true,
        'created' => true,
        'modfied' => true,
        'status' => true
    ];
}
