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
            <?= $this->Html->link(__('Listar Tipo Tiro'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoTiro form content">
            <?= $this->Form->create($tipoTiro) ?>
            <fieldset>
                <legend><?= __('Agregar Tipo Tiro') ?></legend>
                <?php
                    echo $this->Form->control('Nombre');
                    echo $this->Form->control('Puntaje');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
