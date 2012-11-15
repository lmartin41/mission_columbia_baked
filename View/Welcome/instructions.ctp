<script>
	$(document).ready(function()
	{
		$("#browser").accordion({heightStyle: "content"});
		$("#os").accordion({heightStyle: "content"});
	});
</script>
<p>
	Hello,
	<br/>
	If you are familiar with the website and have already set up your browser to work with this website then
	please continue on by 
	<?php echo $this->Html->link("signing in", array('controller' => 'users', 'action' => 'login'))?>.
</p>
<p>If you are greeted with an error message that looks like</p>
<div id="browser">
	<h2>Internet Explorer</h2>
	<div><?php echo $this->Html->image('ie_security_error.png', array('alt' => 'Internet Explorer Error'))?></div>
	<h2>Chrome</h2>
	<div><?php echo $this->Html->image('chrome_security_error.png', array('alt' => 'Chrome Error'))?></div>
	<h2>Firefox</h2>
	<div><?php echo $this->Html->image('firefox_security_error.png', array('alt' => 'Firefox Error'))?></div>
</div>
<br/>
<p>
	it is a known issue.  The reason for the error is that Georgia Tech creates it's own certificates and they
	are not included as a &quot;Trusted Authority&quot; by default.  For more information 
	<a href="http://ca.gatech.edu/information.php" target="_blank">click here</a>.
	There are two ways to fix the problem.
</p>
<p>
	The <strong>recommended</strong> way to solve the problem is to follow the instructions for your 
	operating system below.
</p>
<p>
	If you are in a hurry or don&apos;t feel comfortable following those instructions, you can always just
	click the option to &quot;proceed anyways&quot;.  It should be noted that this option leaves you vulnerable
	security threats in the future.
</p>
<div id="os">
	<h2>Windows</h2>
	<div class="black-text white-background">
		<p>
			Click <a href="http://ca.gatech.edu/certificates/gt-server-root.der" target="_blank">here</a> 
			to download the certificate.
			<br/>
			<br/>
			Then click &quot;open&quot;
			<br/>
			<?php echo $this->Html->image('windows-savefile.gif', array('alt' => 'Save image')); ?>
			<br/>
			<br/>
			Then click &quot;install&quot;
			<br/>
			<?php echo $this->Html->image('windows-certinfo.gif', array('alt' => 'Certificate image')); ?>
			<br/>
			<br/>
			<strong>OPTIONAL:</strong> Depending on the version of windows you might have the following screen. Make sure to click
			&quot;current user&quot;
			<br/>
			<?php echo $this->Html->image('windows-select-user.png', array('alt' => 'Chrome Error')); ?>
			<br/>
			<br/>
			Then
			<br/>
			<?php echo $this->Html->image('windows-select-trusted-root.jpg', array('alt' => 'Select Trusted Root')); ?>
			<br/>
			<br/>
			Then
			<br/>
			<?php echo $this->Html->image('windows-verify-thumbprint.jpg', array('alt' => 'Verify Thumbprint')); ?>
			<br/>
			<br/>
			Then
			<br/>
			<?php echo $this->Html->image('windows-importcomplete.jpg', array('alt' => 'Import complete')); ?>
			<br/>
			<br/>
			Then
			<br/>
			<?php echo $this->Html->image('windows-importsuccess.jpg', array('alt' => 'Import success')); ?>
			<br/>
			<br/>
			<strong>Close your browser</strong> and re-open it.  Then come back here and the error should be gone
			when you try to log in.
		</p>
	</div>
	<h2>Apple</h2>
	<div class="black-text white-background">
		<p>
			Click <a href="http://ca.gatech.edu/certificates/gt-server-root.crt" target="_blank">here</a> 
			to download the certificate.
			<br/>
			<br/>
			Open the file and you should see a screen like this:
			<br/>
			<?php echo $this->Html->image('apple-root-import.jpg', array('alt' => 'Import key')); ?>
			<br/>
			<br/>
			Then click &quot;ok&quot;.  After you do, you should be greeted with the next screen.
			Make sure that the thumbprint in your window matches this one.
			<br/>
			<?php echo $this->Html->image('apple-root-fingerprints.jpg', array('alt' => 'Import fingerprint')); ?>
			<br/>
			<br/>
			You will then be asked to verify your credentials.
			<br/>
			<?php echo $this->Html->image('apple-keychain-auth.gif', array('alt' => 'Import authorization')); ?>
			<br/>
			<br/>
			<strong>Close your browser</strong> and re-open.  Come back to here and go to the sign in page.
			Everything should work now.
		</p>
	</div>
</div>