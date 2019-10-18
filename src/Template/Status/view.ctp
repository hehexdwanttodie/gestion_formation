<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Positions Formations'), ['controller' => 'PositionsFormations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Positions Formation'), ['controller' => 'PositionsFormations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="status view large-9 medium-8 columns content">
    <h3><?= h($status->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($status->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Positions Formations') ?></h4>
        <?php if (!empty($status->positions_formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Position Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($status->positions_formations as $positionsFormations): ?>
            <tr>
                <td><?= h($positionsFormations->id) ?></td>
                <td><?= h($positionsFormations->position_id) ?></td>
                <td><?= h($positionsFormations->formation_id) ?></td>
                <td><?= h($positionsFormations->status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PositionsFormations', 'action' => 'view', $positionsFormations->position_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PositionsFormations', 'action' => 'edit', $positionsFormations->position_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PositionsFormations', 'action' => 'delete', $positionsFormations->position_id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionsFormations->position_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
