<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TipoTiro> $tipoTiro
 */
?>
<div class="tipoTiro index content">
    <?= $this->Html->link(__('New Tipo Tiro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tipo Tiro') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID_tipo_tiro') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Puntaje') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipoTiro as $tipoTiro): ?>
                <tr>
                    <td><?= $this->Number->format($tipoTiro->ID_tipo_tiro) ?></td>
                    <td><?= h($tipoTiro->Nombre) ?></td>
                    <td><?= $this->Number->format($tipoTiro->Puntaje) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tipoTiro->ID_tipo_tiro]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoTiro->ID_tipo_tiro]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoTiro->ID_tipo_tiro], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTiro->ID_tipo_tiro)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
