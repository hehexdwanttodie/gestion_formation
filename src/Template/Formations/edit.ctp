<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modalities'), ['controller' => 'Modalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modality'), ['controller' => 'Modalities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Edit Formation') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('frequency_id', ['options' => $frequencies]);
            echo $this->Form->control('modality_id', ['options' => $modalities]);
            echo $this->Form->control('reminder_id', ['options' => $reminders]);
            echo $this->Form->control('duration');
            echo $this->Form->control('employes._ids', ['options' => $employes]);
            echo $this->Form->control('positions._ids', ['options' => $positions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
