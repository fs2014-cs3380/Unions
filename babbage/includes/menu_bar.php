				<nav>
					<ul class="topnav">
						<li><a href="<?php echo MAINDIR ?>">Home</a></li>
						<li>
							<a href="<?php echo MAINDIR ?>">Tutorials</a>
							<ul class="subnav">
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo MAINDIR ?>">Resources</a>
							<ul class="subnav">
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
							</ul>
						</li>
<?php
$isAdmin = "true";
if ($isAdmin) {
?>
						<li><a href="<?php echo MAINDIR ?>policies/">Policies</a>
							<ul class="subnav">
								<li><a href="<?php echo MAINDIR ?>policies/admin/">Admin Portal</a></li>
							</ul>
						</li>
<?php
} else {
?>
						<li><a href="<?php echo MAINDIR ?>policies/">Policies</a></li>
<?php
}
?>
					</ul>
				</nav>
