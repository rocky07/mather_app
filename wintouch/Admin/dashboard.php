<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$auth	=	new Authentication();

$webpageTitle	=	"DashBoard";
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
					<legend>Dashboard</legend>
						<div class="row700">
							<div class="row150">Username</div>
							<div class="row300">: <?php echo $username;?></div>
						</div>
						<!--<div class="row700">
							<div class="row150">Account Type</div>							
							<div class="row300">: Admin</div>							
						</div>-->
						<div class="row700">
							<div class="row150">Full Name</div>
							<div class="row300">: <?php echo $name;?></div>
						</div>
						<div class="row700">
							<div class="row150">Email Id</div>
							<div class="row300">: <?php echo $email;?></div>
						</div>
						<div class="row700">&nbsp;</div>						
							
				</fieldset>
			</div>
		</div>
	</div>
	
<?php include("footer.php");?>