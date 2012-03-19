<?php

/*
	
	
	 Call this on an object : get_thumb_image(arg1,arg2,arg3,arg4);
	 arg1		:	Relative/Absolute Path of the Image to be displayed
	 arg2		:	Max width of the thumbnail
	 arg3		:	Max height of the thumbnail
	 arg4		:	If zero Resize automatic, else Fix the width,height to  given values without any agjustment
	 			:	This works only when both arg2 and arg3 present.ie the size will set to arg2/arg3 No sampling*
	
	*sampling	:	Thumbnail script works on image sampling, The height and width are set proportional to the image
					actual height and width. So if no sampling enabled, the size will contantly fixed, this may change the
					image appearance.
	


*/


	
	// -----URL SUPPORT HAS BEEN ADDED IN VERSION 1.1-------------//
	/*$image_path	=	$_REQUEST['image_path'];
	$max_height	=	$_REQUEST['max_height'];
	$max_width	=	$_REQUEST['max_width'];
	$resize		=	$_REQUEST['resize'];
	
	
	$p=new ThumbView();	
	$p->get_thumb_image($image_path,$max_width,$max_height,$resize);	
	
	*/
	



	



/*------------------------------------------------------------------------------
	THUMB GENERATOR SCRIPT  STARTS HERE
--------------------------------------------------------------------------------*/


error_reporting(0);

class Thumbcrop
{
	
	
	/*
		Error Message can be accessed anywhere in the program. It retrieves all the 
		errors occured during the application.Using the error_flag we can check whether any error 
		occured or not.If zero no error.
	*/
	
	var $error_msg;	
	/*
		Actual path of the image. Same as givern from the user side
	*/
	
	var $filepath;	
	/*
		File Extension of the image given . Program allows only GIF/PNG/JPG
	*/	
	var $extension	="";
	/*
		Base name of the image file.
	*/
	var $filename	="";
	
	/*
		Application runtime variables .
	*/
	var $error_flag	=0;
	var $content_type="";
	var $image_x;
	var $image_y;
	var $image_tx;
	var $image_ty;
	var $info;
	var $max_width;
	var	$max_height;
	
	
	
	
	/*
		Check whether the file exists, or given the correct file type etc.
	*/
	function is_file_exists($image_path)
	{
		//echo $image_path;
			if(file_exists($image_path))
			{
				if(is_file($image_path))
				{
						$file_name	=	basename($image_path);						
						$extt		=	explode(".",$file_name);
						$cnt		=	count($extt);
						$this->extension	=	strtolower($extt[$cnt-1]);
						$this->filename		=	$file_name;	
						$this->filepath		=	$image_path;	
				}
				else
				{
					$this->error_msg[]	=	"Specified Arguement Is not A file";
					$this->error_flag++;
				}
			}
			else
			{
				$this->error_msg[]	=	"Cannot open the file , File does not exists";
				$this->error_flag++;
			}
	}
	/*
		Decides the content type of image 
	*/
	function get_content_type()
	{
		if(empty($this->extension))
		{
			$this->error_msg[]="cannot set the content type , extension unknown";
			$this->error_flag++;
		}
		else
		{
			if($this->extension=="jpg" || $this->extesnsion=="jpeg")
			{
				$this->content_type	=	"header(\"Content-type: image/jpeg\")";
			}
			else if($this->extension=="png")
			{
				$this->content_type	=	"header(\"Content-type: image/png\")";
			}
			else if($this->extension=="gif")
			{
				$this->content_type	=	"header(\"Content-type: image/gif\")";
			}
			else
			{
				$this->error_msg[]="Invalid File format : support only jpeg/gif/png";
				$this->error_flag++;
			}		
		}
	}
	
	/*
		Set the image size , width, height etc
	*/	
	function set_image_size($max_width,$max_height,$resize)
	{
			if(empty($max_height))
			{
				//$max_height=800;
			}
			list($width, $height, $type, $attr) = getimagesize($this->filepath);	
			$this->image_x		=	$width;
			$this->image_y		=	$height;
			$this->max_width	=	$max_width;
			$this->max_height	=	$max_height;
			
				//both constraints//
			if($max_width && $max_height)
			{
				if($resize==1)
				{
					$this->image_tx	=	$max_width;
					$this->image_ty	=	$max_height;
				}
				else if(($this->image_x>$max_width) &&($this->image_y>$max_height) )
				{
					
					if($this->image_x>=$this->image_y)
					{
						$nm_width	=	$this->max_width;
					 	$nm_height	=	($nm_width/$this->image_x)*$this->image_y;
						if($nm_height>$max_height)
						{
							$prp		=	$max_height/$nm_height;
							$nm_height	=	$nm_height*$prp;
							$nm_width	=	($prp)*$nm_width;
							
						}
						$this->image_tx	=	$nm_width;
						$this->image_ty	=	$nm_height;
						
					}
					else if($this->image_y > $this->image_x)
					{
					
						$nm_height	=	$this->max_height;
					 	$nm_width	=	($nm_height/$this->image_y)*$this->image_x;
						if($nm_width > $max_width)
						{
							$prp		=	$max_width/$nm_width;
							$nm_width	=	$nm_width*$prp;
							$nm_height	=	($prp)*$nm_height;
							
						}
						$this->image_tx	=	$nm_width;
						$this->image_ty	=	$nm_height;
					}
					
					
					
					
				}
				else if(($this->image_x<$max_width)&&($this->image_y<$max_height))
				{
					$this->image_tx	=	$this->image_x;
					$this->image_ty	=	$this->image_y;
				}
				else if($this->image_x>$max_width)
				{
					$nm_width	=	$max_width;
					$nm_height	=	($nm_width/$this->image_x)*$this->image_y;
					
					$this->image_tx	=	$nm_width;
					$this->image_ty	=	$nm_height;
				}
				else if($this->image_y>$max_height)
				{
					$nm_height	=	$max_height;
					$nm_width	=	($nm_height/$this->image_y)*$this->image_x;
					
					$this->image_tx	=	$nm_width;
					$this->image_ty	=	$nm_height;
				}
				else
				{
					$this->image_tx	=	$max_width;
					$this->image_ty	=	$max_height;
				}
				
			}
			else if(!empty($max_width))
			{
					$nm_width	=	$max_width;
					$nm_height	=	($nm_width/$this->image_x)*$this->image_y;
					
					$this->image_tx	=	$nm_width;
					$this->image_ty	=	$nm_height;
			}
			else if(!empty($max_height))
			{
					$nm_height	=	$max_height;
					$nm_width	=	($nm_height/$this->image_y)*$this->image_x;
					
					$this->image_tx	=	$nm_width;
					$this->image_ty	=	$nm_height;
			}
			else
			{
				
					$this->image_tx	=	$this->image_x;
					$this->image_ty	=	$this->image_y;
			}
			
			
					$this->image_tx	=	ceil($this->image_tx);
					$this->image_ty	=	ceil($this->image_ty);
	}
	
	/*
		Runtime and Configuration info 
	*/
	function get_info()
	{
		$this->info['Application']	=	"Sx_TMB";
		$this->info['Version']		=	"Version 1.1";
		$this->info['PHP Version']	=	"php 4.4";
		$this->info['GD Version']	=	"GD 2.0";
		$this->info['Copyright to']	=	"ThumbSx";
		$this->info['Programmer']	=	"Jiby John";
		$this->info['Original_x']	=	$this->image_x;
		$this->info['Original_y']	=	$this->image_y;
		$this->info['Thumb_x']		=	$this->image_tx;
		$this->info['Thumb_y']		=	$this->image_ty;
		$this->info['Error_count']	=	$this->error_flag;
		$this->info['Image_name']		=	$this->filename;
		$this->info['Extension']	=	$this->extension;
		$this->info['File_Path']	=	$this->filepath;
		$this->info['Max_width']	=	$this->max_width;
		$this->info['Max_height']	=	$this->max_height;
		
		print_r($this->info);
	}
	/*
		Creathe the thumb image from file
	*/
	
	function get_thumb_image($image_path,$max_width,$max_height,$cw,$ch)
	{
		
		$this->is_file_exists($image_path);	
		
		$cropHeight		=	$ch;
		$cropWidth		=	$cw;
			
		if($this->error_flag==0)
		{
			
			if($this->error_flag==0)
			{
				
				$this->set_image_size($max_width,$max_height,$resize);				
				$show	=	true;
				if($show)
				{
					if($this->extension=="jpg" || $this->extension=="jpeg")
					{					
						header("Content-type: image/jpeg");
					}
					else if($this->extension=="png")
					{
						header("Content-type: image/png");
					}
					else if($this->extension=="gif")
					{
						header("Content-type: image/gif");
					}
				}	
				
				if($this->extension=='jpg' || $this->extension=='jpeg')
				{
					$img	=	imagecreatefromjpeg($this->filepath);
				}
				else if($this->extension=='gif')
				{
					$img	=	imagecreatefromgif($this->filepath);
				}
				else if($this->extension=='png')
				{
					$img	=	imagecreatefrompng($this->filepath);
				}
				
				if($this->image_tx<$cropWidth && $this->image_ty<$cropHeight)
				{
					$new_img	=	imagecreatetruecolor($this->image_tx,$this->image_ty);
					$bgColor	=	imagecolorallocate($new_img,0,0,0);
					imagefilledrectangle($new_img,0,0,$this->image_tx,$this->image_ty,$bgColor);
					imagecopyresized($new_img,$img,0,0,0,0,$this->image_tx,$this->image_ty,$this->image_x,$this->image_y);
				}
				else
				{
					//echo "Sorry IM CUTIN";					
					$midX	=	ceil(($this->image_tx-$cropWidth)/2);
					$midY	=	ceil(($this->image_ty-$cropHeight)/2);
					
					if($midX%2!=0){
						$midX	=	$midX-1;						
					}
					if($midY%2!=0){
						$midY	=	$midY-1;
					}
					//echo $midX." ".$midY;
					
					//echo $midX+$cropWidth;
					$new_imgC	=	imagecreatetruecolor($this->image_tx,$this->image_ty);
					$bgColor	=	imagecolorallocate($new_imgC,255,255,255);
					imagefilledrectangle($new_imgC,0,0,$this->image_tx,$this->image_ty,$bgColor);
					
					imagecopyresized($new_imgC,$img,0,0,0,0,$this->image_tx,$this->image_ty,$this->image_x,$this->image_y);
					
					$new_img	=	imagecreatetruecolor($cropWidth,$cropHeight);
					$bg	=	imagecolorallocate($new_img,255,255,255);
					imagefilledrectangle($new_img,0,0,$cropWidth,$cropHeight,$bg);
					//$new_img	=	$new_imgC;				
					imagecopyresized($new_img,$new_imgC,0,0,0,0,$cropWidth,$cropHeight,$this->image_tx,$this->image_ty);
					//break;
				}
				
								
				if($this->extension=='jpg' || $this->extension=='jpeg')
				{
					imagejpeg($new_img);
				}
				else if($this->extension=='gif')
				{
					imagegif($new_img);
				}
				else if($this->extension=='png')
				{
					imagepng($new_img);
				}
				
				
				
			
				
			}
			else
			{
				echo "Ax_TMB Warning :";
				$this->get_info();
				print_r($this->error_msg);
			}
		}
		else
		{
			echo "Ax_TMB Warning :";
			$this->get_info();
			print_r($this->error_msg);
		
		}
		
	}
}


	
	
	
	
?>
