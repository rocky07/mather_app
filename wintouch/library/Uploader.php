<?php

    class Uploader
    {
        private $destinationPath;
        private $errorMessage;
        private $extensions;
        private $allowAll;
        private $maxSize;
        private $uploadName;
        
        function __construct($path){
            $this->destinationPath  =   $path;
            $this->allowAll =   false;
        }
        
        function allowAllFormats(){
            $this->allowAll =   true;
        }
        
        function setMaxSize($sizeMB){
            $this->maxSize  =   $sizeMB * (1024*1024);
        }
        
        function setExtensions($options){
            $this->extensions   =   $options;
        }
        
		function setSameFileName(){
			$this->sameFileName	=	true;
		}
        function getExtension($string){
            $ext	=	"";
            try{
                    $parts	=	explode(".",$string);
                    $ext		=	strtolower($parts[count($parts)-1]);
            }catch(Exception $c){
                    $ext	=	"";
            }
            return $ext;
	}
        
        function setMessage($message){
            $this->errorMessage =   $message;
        }
        
        function getMessage(){
            return $this->errorMessage;
        }
        
        function getUploadName(){
            return $this->uploadName;
        }
        function setSequence($seq){
			$this->imageSeq	=	$seq;
		}
        function uploadFile($fileBrowse){
            $result =   false;
            $size   =   $_FILES[$fileBrowse]["size"];
            $name   =   $_FILES[$fileBrowse]["name"];
            $ext    =   $this->getExtension($name);
            if(!is_dir($this->destinationPath)){
                $this->setMessage("Destination folder is not a directory ");
            }else if(!is_writable($this->destinationPath)){
                $this->setMessage("Destination is not writable !");
            }else if(empty($name)){
                $this->setMessage("File not selected ");
            }else if($size>$this->maxSize){
                $this->setMessage("Too large file !");
            }else if($this->allowAll || (!$this->allowAll && in_array($ext,$this->extensions))){
                $util   =   new Utilities();
                $this->uploadName   =  $this->imageSeq."-".$util->getRandom()."_upload.".$ext;
				$this->destinationPath.$this->uploadName;
                if(move_uploaded_file($_FILES[$fileBrowse]["tmp_name"],$this->destinationPath.$this->uploadName)){
                    $result =   true;
                }else{
                    $this->setMessage("Upload failed , try later!");
                }
            }else{
                $this->setMessage("Invalid file format !");
            }
            return $result;
        }
        
        function deleteUploaded(){
            unlink($this->destinationPath.$this->uploadName);
        }
        
    }

?>