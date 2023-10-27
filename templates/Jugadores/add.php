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
            <?= $this->Html->link(__('List Jugadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jugadores form content">
            <?= $this->Form->create($jugadore, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add Jugadore') ?></legend>
                <?php
                    echo $this->Form->control('Nombres');
                    echo $this->Form->control('Apellidos');
                    echo $this->Form->control('Fecha_Nacimiento');
                    echo $this->Form->control('Fotografia', ['type'=>'file']);
                    echo $this->Form->control('ID_equipo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
