<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="Profiles view large-9 medium-8 columns content">
    <h3><?= h($profile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('name') ?></th>
            <td><?= h($profile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('surname') ?></th>
            <td><?= h($profile->surname) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('phone') ?></th>
            <td><?= h($profile->phone) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('email') ?></th>
            <td><?= h($profile->email) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('birthday') ?></th>
            <td><?= h($profile->birthday) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('country') ?></th>
            <td><?= h($profile->country) ?></td>
        </tr>
		<tr>
            <th scope="row"><?= __('city') ?></th>
            <td><?= h($profile->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
   </table>
   		
            <?= __('photo') ?></br>
            <img src=http://192.168.247.5/labs/cake/myPj/webroot/img/<?=  ($profile->photo) ?> width="1024"> 
        </br>
		<?= __('link') ?></br>
	<table >
	<?php foreach ($links as $link): ?>
			<tr> <td> <?= $link->link ?>   </td> </tr>
		<?php endforeach; ?>
		
	 </table>
</div>
