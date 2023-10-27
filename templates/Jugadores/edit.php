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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jugadore->ID_jugador],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jugadore->ID_jugador), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jugadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jugadores form content">
            <?= $this->Form->create($jugadore, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Jugadore') ?></legend>
                <?php
                    echo $this->Form->control('Nombres');
                    echo $this->Form->control('Apellidos');
                    echo $this->Form->control('Fecha_Nacimiento');
                    echo $this->Form->control('Fotografia', ['type'=>'file']); ?>
                    <?= $this->Html->image('Jugadores/'.$jugadore->Fotografia, array('width'=>100, 'height'=> 100)) ?>
                    <?php echo $this->Form->control('ID_equipo'); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
