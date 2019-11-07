<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation[]|\Cake\Collection\CollectionInterface $formations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?></li>
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
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modality_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reminder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= h($formation->title) ?></td>
                <td><?= h($formation->description) ?></td>
                <td><?= $formation->has('category') ? $this->Html->link($formation->category->name, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
                <td><?= $formation->has('frequency') ? $this->Html->link($formation->frequency->time, ['controller' => 'Frequencies', 'action' => 'view', $formation->frequency->id]) : '' ?></td>
                <td><?= $formation->has('modality') ? $this->Html->link($formation->modality->type, ['controller' => 'Modalities', 'action' => 'view', $formation->modality->id]) : '' ?></td>
                <td><?= $formation->has('reminder') ? $this->Html->link($formation->reminder->time, ['controller' => 'Reminders', 'action' => 'view', $formation->reminder->id]) : '' ?></td>
                <td><?= $this->Number->format($formation->duration) ?></td>
                <td><?= h($formation->created) ?></td>
                <td><?= h($formation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?>
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
