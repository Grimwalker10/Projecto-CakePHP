<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resultado> $resultados
 */
?>
<div class="text-right">
<?= $this->Html->link('Generar Informe de Maximos Anotadores PDF', ['controller' => 'Resultados', 'action' => 'generarPDF'], ['class' => 'button float-left']) ?>
</div>
<hr>
<div class="resultados index content">
    <?= $this->Html->link(__('Nuevo Resultado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Resultados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID_resultado') ?></th>
                    <th><?= $this->Paginator->sort('ID_jugador') ?></th>
                    <th><?= $this->Paginator->sort('Jornada') ?></th>
                    <th><?= $this->Paginator->sort('Puntos') ?></th>
                    <th><?= $this->Paginator->sort('ID_tipo_tiro') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $this->Number->format($resultado->ID_resultado) ?></td>
                    <td><?= $resultado->ID_jugador === null ? '' : $this->Number->format($resultado->ID_jugador) ?></td>
                    <td><?= $this->Number->format($resultado->Jornada) ?></td>
                    <td><?= $this->Number->format($resultado->Puntos) ?></td>
                    <td><?= $resultado->ID_tipo_tiro === null ? '' : $this->Number->format($resultado->ID_tipo_tiro) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $resultado->ID_resultado]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $resultado->ID_resultado]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $resultado->ID_resultado], ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->ID_resultado)]) ?>
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
