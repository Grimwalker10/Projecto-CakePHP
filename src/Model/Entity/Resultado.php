<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resultado Entity
 *
 * @property int $ID_resultado
 * @property int|null $ID_jugador
 * @property int $Jornada
 * @property int $Puntos
 * @property int|null $ID_tipo_tiro
 */
class Resultado extends Entity
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
        'ID_jugador' => true,
        'Jornada' => true,
        'Puntos' => true,
        'ID_tipo_tiro' => true,
    ];
}
