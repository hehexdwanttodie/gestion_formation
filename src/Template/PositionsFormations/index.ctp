<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PositionsFormation[]|\Cake\Collection\CollectionInterface $positionsFormations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Positions Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positionsFormations index large-9 medium-8 columns content">
    <h3><?= __('Positions Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($positionsFormations as $positionsFormation): ?>
            <tr>
                <td><?= $this->Number->format($positionsFormation->id) ?></td>
                <td><?= $positionsFormation->has('position') ? $this->Html->link($positionsFormation->position->title, ['controller' => 'Positions', 'action' => 'view', $positionsFormation->position->id]) : '' ?></td>
                <td><?= $positionsFormation->has('formation') ? $this->Html->link($positionsFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $positionsFormation->formation->id]) : '' ?></td>
                <td><?= $positionsFormation->has('status') ? $this->Html->link($positionsFormation->status->name, ['controller' => 'Status', 'action' => 'view', $positionsFormation->status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $positionsFormation->position_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $positionsFormation->position_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $positionsFormation->position_id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionsFormation->position_id)]) ?>
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
