<?php include("reportsDiv.ctp"); ?>
<div class="reports form">

    <div id="chart_div"><?php $this->GoogleChart->createJsChart($chart); ?></div>

    Number of Resources Used During this Period: <?php echo $numberResourceUses; ?><br />
</div>


