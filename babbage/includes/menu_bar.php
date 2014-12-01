				<nav>
					<ul class="topnav">
                        <!--<li><a href="<?php /*echo MAINDIR */ ?>">Home</a></li>-->
						<li><a href="<?php echo MAINDIR ?>">Buildings</a></li>
						<!--<li><a href="<?php /*echo MAINDIR */?>">Login/Logout</a></li>-->
						<li><a href="<?php echo MAINDIR ?>reservearoom/reservearoom.php">Reserve a Space</a></li>
						<li>
							<a href="http://argo.col.missouri.edu/lostandfound">Lost and Found</a>
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
