<?php

// Checks if you've got the GD library installed
if (!extension_loaded("gd"))
{
	// If not, try to load it
	if (!dl("gd.so"))
	{
		die("You don't have the GD library installed!");
	}
}
class easyImageEdit
{
	var $image;
	var $image_type;
	
	/**
	 * Function for loading the file
	 * @param $filename - The file
	 */
	function load($filename)
	{
		// Check if file exists
		if (!file_exists($filename))
			die("File not found");
		
		// Load image info
		$image_info = getimagesize($filename);
		// Save the image type
		$this->image_type = $image_info[2];
		
		// Check the image type and create new image
		if ($this->image_type == IMAGETYPE_JPEG)
		{
			$this->image = imagecreatefromjpeg($filename);
		}
		elseif ($this->image_type == IMAGETYPE_GIF)
		{
			$this->image = imagecreatefromgif($filename);
		}
		elseif ($this->image_type == IMAGETYPE_PNG)
		{
			$this->image = imagecreatefrompng($filename);
		}
		// If not a supported image type
		else
		{
			// Return nothing
			return false;
		}
	}
	
	/**
	 * Function for getting the image width
	 */
	function getWidth()
	{
		return imagesx($this->image);
	}
	
	/**
	 * Function for getting the image height
	 */
	function getHeight()
	{
		return imagesy($this->image);
	}
	
	/**
	 * Function for resizing image to heigt
	 * @param $height - Height of the resized image
	 */
	function resizeToHeight($height)
	{
		// Calculate the width/height ratio
		$ratio = $height / $this->getHeight();
		// Set the width correctly according to the ratio
		$width = $this->getWidth() * $ratio;
		// Resize the image to new dimensions
		$this->resize($width, $height);
	}
	
	/**
	 * Function for resizing image to width
	 * @param $width - Width of the resized image
	 */
	function resizeToWidth($width)
	{
		// Calculate the width/height ratio
		$ratio = $width / $this->getWidth();
		// Set the height correctly according to the ratio
		$height = $this->getHeight() * $ratio;
		// Resize the image to new dimensions
		$this->resize($width, $height);
	}
	
	/**
	 * Function for scaling the image
	 * @param $scale - Destination size. Example: 0.5 = 50%, 2 = 200%
	 */
	function scale($scale = 0.5)
	{
		// Calculate the new width
		$width = $this->getWidth() * $scale;
		// Calculate the new height
		$height = $this->getHeight() * $scale;
		// Resize the image to new dimensions
		$this->resize($width, $height);
	}
	
	/**
	 * Function for resizing the image to the specified dimensions
	 * @param $width - Width of the destination image
	 * @param $height - Height of the destination image
	 */
	function resize($width, $height)
	{
		// Create new image
		$new_image = imagecreatetruecolor($width, $height);
		// If this image is PNG or GIF
		if ($this->image_type == IMAGETYPE_GIF || $this->image_type == IMAGETYPE_PNG)
		{
			// Preserve transparency
			imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
		}
		// Copy the data of the old image into the new image
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		// Replace the old image
		$this->image = $new_image;
	}
	
	/**
	 * Function for cropping the photos
	 * @param $location - Where to center a square crop.
	 * If picture is landscape (width > height) you can choose between "left", "center" and "right"
	 * If picture is portrait (height > width) you can choose between "top", "center" and "bottom"
	 * NOTE: If the image already is square, this function will only return false
	 */
	function crop($location = "center")
	{
		// Is the width the biggest side?
		if ($this->getWidth() > $this->getHeight())
		{
			// If the location is set to center
			if ($location == "center")
			{
				// Calculate X and Y positions
				$x_pos = ceil(($this->getWidth() - $this->getHeight()) / 2);
				$y_pos = 0;
			}
			// If the location is set to left
			elseif ($location == "left")
			{
				// Calculate X and Y positions
				$x_pos = 0;
				$y_pos = 0;
			}
			// If the location is set to right
			elseif ($location == "right")
			{
				// Calculate X and Y positions
				$x_pos = ($this->getWidth() - $this->getHeight());
				$y_pos = 0;
			}
			
			// Set new width and height to the original image height
			$new_width = $this->getHeight();
			$new_height = $this->getHeight();
		}
		// Is the height the biggest side?
		elseif ($this->getHeight() > $this->getWidth())
		{
			// If the location is set to center
			if ($location == "center")
			{
				// Calculate X and Y positions
				$x_pos = 0;
				$y_pos = ceil(($this->getHeight() - $this->getWidth()) / 2);
			}
			// If the location is set to top
			elseif ($location == "top")
			{
				// Calculate X and Y positions
				$x_pos = 0;
				$y_pos = 0;
			}
			// If the locations is set to bottom
			elseif ($location == "bottom")
			{
				// Calculate X and Y positions
				$x_pos = 0;
				$y_pos = ($this->getHeight() - $this->getWidth());
			}
			
			// Set new width and height to the original image width
			$new_width = $this->getWidth();
			$new_height = $this->getWidth();
		}
		else
		{
			return false;
		}
		
		$new_width	= 150;
		$new_height	=	157;
		// Create new image
		$new_image = imagecreatetruecolor($new_width, $new_height);
		// If this image is PNG or GIF
		if ($this->image_type == IMAGETYPE_GIF || $this->image_type == IMAGETYPE_PNG)
		{
			// Preserve transparency
			imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
		}
		// Copy the data of the old image into the new image
		imagecopyresampled($new_image, $this->image, 0, 0, $x_pos, $y_pos, $this->getWidth(), $this->getHeight(), $this->getWidth(), $this->getHeight());
		// Replace the old image
		$this->image = $new_image;
	}
	
	/**
	 * Function for watermarking the image
	 * @param $text - Text that will be watermarked
	 * @param $size - Text size
	 * @param $color - Array with text color (RGB values)
	 * @param $x_pos - X position of text
	 * @param $y_pos - Y position of text
	 * @param $angle - Angle of text
	 * @param $transparency - Transparency of text (0 (no transparency) - 127 (full transparency))
	 * 
	 * PS: Parts of this function is commented out because you need to provide a TrueType font file!
	 */
	function watermark($text, $size = 20, $color = array(255, 255, 255), $x_pos = 10, $y_pos = 153, $angle = 0, $transparency = 0, $font = "arial.ttf")
	{
		// If the transparency is set below 0
		if ($transparency < 0)
		{
			// Set the transparency to 0 (min)
			$transparency = 0;
		}
		// If the transparency is set above 1
		else if ($transparency > 1)
		{
			// Set the transparency to 127 (max)
			$transparency = 127;
		}
		// If the transparency is above 0 and below 1
		else
		{
			// Set new transparency based on the percentage between min (0) and max (127)
			$transparency = round(($transparency * 100) * 1.27);
		}
		
		// Set the color and transparency
		$text_color = imagecolorallocatealpha($this->image, $color[0], $color[1], $color[2], $transparency);
		// Add the text to the image
		imagettftext($this->image, $size, $angle, $x_pos, $y_pos, $text_color, $font, $text) or die("Couldn't add watermark");
	}
	
	/**
	 * Function for outputting the image to the browser
	 * @param $image_type - Image file type (default is JPEG)
	 * @param $compression - Image compression (if JPEG)
	 */
	function output($image_type = null, $compression = 75)
	{
		// If image type is not provided
		if (!isset($image_type) || $image_type == null || $image_type == "")
		{
			// Use the original image type
			$image_type = $this->image_type;
		}
		
		// Check the image type
		if ($image_type == IMAGETYPE_JPEG)
		{
			// Tell the browser this is an JPEG image
			header("content-type: image/jpeg");
			// Display the image
			imagejpeg($this->image, null, $compression) or die("Couldn't display the JPEG");
		}
		elseif ($image_type == IMAGETYPE_GIF)
		{
			// Tell the browser this is an GIF image
			header("content-type: image/gif");
			// Display the image
			imagegif($this->image) or die("Couldn't display the GIF");
		}
		elseif ($image_type == IMAGETYPE_PNG)
		{
			// Tell the browser this is an PNG image
			header("content-type: image/png");
			// Display the image
			imagepng($this->image) or die("Couldn't display the PNG");
		}
		// If not a supported image type
		else
		{
			// Return nothing
			return false;
		}
		
		// Destroy the image and free resources
		imagedestroy($this->image);
	}
	
	/**
	 * Function for saving the image with compression, permissions etc
	 * @param $filename - Image file name
	 * @param $image_type - Image type
	 * @param $compression - Image compression (if JPEG)
	 * @param $permissions - Image permissions, should be octal (ie "0755")
	 */
	function save($filename, $image_type = null, $compression = 75, $permissions = null)
	{
		// If image type is not provided
		if (!isset($image_type) || $image_type == null || $image_type == "")
		{
			// Use the original image type
			$image_type = $this->image_type;
		}
		
		// Check the image type
		if ($image_type == IMAGETYPE_JPEG)
		{
			// Save the image as JPEG
			imagejpeg($this->image, $filename, $compression) or die("Couldn't save the image as JPEG");
		}
		elseif ($image_type == IMAGETYPE_GIF)
		{
			// Save the image as GIF
			imagegif($this->image, $filename) or die("Couldn't save the image as GIF");
		}
		elseif ($image_type == IMAGETYPE_PNG)
		{
			// Save the image as PNG
			imagepng($this->image, $filename) or die("Couldn't save the image as PNG");
		}
		// If not a supported image type
		else
		{
			// Return nothing
			return false;
		}
		
		// If permissions are set
		if ($permissions != null)
			// Set the new permissions
			chmod($filename, $permissions);
		
		// Destroy the images and free resources
		imagedestroy($this->image);
	}
	
	function winner($text)
	{
		$color = array(0, 0, 0);
		$wt	=	$this->getWidth();
		$black = imagecolorallocate($this->image, 0, 0, 0);
		imagefill($this->image, 0, 0, $text_color);
		imagefilledrectangle($this->image, 0, 130, $wt, 155, $black);
	}
}

?>