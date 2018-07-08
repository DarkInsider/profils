<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="Cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city, array('enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Add city') ?></legend>
        <?php
            echo $this->Form->control('city');
			//echo $this->Form->control('country_code');
        ?>
		
			Country </br>
	<select id="country_code" name="country_code">
		<?php foreach ($countries as $country): ?>
			<option value="<?= $country->id?>"><?= $country->country?></option>
		<?php endforeach; ?>
	</select>
		
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
