<div class="customize index no-border">
	<?php echo $this->Html->link(__('Customize Tips'), array('controller' => 'tips', 'action' => 'index')); ?>
	<br/>
	<br/>
	<?php
		if( isset($options['georgia_tech_ssl_documentation']) )
		{ 
			if( $options['georgia_tech_ssl_documentation'] == false )
			{
				echo $this->Html->link('Turn Georgia Tech SSL Documentation On', array('action' => 'index', '?' => array('doc' => 'on')));
			}
			else
			{
				echo $this->Html->link('Turn Georgia Tech SSL Documentation Off', array('action' => 'index', '?' => array('doc' => 'off')));
			}
		}
	?>
</div>