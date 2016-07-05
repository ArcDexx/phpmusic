<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property string $genre
 * @property int $current_sample
 * @property int $nb_players
 * @property int $current_first
 * @property int $current_second
 * @property int $current_third
 *
 * @property \App\Model\Entity\Sample[] $samples
 * @property \App\Model\Entity\User[] $users
 */
class Game extends Entity
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
        '*' => true,
        'id' => false
    ];
}
