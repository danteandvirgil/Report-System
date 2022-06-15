<?php include_once __DIR__ . "/includes/head.php" ?>

<!-- include sidebar.php -->
<?php include __DIR__ . "/includes/sidebar.php"; ?>

<div class="main">
	<!-- include topbar.php -->
	<?php include __DIR__ . "/includes/topbar.php";


	$issues = getCurrentAllIssues();
	?>

	<main class="content">
		<div class="container-fluid p-0">
			<div class="row ">
				<!-- Column -->
				<div class="col-lg-12">
					<div class="row">
						<div class="col-sm-12">
							<table id="issuesTable" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Reported By</th>
										<th>Issue</th>
										<th>Location</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach ($issues as $issue) { ?>
										<tr>
											<td><?php echo $issue['name']; ?></td>
											<td><?php echo $issue['issue_msg']; ?></td>
											<td><?php echo $issue['location']; ?></td>
											<td>
												<?php if ($issue['status'] == 1) : ?>
													<?= reportedBtnHTML() ?>
												<?php else : ?>
													<?php if (isAdmin()) : ?>
														<button data-issueid="<?= $issue['issue_id'] ?>" class="btn btn-primary btn-sm confirm-btn"><i class="fa fa-check"></i> &nbsp; Confirm pending</button>
													<?php else : ?>
														<button class="button pending-btn"><i class="fa-solid fa-filter"></i> &nbsp; Pending</button>
													<?php endif; ?>
												<?php endif; ?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th rowspan="1" colspan="1">Reported By</th>
										<th rowspan="1" colspan="1">Issue</th>
										<th rowspan="1" colspan="1">Location</th>
										<th rowspan="1" colspan="1">Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<!-- Column -->
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

	<script>
		$(() => {
			$('#issuesTable').DataTable();

			// confirm-btn
			$('.confirm-btn').click(function() {
				let issueId = $(this).data('issueid');
				
				httpPost('api.php', {
					confirm_issue: 1,
					issue_id: issueId
				}, data => {
					// replace button with data
					$(this).replaceWith(data);
				}, loadIn = null);
			});
		});
	</script>
	<?php include_once __DIR__ . "/includes/footer.php" ?>