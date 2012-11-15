
<?php echo $this->Html->script('https://maps-api-ssl.google.com/maps/api/js?key=AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI&sensor=true', false); ?>

<?php echo $this->Html->script('jquery.ui.map.min.js'); ?>

<!--the below js file aids the filter functionality -->
<?php echo $this->Html->script('demo.js'); ?>


<!-- my key is: AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI 
if needed, just add it between js and sensor; example: ...js?key=MYAPIKEY&sensor...-->

<!-- the helper used for the gMap: https://github.com/marcferna/CakePHP-GoogleMapHelper -->

<div class="welcome index no-border">
	<strong>Home</strong><br /><br />
	
	Welcome, <?php echo $current_user['username']; ?>.<br /><br />
	
	<p>Mission Columbia allows users to create, read, update, delete and track <br />clients, resource streams, and 
	the organizations responsible for those resource streams.</p>

	<?php?>

</div>