<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Jugadore'), ['action' => 'edit', $jugadore->ID_jugador], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Jugadore'), ['action' => 'delete', $jugadore->ID_jugador], ['confirm' => __('Are you sure you want to delete # {0}?', $jugadore->ID_jugador), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jugadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Jugadore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jugadores view content">
            <h3><?= h($jugadore->Nombres) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombres') ?></th>
                    <td><?= h($jugadore->Nombres) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellidos') ?></th>
                    <td><?= h($jugadore->Apellidos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fotografia') ?></th>
                    <td><?= $this->Html->image('Jugadores/'.$jugadore->Fotografia, array('width'=>100, 'height'=> 100)) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID Equipo') ?></th>
                    <td><?= $jugadore->ID_equipo === null ? '' : $this->Number->format($jugadore->ID_equipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Nacimiento') ?></th>
                    <td><?= h($jugadore->Fecha_Nacimiento) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
