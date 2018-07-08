<select id="city" name="city">
		<?php foreach ($cities as $city): ?>
			<option value="<?= $city->city?>"><?= $city->city?></option>
		<?php endforeach; ?>
	</select>