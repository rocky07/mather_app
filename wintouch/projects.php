<?php
ob_start();
include("autoload.php");

$limit	=10;
	$start	=$_GET["start"];
	if(empty($start)){
		$start	=0;
}

$cat= new Main();

$records = $cat->fetchPrjforlist($start,$limit);
$size =count($records);

?>

<?php include("header.php"); ?>
</head>

<body>
	
    <div id="wrapper"><!-- wrapper-->
    
    	<?php include ("header_menu.php");?>
        
        
    	<div id="Container"> <!--Container-->
        
            <div id="content_container_sub"> <!--content_container-->
                	<h1>Projects</h1>
					<?php for($i=0;$i<$size;$i++) {?>
					<div class="project_list_container"><!-- project_list_container-->
                        <div class="project_content">
                        	<h2><?php echo $records[$i]["name"];?></h2>
                        	<p>
                            	<?php echo  html_entity_decode($records[$i]["short_summary"]);?>
                            </p>
                            <div class="view_projects"><a href="projects_details.php?pid=<?php echo $records[$i]["id"]?>">View Details</a></div>
                        </div>
                        <div class="image_box_projects"><img src="uploads/project_images/<?php echo $records[$i]["project_image"]; ?>" alt="Recent Projects" width="150" height="130" /></div>
                    </div> <!--End  project_list_container-->
                    <div class="H_line_projects"></div>
                    
                                        <?php }?>
            <div class="clear"></div>
            </div> <!--Endcontent_container-->
            
            
        <div class="clear"></div>  
        </div> <!--End Container-->
       <?php include ("footer.php");?> 
       
    <div class="clear"></div>
    </div> <!--End  wrapper-->

</body>
</html>
