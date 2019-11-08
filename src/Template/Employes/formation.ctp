<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back to Employe'), ['action' => 'view', $employe->id]) ?></li>
    </ul>
</nav>
<div class="employes view large-9 medium-8 columns content">
    <h3>Training Plan</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($employe->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employe->name) ?> <?= h($employe->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $employe->has('position') ? $this->Html->link($employe->position->title, ['controller' => 'Positions', 'action' => 'view', $employe->position->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supervisor Name') ?></th>
            <td><?= $employe->has('user') ? $this->Html->link($employe->user->fullName, ['controller' => 'Users', 'action' => 'view', $employe->user->id]) : '' ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= $employe->has('building') ? $this->Html->link($employe->building->adress, ['controller' => 'Buildings', 'action' => 'view', $employe->building->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Frequency') ?></th>
                    <th scope="col"><?= __('Date Done') ?></th>
                    <th scope="col"><?= __('Date Due') ?></th>
                    <th scope="col"><?= __('Modality Id') ?></th>
                    <th scope="col"><?= __('Reminder Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($employe->formations as $formations): ?>
                    <tr>
                        <td><?= h($formations->title) ?></td>
                        <td><?= h($formations->frequency->time) ?></td>
                        <td><?= $formations->has('employes_formations') ? $this->Html->link($formations->employes_formations->date_done, ['controller' => 'EmployesFormations', 'action' => 'view', $formations->employes_formations->date_done]) : '' ?></td>
                        <td><?= $formations->has('employes_formations') ? $this->Html->link($formations->employes_formations->date_due, ['controller' => 'EmployesFormations', 'action' => 'view', $formations->employes_formations->date_due]) : '' ?></td>
                        <td><?= h($formations->modality->type) ?></td>
                        <td><?= h($formations->reminder->time) ?></td>
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
