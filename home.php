<?php
ob_start();
include("autoload.php");

$cat = new Category();
$records=$cat->fetchAllCategories();

$buz= new Business();
$us	=	new	User();
$us->setUserId($userId);
$profile	=	$us->getProfile();

$reqNo = $us->getFriendRequest();//getting no of friends request
$frCount =	$us->getFriendCount($userId);
$buzCount= $buz->getBusinessCount($userId);


$group = new Group();
$cntofgroup = $group->getCountGroup($userId);


if($_POST["question_body_text_field"]!=""){
function strip_html_tags( $text )
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );
    return strip_tags( $text );
}

$qu = strip_html_tags($_POST["question_body_text_field"]);

    $prof		=	new Profile();
	if($prof->addQues($qu,$userId)){
		$msg	=	"Added Successfully";	
	}else{
			$msg	=	$us->errorMessage;
		}
header("Location:home.php?msg=$msg");
exit;
}
?>

<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>QKOCHI</title>
<script type="text/javascript" src="js/Ajax/newajax.js"></script>
<script type="text/javascript" src="js/Ajax/prototype.js"></script> 
<script type="text/javascript" src="jquery-1.4.4.js"></script>

<?php include("qkochi_header.php");?>

<div id="qtitlebar">
<div id="qtitle_style">
<div id="feed_title_wrap"><!--feed_title_wrap-->
<form action="home.php" method="post" name="frm">
<h2>So: Ask me anything you want!</h2> 
<div contenteditable='true' onKeyUp="copyTxt(this);" id='question_body' tabindex='0'></div> 
<textarea class="hidden" cols="40" id="question_body_text_field" name="question_body_text_field" rows="20"></textarea> 
<div align="right"> 
<a href="#" onClick="frm.submit();" class="btn btn_green btn_small right" id="question_submit"><img src="images/ASK-Button.png" alt="Ask" border="0"></a> 
</div> 
</form> 
</div><!--feed_title_wrap-->

<div id="profile_image_wrap"><!--profile_image_wrap-->
<a class="profilepic" href="profile.php" title="View Profile">
<?php 
if($profile[0]["photo"]!=""){
	if($profile[0]["is_facebook_login"]==1) {?>
		<img src="<?php echo $profile[0]["photo"];?>" alt="Profile Icon" border="0">
		<?php }else { ?>
	<img src="Uploads/Profile/<?php echo $profile[0]["photo"];?>" alt="Profile Icon" border="0">
	<?php } 
}
else{?>
<img src="images/malebaloon.jpg" alt="Profile Icon" border="0">
<?php }
?>
</a>
</div>
<!--profile_image_wrap-->

<div id="profile_info"><!--profile_info-->
<div id="profile_info_top"><h3><?php echo $userName;?></h3></div>
<div id="profile_info_bottom">
<h3><a href="manageFriends.php">Friends</a> (<?php echo $frCount;?>)</h3> 

<h3><a href="listMyGroup.php?cid=<?php echo $records[0]["id"];?>">Groups</a> (<?php echo $cntofgroup;?>)</h3> 
<h3><a href="users_business.php?usrid=<?php echo $userId;?>">Business </a> (<?php echo $buzCount;?>)</h3>

<?php if($reqNo>0){?><h3 class="request"><a href="friendsReqProcess.php">Friend Requests</a> (<?php echo $reqNo;?>)</h3><?php }?>
</div>
</div><!--profile_info-->
</div><!-- end title_style-->
</div><!-- end titlebar-->


<div id="qdata"><!--qdata-->
<div id="qdata_style"><!--data_style-->
<div id="feedar_wrap">

<div class="tabbeddiv">
    <div id="newsfeedTab">
    <a  class="activeTab" href="#"></a>
    </div>
    <div id="popularTab">  
    <a  href="homePopularQues.php"></a>
    </div>
    <div id="recentTab">
    <a  href="homeRecQues.php"></a>
    </div>
    <div class="clear"></div>
    <div class="hr"></div>
</div>

<div id="feeder_data_wrap" >










</div>
<!-- Load more button -->
<div class="clear"></div>
<div id="loadmoreajaxloader" style="display:none;"><center><img src="ajax-loader.gif" /></center></div><br/>
<button id="loadmorebutton">Load More</button><br />
<div class="clear"></div>
<!-- Load more button -->
</div>


<div id="sidebar_data_wrap"><!--sidebar-->
<div id="friend_wrap"><!--Friends at sidebar-->



<!--<li><a class="tn" href="profile.php" title='Praveen VK'><img src="images/malebaloon.jpg" alt="Avathar" border="0"></a></li>-->
	

</div><!-- end Friends at sidebar-->

<div class="advertisment"><!-- Adv_Wrap Begins -->
	<div class="adv_sidebar">
	<!--<a href="#"><img src="images/kochi/coit.jpg" alt="AD" border="0"/></a>-->
	<div class="postad_link"><a href="#">Post Your Ad</a></div>
	</div>
</div><!-- Adv_Wrap Ends -->

</div><!-- end sidebar-->
</div><!-- end data_style-->


</div><!-- end qdata-->


<?php include("qkochi_footer.php");?>


<script language="javascript">
searchfriend("");

searchFeedForHome('<?php echo $profile[0]["user_id"];?>');

</script>


<script type="text/javascript">
		$(document).ready(function(){	
			$("#loadmorebutton").click(function (){			
		    	$('#loadmorebutton').html('<img src="ajax-loader.gif" />');
				$.ajax({
					url: "loadmorefeedHome.php?lastid=" + $(".myfeed:last").attr("id"),
					success: function(html){				
						if(html.trim() || html.trim()!=""){
							$("#feeder_data_wrap").append(html);
							$('#loadmorebutton').html('Load More');
						}else{					
							$('#loadmorebutton').replaceWith('<center>No more posts to show.</center>');
						}
					}
				});
				
				
				
		    });
		});
	</script> 


</body> 
</html>
