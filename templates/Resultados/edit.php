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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resultado->ID_resultado],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->ID_resultado), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resultados form content">
            <?= $this->Form->create($resultado) ?>
            <fieldset>
                <legend><?= __('Edit Resultado') ?></legend>
                <?php
                    echo $this->Form->control('ID_jugador');
                    echo $this->Form->control('Jornada');
                    echo $this->Form->control('Puntos');
                    echo $this->Form->control('ID_tipo_tiro');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
