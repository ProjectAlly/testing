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
				<a href="#myModal" role="button" class="btn" data-toggle="modal">Login</a>
				<!-- Modal -->
				<div style="display: none;" class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    <h3 id="myModalLabel">Login</h3>
				  </div>
				  <div class="modal-body">
				  	<?php 
						$options = array(
						'label' => false,
						'placeholder' => 'Email',
						'div' => array(
							'class' => 'controls'
							)
						);
					
					
					//at present model name isn't specified....it will be specified as per
					//requirement.
					echo $this->Form->create('UserInfo',array('class' => 'form-horizontal',
												'url' => array('controller' => 'Home',
													'action' => 'authenticate')));
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputEmail', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('inputEmail',$options);
					echo "</div>";
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputPassword', 'Password', array('class' => 'control-label'));
						echo $this->Form->input('inputPassword',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'div' => array(
																	'class' => 'controls'
																	)
																   ));
					echo "</div>";
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						//echo $this->Form->label(null,'Remember me',array('class' => 'checkbox'));
					?>
					<label class="checkbox">
					<?php 
					echo $this->Form->checkbox('Remember me',array('label' => false));
						//echo " Remember me";	
					echo "Remember Me </label>";
						echo $this->Form->submit('Login',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";
					?>		
				  </div>
				  <div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				    <button class="btn btn-primary">Save changes</button>
				  </div>
				</div>
			</div>
			<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<h1><?php echo $user['Register']['userName']; ?></h1>
				Company: <?php echo $user['Register']['companyName']; ?><br/>
				Email Id: <?php echo $user['Register']['inputEmail']; ?>
			</div>
		</div>
	</div>

</html>