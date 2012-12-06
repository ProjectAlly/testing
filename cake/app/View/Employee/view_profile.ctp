<!DOCTYPE html>
<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
<html lang="en">
	<div class="container-fluid">
		<div class="row-fluid">
				<div class="span2">
					<!-- Sidebar content -->
				<?php echo $this->element('sidebar/fix_side'); ?>
				</div>
				
				<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid'));?>
				<h1><?php echo $proUser['Profile']['userName']; ?></h1><br/>
				
				Company 
				<?php 
					echo $proUser['Profile']['companyName']; 
				?><br/><br/>
				
				Email Id
				<?php 
					echo $proUser['Profile']['inputEmail']; 
				?><br/><br/>
				
				Date Of Birth 
				<?php 
					if(isset($proUser['Profile']['userDob'])) 
							echo $proUser['Profile']['userDob']; 
				?><br/><br/>
				
				Work Email Id
				<?php 
					if(isset($proUser['Profile']['workEmail'])) 
							echo $proUser['Profile']['workEmail']; ?><br/><br/>
				
				Address 
				<?php 
					if(isset($proUser['Profile']['userAddress'])) 
							echo $proUser['Profile']['userAddress']; ?><br/><br/>
				
				Contacts
				<?php 
					if(isset($proUser['Profile']['userMobile'])) 
							echo $proUser['Profile']['userMobile']; ?><br/>
				
				Home
				<?php	if(isset($proUser['Profile']['userHome'])) 
								echo $proUser['Profile']['userHome']; ?>
				<br/> <br/>
			</div>
		</div>
	</div>

</html>