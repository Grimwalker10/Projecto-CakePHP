<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jugadore> $jugadores
 */
?>
<div class="text-right">
<?= $this->Html->link('Generar Informe PDF', ['controller' => 'Jugadores', 'action' => 'generarPDF'], ['class' => 'button float-left']) ?>
</div>
<hr>
<div class="jugadores index content">
    <?= $this->Html->link(__('Nuevo Jugador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jugadores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID_jugador') ?></th>
                    <th><?= $this->Paginator->sort('Nombres') ?></th>
                    <th><?= $this->Paginator->sort('Apellidos') ?></th>
                    <th><?= $this->Paginator->sort('Fecha_Nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('Fotografia') ?></th>
                    <th><?= $this->Paginator->sort('ID_equipo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $jugadore): ?>
                <tr>
                    <td><?= $this->Number->format($jugadore->ID_jugador) ?></td>
                    <td><?= h($jugadore->Nombres) ?></td>
                    <td><?= h($jugadore->Apellidos) ?></td>
                    <td><?= h($jugadore->Fecha_Nacimiento) ?></td>
                    <td>
                    <?= $this->Html->image('Jugadores/'.$jugadore->Fotografia, array('width'=>100, 'height'=> 100)) ?>
                    </td>
                    <td><?= $jugadore->ID_equipo === null ? '' : $this->Number->format($jugadore->ID_equipo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $jugadore->ID_jugador]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $jugadore->ID_jugador]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $jugadore->ID_jugador], ['confirm' => __('Are you sure you want to delete # {0}?', $jugadore->ID_jugador)]) ?>
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
