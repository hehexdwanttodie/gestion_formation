<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employe Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $position_id
 * @property int|null $building_id
 * @property int $civility_id
 * @property int $language_id
 * @property string $email
 * @property string $name
 * @property string $firstName
 * @property bool $actif
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Building $building
 * @property \App\Model\Entity\Civility $civility
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Formation[] $formations
 */
class Employe extends Entity
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
        'user_id' => true,
        'position_id' => true,
        'building_id' => true,
        'civility_id' => true,
        'language_id' => true,
        'email' => true,
        'name' => true,
        'firstName' => true,
        'actif' => true,
        'user' => true,
        'position' => true,
        'building' => true,
        'civility' => true,
        'language' => true,
        'formations' => true
    ];
}
