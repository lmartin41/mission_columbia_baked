<?php

?>

<p>
	Hello,
	<br/>
	If you are familiar with the website and have already set up your browser to work with this website then
	please continue on by 
	<?php echo $this->Html->link("signing in", array('controller' => 'users', 'action' => 'login'))?>.
</p>
<p>
	If you are greeted with an error message that looks like
	<br/>
	<?php echo $this->Html->image('ie_security_error.png', array('alt' => 'Internet Explorer Error'))?>
	<br/>
	Or
	<br/>
	<?php echo $this->Html->image('chrome_security_error.png', array('alt' => 'Chrome Error'))?>
	<br/>
	Or
	<br/>
	<img alt="Firefox Error" />
	<br/>
	Then follow the directions for your operating system.
</p>