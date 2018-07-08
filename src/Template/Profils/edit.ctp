<script src="http://192.168.247.5/labs/cake/myPj/webroot/js/jq.js"></script>
<script src="http://192.168.247.5/labs/cake/myPj/webroot/js/script.js"></script>
<style type="text/css">

#viewMod {
	width:80%;
	height:600px;
}
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $profile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List profiles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="profiles form large-9 medium-8 columns content">
    <?= $this->Form->create($profile, array('enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Edit profile') ?></legend>
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
		<?php if($country->country === $selcountry): ?> 
			<option  value="<?= $country->country?>" selected="selected"><?= $country->country?></option>
			<?php else: ?>
			<option value="<?= $country->country?>"><?= $country->country?></option>
			
			<?php endif ?>
		<?php endforeach; ?>
	</select>
	City </br>
		<div id="city" name="city" >
		<select id="city1" name="city1">
		<?php foreach ($cities as $city): ?>
		<?php if($city->city === $selcity): ?> 
			<option  value="<?= $city->city?>" selected="selected"><?= $city->city?></option>
			<?php else: ?>
			<option value="<?= $city->city?>"><?= $city->city?></option>
			
			<?php endif ?>
		<?php endforeach; ?>
	</select>
	
	</select>
	</div>
</br>
 
<iframe id="viewMod" src="http://192.168.247.5:8765/Links/index/<?= $profile->id ?>"></iframe>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
