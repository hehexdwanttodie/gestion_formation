<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PositionsFormation Entity
 *
 * @property int $id
 * @property int $position_id
 * @property int $formation_id
 * @property int $status_id
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\Status $status
 */
class PositionsFormation extends Entity
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
        'position_id' => true,
        'formation_id' => true,
        'status_id' => true,
        'position' => true,
        'formation' => true,
        'status' => true
    ];
}
