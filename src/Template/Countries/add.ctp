<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="Countries form large-9 medium-8 columns content">
    <?= $this->Form->create($country, array('enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Add country') ?></legend>
        <?php
            echo $this->Form->control('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
