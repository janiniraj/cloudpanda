<hr/>
<div class="row">
	<div class="full-row">
		<h4 class="text-center">Organization Flow</h4>
		<div id="chart-container"></div>
	</div>
</div>
<hr/>
<div class="row">
	<div class="full-row">
		<h4 class="text-center">Organization Grid</h4>
		<table id="grid" class="display" style="width:100%">
			<thead>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Parent Name</th>
				<th>Parent Position</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($organizations as $singleKey => $singleValue): ?>
				<tr>
					<td><?=$singleValue['name'] ?></td>
					<td><?=$singleValue['position'] ?></td>
					<td><?=$singleValue['parent_name'] ?></td>
					<td><?=$singleValue['parent_position'] ?></td>
					<td>
                        <?php if($singleValue['parent'] != 0): ?>
                        <a href="<?= site_url('organizations/edit/'.$singleValue['id']) ?>">Edit</a>
                        <a href="<?= site_url('organizations/delete/'.$singleValue['id']) ?>">Delete</a>
                        <?php endif; ?>
                    </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var datasource = <?= json_encode($organizationsTree); ?>;

		$('#chart-container').orgchart({
			'data' : datasource,
			'nodeContent': 'position'
		});

		$('#grid').DataTable({
            dom: 'Bfrtip'
        });
	});
</script>
