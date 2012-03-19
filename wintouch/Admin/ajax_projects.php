<?php 
$no	=	$_GET["no"];

?>
			<div class="row800">
							<div class="row300"><strong>Image</strong></div>
							<div class="row150"><strong>Name & Location</strong></div>
							<div class="row150"><strong>Link</strong></div>
			</div>

		<?php for($i=0;$i<$no;$i++){?>
			<div class="row800">
							<div class="row300"><span class="required">*</span><input type="file" name="txtImage<?php echo $i;?>" id="txtstage<?php echo $i;?>" ></div>
							<div class="row150"><span class="required">*</span><input type="text" name="txtSquare<?php echo $i;?>" id="txtstage<?php echo $i;?>" /></div>
			
			                <div class="row150"><span class="required">*</span><input type="text" name="txtStair<?php echo $i;?>" id="txtstage<?php echo $i;?>" /></div>
			</div>
			</div>
			<?php }?>
			<div class="row700">
							<div class="row200">&nbsp;</div>
							<div class="row250"><input type="submit" name="txtSub"  value="Save"/></div>
			</div>