<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Equipo'), ['action' => 'edit', $equipo->ID_equipo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Equipo'), ['action' => 'delete', $equipo->ID_equipo], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->ID_equipo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Equipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Equipo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipos view content">
            <h3><?= h($equipo->Nombre_equipo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Equipo') ?></th>
                    <td><?= h($equipo->Nombre_equipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo Equipo') ?></th>
                    <td><?= $this->Html->image('Equipos/'.$equipo->Logo_equipo, array('width'=>100, 'height'=> 100)) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID Equipo') ?></th>
                    <td><?= $this->Number->format($equipo->ID_equipo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
