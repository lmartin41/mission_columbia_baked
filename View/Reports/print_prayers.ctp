<h1><?php echo "Prayer Journal"; ?></h1>
<table cellpadding = "0" cellspacing = "15">
    <tr>
        <th><?php echo "Client Name"; ?></th>
        <th><?php echo "Request" ?></th>
        <th><?php echo "Comments" ?></th>
        <th><?php echo "Date" ?></th>
    </tr>
    <?php foreach ($prayerRequests as $prayerRequest): ?>
        <tr>
            <td><?php echo $prayerRequest['Client']['last_name'] . " " . $prayerRequest['Client']['first_name']; ?></td>
            <td><?php echo $prayerRequest['PrayerRequest']['request']; ?></td>
            <td><?php echo $prayerRequest['PrayerRequest']['comments']; ?></td>
            <td><?php echo $prayerRequest['PrayerRequest']['created']; ?></td>

        </tr>
    <?php endforeach; ?>
</table>
