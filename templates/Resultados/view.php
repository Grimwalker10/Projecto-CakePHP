<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resultado $resultado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Resultado'), ['action' => 'edit', $resultado->ID_resultado], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Resultado'), ['action' => 'delete', $resultado->ID_resultado], ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->ID_resultado), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Resultado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resultados view content">
            <h3><?= h($resultado->ID_resultado) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID Resultado') ?></th>
                    <td><?= $this->Number->format($resultado->ID_resultado) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID Jugador') ?></th>
                    <td><?= $resultado->ID_jugador === null ? '' : $this->Number->format($resultado->ID_jugador) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jornada') ?></th>
                    <td><?= $this->Number->format($resultado->Jornada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Puntos') ?></th>
                    <td><?= $this->Number->format($resultado->Puntos) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID Tipo Tiro') ?></th>
                    <td><?= $resultado->ID_tipo_tiro === null ? '' : $this->Number->format($resultado->ID_tipo_tiro) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
