<div class="Links form large-9 medium-8 columns content">
    <?= $this->Form->create($link, array('type' => 'post')) ?>
    <fieldset>
        <legend><?= __('Add link') ?></legend>
        <?php
            echo $this->Form->control('link');
			//echo $this->Form->create('profile_id');
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
