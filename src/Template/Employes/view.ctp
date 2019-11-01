<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employe'), ['action' => 'edit', $employe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employe'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Civility'), ['controller' => 'Civilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employes view large-9 medium-8 columns content">
    <h3><?= h($employe->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($employe->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $employe->has('user') ? $this->Html->link($employe->user->fullName, ['controller' => 'Users', 'action' => 'view', $employe->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $employe->has('position') ? $this->Html->link($employe->position->title, ['controller' => 'Positions', 'action' => 'view', $employe->position->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= $employe->has('building') ? $this->Html->link($employe->building->adress, ['controller' => 'Buildings', 'action' => 'view', $employe->building->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Civility') ?></th>
            <td><?= $employe->has('civility') ? $this->Html->link($employe->civility->name, ['controller' => 'Civilities', 'action' => 'view', $employe->civility->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $employe->has('language') ? $this->Html->link($employe->language->name, ['controller' => 'Languages', 'action' => 'view', $employe->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employe->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employe->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($employe->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $employe->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Modality Id') ?></th>
                <th scope="col"><?= __('Reminder Id') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employe->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->title) ?></td>
                <td><?= h($formations->description) ?></td>
                <td><?= h($formations->category_id) ?></td>
                <td><?= h($formations->frequency_id) ?></td>
                <td><?= h($formations->modality_id) ?></td>
                <td><?= h($formations->reminder_id) ?></td>
                <td><?= h($formations->duration) ?></td>
                <td><?= h($formations->created) ?></td>
                <td><?= h($formations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
