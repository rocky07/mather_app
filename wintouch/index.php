<?php
ob_start();
include("autoload.php");

$cat= new Main();


$records = $cat->fetchimageforWinhme();
$size =count($records);
//print_r($records);

?>
<?php include("header.php"); ?>

<!--------------------------------------------------Banner JS----------------------------------------------->
<link href="css/gallerystyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/simplegallery.js">

/***********************************************
* Simple Controls Gallery- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">

var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [1000, 409], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
		["images/banner1.png", "", ""],
		["images/banner2.png", "", "", ""],
		["images/banner3.png", "", ""],
		["images/banner4.png", "", "", ""]
		
	],
	autoplay: [true, 2500, 100], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})

</script>
<!--------------------------------------------------End Banner JS----------------------------------------------->

</head>

<body>
	
    <div id="wrapper"><!-- wrapper-->
    
    	<?php include ("header_menu.php");?>
        
        
    	<div id="Container"> <!--Container-->
        
            <div id="content_container"> <!--content_container-->
            	<div class="banner"> <!--banner-->
                	`<div id="simplegallery1"></div>
                </div> <!--End banner-->
                
                <div class="H_line"></div>
                
                <div class="left"> <!--left-->
                	<h1>Welcome to WinTouch Builders</h1>
                    <p>
                    	Welcome to the world of WinTouch Builders in Kasaragod. This is the place where you can find some of the finest homes or villas in Kasaragod. The growing network of loyal clients has boosted the miraculous growth of Wintouch in the real estate arena of Kasaragod.
<br /><br />
We presents Palm Meadows, a modern township in Kasaragod with advanced infrastructures and technologies. Wintouch Sports Academy, another upcoming world class project changing the future of properties in Kasaragod is going to be a reality very soon.We presents Palm Meadows, a modern township in Kasaragod with advanced infrastructures and technologies. Wintouch Sports Academy, another upcoming world class project changing the future of properties in Kasaragod is going to be a reality very soon.
                    </p>
                    
                    <h2>Recent Projects</h2>
                    <div class="recent_project_box">
					<?php for($j=0;$j<4;$j++) {?>
                    	<div class="image_box"><img src="uploads/gallery/<?php echo $records[$j]["image_name"];  ?>" alt="Recent Projects" width="122" height="105" /></div>
						<?php }?>
                      
                    <div class="clear"></div>
                    </div>
                </div> <!--End left-->
                
                <div class="V_line"></div>
                
                <div class="right"> <!--right-->
                	<h2 style="margin-top:10px;">Quick Enquiry</h2>
                    <form action="#" method="#">
                    <div class="q_nemebox"><p>Name</p></div>
                    <div class="q_contact_textbox">
                    	<input type="text" name="#" id="#" class="textbox_style" />
                    </div>
                    <div class="q_nemebox"><p>Email</p></div>
                    <div class="q_contact_textbox">
                    	<input type="text" name="#" id="#" class="textbox_style" />
                    </div>
                    <div class="q_nemebox"><p>Phone</p></div>
                    <div class="q_contact_textbox">
                    	<input type="text" name="#" id="#" class="textbox_style" />
                    </div>
                    <div class="q_nemebox"><p>Comments</p></div>
                    <div class="q_contact_textbox">
                    	<textarea name="#" id="#" class="texarea_style"> </textarea>
                        <input type="submit" name="#" class="submitt_button" value="Submit"/>
                    </div>
                    </form>
                    <div class="clear"></div>
                    
                    <div class="service_box">
                        <h2 >Quick Contact</h2>
                        <div class="number">+91 4994 227666</div>
                         <div class="number" style="margin-top:15px;">+91 4994 645666</div>
                    </div>
                </div> <!--End right-->
                
                
            <div class="clear"></div>
            </div> <!--Endcontent_container-->
            
        <div class="clear"></div>  
        </div> <!--End Container-->
       <?php include ("footer.php");?> 
       
    <div class="clear"></div>
    </div> <!--End  wrapper-->

</body>
</html>
