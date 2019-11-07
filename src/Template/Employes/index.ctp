<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe[]|\Cake\Collection\CollectionInterface $employes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Civilities'), ['controller' => 'Civilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Civility'), ['controller' => 'Civilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employes index large-9 medium-8 columns content">
    <h3><?= __('Employes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('building_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civility_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe): ?>
            <tr>
                <td><?= h($employe->number) ?></td>
                <td><?= $employe->has('user') ? $this->Html->link($employe->user->fullName, ['controller' => 'Users', 'action' => 'view', $employe->user->id]) : '' ?></td>
                <td><?= $employe->has('position') ? $this->Html->link($employe->position->title, ['controller' => 'Positions', 'action' => 'view', $employe->position->id]) : '' ?></td>
                <td><?= $employe->has('building') ? $this->Html->link($employe->building->adress, ['controller' => 'Buildings', 'action' => 'view', $employe->building->id]) : '' ?></td>
                <td><?= $employe->has('civility') ? $this->Html->link($employe->civility->name, ['controller' => 'Civilities', 'action' => 'view', $employe->civility->id]) : '' ?></td>
                <td><?= $employe->has('language') ? $this->Html->link($employe->language->name, ['controller' => 'Languages', 'action' => 'view', $employe->language->id]) : '' ?></td>
                <td><?= h($employe->email) ?></td>
                <td><?= h($employe->name) ?></td>
                <td><?= h($employe->firstName) ?></td>
                <td><?= h($employe->actif ? __('Yes') : __('No')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
