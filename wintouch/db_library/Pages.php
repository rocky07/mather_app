<?php

class Pages
{

	
	function getPages($current,$total,$limit){
		
		$offset	=	9;
		$start	=	$current-$offset;
		if($start<=0){
			$start	=	1;
		}
		$end	=	$current+$offset;
		if($end>$total){
			$end	=	$total;
		}
		$pages	=	array();
		for($i=$start;$i<=$end;$i++){
			$pages[]	=	$i;	
		}
		return $pages;
		
	}
	
	function getNext($current,$total,$limit){
		if($current<$total){
			$next	=	$current+1;
			$next	=	($next-1)*$limit;
		}else{
			$next	=	($total-1)*$limit;
		}
		return $next;
	}
	
	function getPrev($current,$total,$limit){
		if($current>1){
			$prev	=	$current-1;
			$prev	=	($prev-1)*$limit;
		}else{
			$prev	=	0;
		}
		return $prev;
	}
	function getFirst($total,$limit){
		return 0;
	}
	function getLast($total,$limit){
		return ($total-1)*$limit;
	}
}

?>