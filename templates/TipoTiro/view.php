<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoTiro $tipoTiro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tipo Tiro'), ['action' => 'edit', $tipoTiro->ID_tipo_tiro], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tipo Tiro'), ['action' => 'delete', $tipoTiro->ID_tipo_tiro], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTiro->ID_tipo_tiro), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tipo Tiro'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tipo Tiro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoTiro view content">
            <h3><?= h($tipoTiro->Nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tipoTiro->Nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID Tipo Tiro') ?></th>
                    <td><?= $this->Number->format($tipoTiro->ID_tipo_tiro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Puntaje') ?></th>
                    <td><?= $this->Number->format($tipoTiro->Puntaje) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
