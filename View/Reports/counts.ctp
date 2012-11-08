<?php include("reportsDiv.ctp"); ?>

<div class="reports form">

    <h2><?php echo "Counts from " . $startDate . " to " . $endDate; ?>
        <Br />
        <?php
        $sexIdentifier = 'Clients';
        if ($sex == 'male'):
            echo ' for Men';
            $sexIdentifier = 'Men';
        elseif ($sex == 'female'):
            echo ' for Women';
            $sexIdentifier = 'Women';
        else: echo 'for Men and Women';
        endif;
        ?></h2>

    <h3>Clients</h3>
    Average Age of <?php echo $sexIdentifier . ": " . $ageClients; ?>
    <br />
    <?php
    if ($sex == 'male'):

        echo "Number of Men: $sexClients[0]";
    elseif ($sex == 'female'):
        echo "Number of Women: $sexClients[1]";

    else:
        echo "Number of clients: $numClients";
    endif;
    ?>
    <br />
    Average income of <?php echo $sexIdentifier . ": " . $incomeAvgClients; ?>
    <br />
    <?php if ($sex == 'female'): echo "Number of Pregnant Women: $statusClients[0] <br />";
    endif; ?>

    Number of Disabled <?php echo $sexIdentifier.": ".$statusClients[1]; ?>
    <br />
    Number of Handicapped <?php echo $sexIdentifier.": ".$statusClients[2]; ?>
    <br />
    Number of <?php echo $sexIdentifier; ?> with Stoves: <?php echo $statusClients[3]; ?>
    <br />
    Number of <?php echo $sexIdentifier; ?> with Refrigerators: <?php echo $statusClients[4]; ?>
    <br />
    Number of <?php echo $sexIdentifier; ?> with Cell Phones: <?php echo $statusClients[5]; ?>
    <br />
    Number of <?php echo $sexIdentifier; ?> with Cable TV: <?php echo $statusClients[6]; ?>
    <br />
    Number of <?php echo $sexIdentifier; ?> with Internet Access: <?php echo $statusClients[7]; ?>
    <br /><br />

    <h3>Resources</h3>
    Number of resources: <?php echo $numResources; ?>
    <br />
    Number of Resource Uses: <?php echo $countPeriod; ?>
    <br />
    Most popular resource: <?php echo $mostPopular; ?>

</div>
