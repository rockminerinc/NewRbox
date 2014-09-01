<div id="content">

<table class="table" style="width:300px">
	<tr>
		<td>Latest Version</td><td><?= $latest_version;?></td>

	</tr>
		<tr>

		<td>Current Version</td><td><?= $current_version;?></td>
	
	</tr>
 

</table>

<?php if ($step==0): ?>
	<input name="submit" value="<?=$step_name;?>" type="submit"   class="btn btn-large 	btn-primary">

<?php else:?>

<?php echo form_open('c=home&m=upgrade'); ?>
<input type="hidden" name="latest_version" value="<?= $latest_version;?>">
<input type="hidden" name="step" value="<?=$step;?>">
<input name="submit" value="<?=$step_name;?>" type="submit"   class="btn btn-large 	btn-primary">
<?php echo form_close(); ?>
<?php endif;?>
</div>