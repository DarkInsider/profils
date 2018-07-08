<div class="Links form large-9 medium-8 columns content">
    <?= $this->Form->create($link, array('enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Add link') ?></legend>
        <?php
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>