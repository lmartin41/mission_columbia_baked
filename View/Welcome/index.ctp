<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>

<div class="welcome index no-border">
	<strong>Home</strong><br /><br />
	
	Welcome, <?php echo $current_user['username']; ?>.<br /><br />
	
	<p>Mission Columbia allows users to create, read, update, delete and track <br />clients, resource streams, and 
	the organizations responsible for those resource streams.</p>

	<?= $this->GoogleMap->map(); ?>

</div>