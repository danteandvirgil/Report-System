<?php include_once __DIR__ . "/includes/head.php" ?>

<!-- include sidebar.php -->
<?php include __DIR__ . "/includes/sidebar.php"; ?>

<div class="main">
	<!-- include topbar.php -->
	<?php include __DIR__ . "/includes/topbar.php"; ?>

	<main class="content">
		<!-- Main Content -->
		<section class="my-form">
			<div class="container-fluid">
				<div class="row main-content  text-center">
					<div class="col-md-4 text-center company__info">

					</div>
					<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
						<div class="container-fluid">
							<div class="row pt-3">
								<div class="three">
									<h1>Report An Issue</h1>
								</div>

							</div>
							<div class="row">
								<form action="api.php" method="POST" class="form-group">
									<input type="hidden" name="report_issue" value="1">
									<div class="row">
										<input type="text" name="issue_msg" id="issue_msg" class="form__input" placeholder="Issue Message">
									</div>
									<div class="row">
										<input type="text" name="location" id="location" class="form__input" placeholder="Location">
									</div>

									<div class="row d-flex justify-content-center pb-2">
										<input type="submit" value="Submit" class="btn">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php include_once __DIR__ . "/includes/footer.php" ?>