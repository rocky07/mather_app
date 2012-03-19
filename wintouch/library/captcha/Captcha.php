<?php




class Captcha_Captcha
{
	
	private $captchaText;
	private $canvasX;
	private $canvasY;
	private $fonts;
	
	function __construct($string,$width,$height)
	{
		$this->captchaText	=	$string;
		$this->canvasX		=	$width;
		$this->canvasY		=	$height;				
		putenv("GDFONTPATH=".dirname(__FILE__)."/fonts");		
		$this->fonts	=	array("Avgardn.ttf","frkgothi.ttf","lsansd.ttf");
		
	}
	
	
	function setText($string)
	{
		$this->captchaText	=	$string;
	}
	function getText()
	{
		return $this->captchaText;
	}
	
	function render()
	{
		$image			=	imagecreatetruecolor($this->canvasX,$this->canvasY);
		$backGround		= 	imagecolorallocate($image,rand(50,250),rand(50,250),rand(50,250));
		$borderColor	=	imagecolorallocate($image,rand(125,250),rand(125,255),rand(0,125));
		$textColor		=	imagecolorallocate($image,rand(125,250),rand(0,255),rand(125,125));
		
		$posY	=	ceil($this->canvasY/2);
		$posX	=	ceil($this->canvasX/2);
		$len	=	count($this->fonts);
		$font	=	dirname(__FILE__)."/fonts/".$this->fonts[rand(0,$len-1)];	
		imagefilledrectangle($image,0,0,$this->canvasX,$this->canvasY,$backGround);		
		imagerectangle($image,5,5,$this->canvasX-5,$this->canvasY-5,$borderColor);
		imagettftext($image,20,0,40,30,$textColor,$font,$this->captchaText);
		
				
		ob_start();
		header("Content-type:image/png");
		imagepng($image);
		ob_flush();
	}
	
}






?>