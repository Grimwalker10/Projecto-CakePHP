<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jugadore Entity
 *
 * @property int $ID_jugador
 * @property string $Nombres
 * @property string $Apellidos
 * @property \Cake\I18n\FrozenDate $Fecha_Nacimiento
 * @property string|null $Fotografia
 * @property int|null $ID_equipo
 */
class Jugadore extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'Nombres' => true,
        'Apellidos' => true,
        'Fecha_Nacimiento' => true,
        'Fotografia' => true,
        'ID_equipo' => true,
    ];
}
