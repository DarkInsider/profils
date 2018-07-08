<script src="http://192.168.247.5/labs/cake/myPj/webroot/js/jq.js"></script>
<script src="http://192.168.247.5/labs/cake/myPj/webroot/js/script.js"></script>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Profils'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="Profils form large-9 medium-8 columns content">
    <?= $this->Form->create($profile, array('enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Add profile') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('surname');
			echo $this->Form->control('phone');
			echo $this->Form->control('email');
			echo $this->Form->control('birthday', [
    'minYear' => date('Y') - 70,
    'maxYear' => date('Y') - 1,
	]);
			echo $this->Form->input('photodd', array('type' => 'file', 'label' => 'Photo: '));
			echo $this->Form->hidden('photo');
        ?>
		Country </br>
	<select id="country" name="country">
	<option value=""></option>
		<?php foreach ($countries as $country): ?>
			<option value="<?= $country->country?>"><?= $country->country?></option>
		<?php endforeach; ?>
	</select>
	City </br>
		<div id="city" name="city" >
		<select id="city1" name="city1" disabled>
	
	</select>
	</div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

