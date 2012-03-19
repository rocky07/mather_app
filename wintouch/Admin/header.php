<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $webpageTitle;?>-Mather Projects - Administration</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<?php
	if(!empty($userId)){
		$aut	=	new Authentication();
		$aut->setAdminId($userId);
		$headInfo	=	$aut->getLoggedInfo();			
	}else{
		$headInfo	=	array();
	}
?>
<body>

<div id="header">
	<div id="logoforadmin"><h1>Administration</h1></div>
</div>

	<div id="header">
		<!--<div id="topBar" class="alright"><a href="logout.php">Exit</a></div>-->
		<!--<div id="topInfo">-->
			<!--<div class="logo"></div>-->
			
			<div class="content">
				<?php if(count($headInfo)>0){?>
				FullName : <strong><?php echo $headInfo[0]["full_name"];?></strong>,
				Email : <a href="mailto:<?php echo $headInfo[0]["email"];?>"><?php echo $headInfo[0]["email"];?></a>
				<?php } ?>
			</div>
		<!--</div>-->
	</div>
	