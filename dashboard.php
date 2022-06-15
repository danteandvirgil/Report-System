<?php include_once __DIR__ . "/includes/head.php" ?>

<!-- include sidebar.php -->
<?php include __DIR__ . "/includes/sidebar.php"; ?>

<div class="main">
	<!-- include topbar.php -->
	<?php include __DIR__ . "/includes/topbar.php";

	$issues = getCurrentAllIssues();
	?>
	<main class="content">
		<section class=" pb-5">
			<div class="container">
				<div class="row mb-5 px-5 d-flex ">

					<div class="search-box" id="SBox">
						<input id="search" placeholder="Search..." type="text">
						<div class="also search-link" onclick="searchbox(0)" id="searchclick"></div>
					</div>
					<h1>Recently Reported Issues</h1>
				</div>
			</div>
			<div class="container">
				<div class="row px-5">

					<?php foreach ($issues as $issue) { ?>
						<div class="col-lg-6 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
							<div class="services-block-three">
								<a href="javascript:void(0)">
									<div class="padding-15px-bottom">
										<i class="fa-solid fa-face-frown"></i>
									</div>
									<h4><?php echo $issue['name']; ?> - <?php echo $issue['location']; ?></h4>
									<p class="xs-font-size13 xs-line-height-22"><?php echo $issue['issue_msg']; ?></p>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</main>

	<?php include_once __DIR__ . "/includes/footer.php" ?>