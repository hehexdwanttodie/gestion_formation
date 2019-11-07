<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PositionsFormation $positionsFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Positions Formation'), ['action' => 'edit', $positionsFormation->position_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Positions Formation'), ['action' => 'delete', $positionsFormation->position_id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionsFormation->position_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Positions Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positionsFormations view large-9 medium-8 columns content">
    <h3><?= h($positionsFormation->position_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $positionsFormation->has('position') ? $this->Html->link($positionsFormation->position->title, ['controller' => 'Positions', 'action' => 'view', $positionsFormation->position->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $positionsFormation->has('formation') ? $this->Html->link($positionsFormation->formation->title, ['controller' => 'Formations', 'action' => 'view', $positionsFormation->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $positionsFormation->has('status') ? $this->Html->link($positionsFormation->status->name, ['controller' => 'Status', 'action' => 'view', $positionsFormation->status->id]) : '' ?></td>
        </tr>
    </table>
</div>
