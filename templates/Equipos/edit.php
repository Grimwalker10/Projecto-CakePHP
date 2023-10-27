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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $equipo->ID_equipo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->ID_equipo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Equipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipos form content">

            <?= $this->Form->create($equipo, ['type'=>'file']) ?>

            <fieldset>
                <legend><?= __('Edit Equipo') ?></legend>
                <?php echo $this->Form->control('Nombre_equipo'); ?>
                <?php echo $this->Form->control('Logo_equipo', ['type'=>'file', 'required'=>false]); ?>
                <?= $this->Html->image('Equipos/'.$equipo->Logo_equipo, array('width'=>100, 'height'=> 100)) ?>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
