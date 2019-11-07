<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation $formation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modalities'), ['controller' => 'Modalities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modality'), ['controller' => 'Modalities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['controller' => 'Reminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['controller' => 'Reminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($formation->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($formation->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $formation->has('category') ? $this->Html->link($formation->category->name, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $formation->has('frequency') ? $this->Html->link($formation->frequency->time, ['controller' => 'Frequencies', 'action' => 'view', $formation->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modality') ?></th>
            <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->type, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reminder') ?></th>
            <td><?= $formation->has('reminder') ? $this->Html->link($formation->reminder->time, ['controller' => 'Reminders', 'action' => 'view', $formation->reminder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($formation->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($formation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($formation->modified) ?></td>
        </tr>
    </table>
<!--    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($formation->employes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Building Id') ?></th>
                <th scope="col"><?= __('Civility Id') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('FirstName') ?></th>
                <th scope="col"><?= __('Actif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->employes as $employes): ?>
            <tr>
                <td><?= h($employes->id) ?></td>
                <td><?= h($employes->number) ?></td>
                <td><?= h($employes->user_id) ?></td>
                <td><?= h($employes->position_id) ?></td>
                <td><?= h($employes->building_id) ?></td>
                <td><?= h($employes->civility_id) ?></td>
                <td><?= h($employes->language_id) ?></td>
                <td><?= h($employes->email) ?></td>
                <td><?= h($employes->name) ?></td>
                <td><?= h($employes->firstName) ?></td>
                <td><?= h($employes->actif) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employes', 'action' => 'view', $employes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employes', 'action' => 'edit', $employes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employes', 'action' => 'delete', $employes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
    <div class="related">
        <h4><?= __('Related Positions') ?></h4>
        <?php if (!empty($formation->positions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->positions as $positions): ?>
            <tr>
                <td><?= h($positions->title) ?></td>
                <td><?= h($positions->description) ?></td>
                <td><?= h($positions->created) ?></td>
                <td><?= h($positions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Positions', 'action' => 'view', $positions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Positions', 'action' => 'edit', $positions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Positions', 'action' => 'delete', $positions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
