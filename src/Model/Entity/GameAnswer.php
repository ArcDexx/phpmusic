<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GameAnswer Entity
 *
 * @property int $id
 * @property int $game_user_id
 * @property int $sample_id
 * @property bool $artist
 * @property bool $title
 * @property \Cake\I18n\Time $time
 *
 * @property \App\Model\Entity\GameUser $game_user
 * @property \App\Model\Entity\Sample $sample
 */
class GameAnswer extends Entity
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
