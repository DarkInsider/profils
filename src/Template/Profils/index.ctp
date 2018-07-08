<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New profile'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Countries'), ['controller' => 'countries']) ?> </li>
    </ul>
</nav>
<style type="text/css">
#dialog2 {
	width:110%;
	height:110%;
	background-color:rgba(10, 10, 10, 0.8);
	position:fixed;
	margin:0px;
	padding:0px;
	z-index:3;
	text-align:center;
	display:none;
}
#viewMod {
	width:80%;
	height:70%;
}
</style>
<script type="text/javascript">
	function opend(idd){
		document.getElementById("dialog2").style.display='block';
		var str='profils/viewMod/'+idd;
		document.getElementById('viewMod').src = str;
	}
	function closed(){
		document.getElementById("dialog2").style.display='none';
	}
</script>


<div id="dialog2">
<button id="opener3" onclick="closed();">Close Dialog</button></br>
	<iframe id="viewMod"></iframe>		
</div>
<div class="profils index large-9 medium-8 columns content">
    <h3><?= __('profils') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th scope="col" class="actions"><?= __('View') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
				<th scope="col"><?= $this->Paginator->sort('phone') ?></th>
				<th scope="col"><?= $this->Paginator->sort('email') ?></th>
				<th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profils as $profile): ?>
            <tr>
				<td><button id="opener2" onclick="opend(<?= $profile->id ?>);">View</button></td>
                <td><?= $this->Number->format($profile->id) ?></td>
                <td><?= h($profile->name) ?></td>
                <td><?= h($profile->surname) ?></td>
				<td><?= h($profile->phone) ?></td>
				<td><?= h($profile->email) ?></td>
				<td><?= h($profile->birthday) ?></td>
                <td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $profile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
