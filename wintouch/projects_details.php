<?php
ob_start();
include("autoload.php");

$id= $_GET["pid"];
$stat= $_GET["stat"];
$cat= new Main();


$limit	=3;
	$start	=$_GET["start"];
	if(empty($start)){
		$start	=0;
}

$records = $cat->fetchsinglePrjforlist($id);
//$size =count($records);
//print_r($records);
$floortypes = $cat->fetchfloortypes($id,$start,$limit);
$sizefl =count($floortypes);

$gallery = $cat->fetchgalleryforwinprj($id,$start,$limit);
$sizegal =count($gallery);

?>
<?php include("header.php"); ?>
<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css"> 
<script type="text/javascript" src="shadowbox/shadowbox.js"></script> 
<script type="text/javascript">
Shadowbox.init({
//handleOversize: "drag",
modal: true
});
</script>
</head>

<body>
	
    <div id="wrapper"><!-- wrapper-->
    
    	<?php include ("header_menu.php");?>
        
        
    	<div id="Container"> <!--Container-->
        
            <div id="content_container_sub"> <!--content_container-->
                	<h1>Projects</h1>
                    
                    <div class="left"> <!--left-->
                    	
                        <div class="project_banner">
                               <img src="images/project_details.jpg" alt="Project Details" width="712">
                        </div>
                    	<?php if($stat=="" || $stat==1) {?>
                        <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>OverView</h2>
                        	<p>
                            	<?php echo html_entity_decode( $records[0]["summary"]);?>
                            </p>
                        </div> <!--projectContenteArea_details-->
						<?php }?>
						
						<?php if($stat==2) {?>
						 <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Specification</h2>
                        	<p>
                            	<?php echo html_entity_decode( $records[0]["specification"]);?>
                            </p>
                        </div> <!--projectContenteArea_details-->
						<?php }?>
						
						<?php if($stat==3) {?>
						 <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Amenities</h2>
                        	<p>
                            	<?php echo html_entity_decode( $records[0]["amenities"]);?>
                            </p>
                        </div> <!--projectContenteArea_details-->
                        <?php }?>
						
						
                       <?php /*?> <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Specification</h2>
                        	<ul>
                            	<li>
                                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's                             standard dummy text ever since the 1500s, when an unknown printer took
                                    </p>
                                </li>
                                <li>
                                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's                             standard dummy text ever since the 1500s, when an unknown printer took
                                    </p>
                                </li>
                                <li>
                                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's                             standard dummy text ever since the 1500s, when an unknown printer took
                                    </p>
                                </li>
                            </ul>
                        </div> <!--projectContenteArea_details--><?php */?>
                        
                        <?php /*?> <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Amenities</h2>
                        	<ul>
                            	<li>Lorem Ipsum is simply dummy text</li>
                                <li>Lorem Ipsum is simply dummy text</li>
                                <li>Lorem Ipsum is simply dummy text</li>
                            </ul>
                        </div> <!--projectContenteArea_details--><?php */?>
						<?php if($stat==4) {?>
                        <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Floor Types</h2>
							<?php for($j=0;$j<$sizefl;$j++) {?>
                        	<div class="project_gallery">
							 <a rel="shadowbox" href="uploads/floor_type/<?php echo $floortypes[$j]["Image_name"];?>" >
							<img src="uploads/floor_type/<?php echo $floortypes[$j]["Image_name"];?>" alt="projects" width="220" height="160"></div></a>
                            <?php }?>
                        </div> <!--projectContenteArea_details-->
                        <?php }?>
						
						<?php if($stat==5) {?>
                        <div class="projectContenteArea_details"> <!--projectContenteArea_details-->
                        	<h2>Gallery</h2>
							<?php for($j=0;$j<$sizegal;$j++) {?>
                        	<div class="project_gallery">
							<a rel="shadowbox" href="uploads/gallery/<?php echo $gallery[$j]["image_name"];  ?>" >
							<img src="uploads/gallery/<?php echo $gallery[$j]["image_name"];  ?>" alt="projects" width="220" height="160"></div></a>
                            <?php }?>
                        </div> <!--projectContenteArea_details-->
                        <?php }?>
						
						<?php if($stat==5){?>
						<?php $cnt=$cat->totRec/$limit;
						if($cnt>1){
						?>
						
						<div class="page_nav">
		    <?php
					
					$cnt=ceil($cnt);
					$current	=	($start/$limit)+1;						
					$pg	=	new Pages();
					$pages	=	$pg->getPages($current,$cnt,$limit);
					$first	=	$pg->getFirst($cnt,$limit);
					$last	=	$pg->getLast($cnt,$limit);
					$prev	=	$pg->getPrev($current,$cnt,$limit);
					$next	=	$pg->getNext($current,$cnt,$limit);
				?>
				<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $first;?>" class="nav">&laquo;&laquo;First</a>
				<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $prev;?>" class="nav">&laquo;Prev</a>
				<?php
					for($j=0;$j<count($pages);$j++)
					{
						$star=($pages[$j]-1)*$limit;
						if($start==$star)
						{?>
						<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $star;?>" class="visited"><?php echo $pages[$j];?></a>
				<?php }else{?>
						<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $star;?>" ><?php echo $pages[$j];?></a>
				<?php }
					}
				?>
				<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $next;?>" class="nav">Next&raquo;</a>
				<a href="projects_details.php?pid=<?php echo $id; ?>&stat=<?php echo $stat;?>&start=<?php echo $last;?>" class="nav">Last&raquo;&raquo;</a>
		
		 </div>
		 
		 <?php } }?>
                    </div><!--End left-->
                    
                    <div class="right"> <!--right-->
                    	<ul>
                        	<li><a href="projects_details.php?pid=<?php echo $id; ?>&stat=1">Overview</a></li>
                            <li><a href="projects_details.php?pid=<?php echo $id; ?>&stat=2">Specification</a></li>
                            <li><a href="projects_details.php?pid=<?php echo $id; ?>&stat=3">Amenities</a></li>
                            <li><a href="projects_details.php?pid=<?php echo $id; ?>&stat=4">Floor Types</a></li>
                            <li><a href="projects_details.php?pid=<?php echo $id; ?>&stat=5">Gallery</a></li>
                        <!--    <li><a href="#">Send Enquiry</a></li>-->
                        </ul>
                    </div><!--End right-->
					
                    
                    
                    
            <div class="clear"></div>
            </div> <!--Endcontent_container-->
            
            
        <div class="clear"></div>  
        </div> <!--End Container-->
       <?php include ("footer.php");?> 
       
    <div class="clear"></div>
    </div> <!--End  wrapper-->

</body>
</html>
