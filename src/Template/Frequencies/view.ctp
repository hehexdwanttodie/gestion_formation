<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequency $frequency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Frequency'), ['action' => 'edit', $frequency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Frequency'), ['action' => 'delete', $frequency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="frequencies view large-9 medium-8 columns content">
    <h3><?= h($frequency->time) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($frequency->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($frequency->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($frequency->formations)): ?>
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
            <?php foreach ($frequency->formations as $formations): ?>
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
