<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Civility'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="civility form large-9 medium-8 columns content">
    <?= $this->Form->create($civility) ?>
    <fieldset>
        <legend><?= __('Add Civility') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
