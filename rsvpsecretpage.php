<?php
    
    $db = new SQLite3('../wedding.db');
    $personTable = 'person';
    $songTable   = 'song';
    
    
    // Gets people associated with this password
    $groups = array();
    $statement = $db->prepare("select * from $personTable where rsvp != \"unsure\" order by rsvp desc");
    $results = $statement->execute();
    while($row = $results->fetchArray(SQLITE3_ASSOC))
    {
        $row['display_name'] = $row['displayName'];
        unset($row['displayName']);
        $groups[$row['password']][] = $row;
    }
    $results->finalize();
    $statement->close();
    
    // Gets songs associated with this password
    $groupSongs = array();
    $statement = $db->prepare("select * from $songTable");
    $results = $statement->execute();
    while($row = $results->fetchArray(SQLITE3_ASSOC))
        $groupSongs[$row['password']][] = $row['song'];
    $results->finalize();
    $statement->close();
    
    $db->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>RSVPs</title>
</head>

<body>
<?php foreach($groups as $password => $group) { ?>
    <p>
    <?php foreach($group as $person) { ?>
        <?php echo $person['display_name']; ?>:
        <?php echo $person['rsvp']; ?><br />
    <?php } ?>
    <?php if(isset($groupSongs[$password])) { ?>
        Songs:<br />
        <ul>
            <?php foreach($groupSongs[$password] as $song) { ?>
                <li><?php echo $song; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    </p>
    <hr />
<?php } ?>
</body>

</html>
