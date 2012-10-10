<h2>Client Search</h2>
<?php  
    echo $this->Form->create();
    echo $this->Form->input("first_name");
    echo $this->Form->input("last_name");
    echo $this->Form->end("Search"); 
?> 