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
					<?php 
						echo $this->Html->link('Logout',array('controller' => 'Home', 'action' => 'logout'),array('class' => 'btn'));
					?>
					
					<?php 
					  	echo $this->Session->read('name');
					?>
				</div>
				
				<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php //echo $this->Html->image($proUser['Profile']['userPhoto'], array('class' => 'img-polaroid'));?>
				<h1><?php echo $project['AddProject']['projectName']; ?></h1><br/>
				
				<br/> <br/>
				<!-- list of users that can be added goes here -->
				<table class="table table-hover">
					<caption>Project Staff</caption>
					<thead>
						<tr>
							<th>User Name</th>
							<th>Company Name</th>
							<th>Add User</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$members = $project['AddProject']['projectMembers'];
							$addedmembers = explode(",", $members);
							foreach ($users as $user):
						?> 
							<tr>
								<td> <?php echo $this->Html->link($user['Register']['userName'], 
															array('controller' => 'Home', 'action' => 'viewProfile', $user['Register']['id'])); ?> </td>
								<td> <?php echo $user['Register']['companyName'];?> </td>
								<?php 
									foreach ($addedmembers as $addedmember):
										//echo $addedmember . "<br>";
										if ($addedmember != $user['Register']['id'])
										{
											$flag = 0;
										}
										else 
										{
											$flag = 1;
											break;
										}
									endforeach;
									if ($flag == 0)
									{
								?>
								<td> <?php echo $this->Html->link('Add User', array('controller' => 'SuperAdmin', 'action' =>'addMember','user_id' => $user['Register']['id'], 'proj_id' => $project['AddProject']['id'])); ?>
							    </td>
							    <?php 
										}
										else
										{
							    ?>
								<td> <?php echo 'Add User'; ?>
							    </td>
							<?php 
										}
								
							?>
							</tr>
						<?php 
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</html>