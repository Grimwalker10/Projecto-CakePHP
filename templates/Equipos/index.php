<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Equipo> $equipos
 */
?>
<div class="equipos index content">
    <?= $this->Html->link(__('Nuevo Equipo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Equipos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID_equipo') ?></th>
                    <th><?= $this->Paginator->sort('Nombre_equipo') ?></th>
                    <th><?= $this->Paginator->sort('Logo_equipo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo): ?>
                <tr>
                    <td><?= $this->Number->format($equipo->ID_equipo) ?></td>
                    <td><?= h($equipo->Nombre_equipo) ?></td>
                    <td>
                    <?= $this->Html->image('Equipos/'.$equipo->Logo_equipo, array('width'=>100, 'height'=> 100)) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $equipo->ID_equipo]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $equipo->ID_equipo]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $equipo->ID_equipo], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->ID_equipo)]) ?>
                        <?= $this->Html->link('Generar Informe PDF', ['action' => 'generarInforme', $equipo->ID_equipo], ['class' => 'button']) ?>
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
