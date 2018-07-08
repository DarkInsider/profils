<div class="links index large-9 medium-8 columns content">
    <h3><?= __('links') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($links as $link): ?>
            <tr>
                <td><?= $this->Number->format($link->id) ?></td>
                <td><?= h($link->link) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $link->id, $profile]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <?= $this->Form->postLink(__('Add'), ['action' => 'add',  $profile]) ?>
</div>
