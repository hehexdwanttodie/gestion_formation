<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Civility $civility
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Civility'), ['action' => 'edit', $civility->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Civility'), ['action' => 'delete', $civility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $civility->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Civilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Civility'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="civilities view large-9 medium-8 columns content">
    <h3><?= h($civility->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($civility->name) ?></td>
        </tr>
    </table>
<!--    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($civility->employes)): ?>
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
            <?php foreach ($civility->employes as $employes): ?>
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
</div>
