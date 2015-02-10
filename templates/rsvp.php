<?php do { ?>
<?php
    
    $db = new SQLite3('../wedding.db');
    $personTable = 'person';
    $songTable   = 'song';
    
    $numSongsAdded = 0;
    $tooManySongs = false;
    if(isset($_POST['password']) && is_string($_POST['password']))
    {
        $logfile = fopen('../logfiles/rsvp.access', 'a');
        fwrite($logfile, json_encode($_POST) . "\n");
        fclose($logfile);
        
        $password = strtolower(trim($_POST['password']));
    }
    elseif(isset($_POST['groupname'], $_POST['people'], $_POST['songs']) &&
           is_string($_POST['groupname']) && is_array($_POST['people']) &&
           is_array($_POST['songs']))
    {
        $logfile = fopen('../logfiles/rsvp.access', 'a');
        fwrite($logfile, json_encode($_POST) . "\n");
        fclose($logfile);
        
        $password = strtolower(trim($_POST['groupname']));
        
        // Updates person infos
        $rsvpChangesPerformed = false;
        foreach($_POST['people'] as $name => $person)
        {
            //// real error
            if(!(isset($person['rsvp']) && array_key_exists('email', $person)))
            {
                echo 'bad person data';
                break;
            }
            
            $statement = $db->prepare("update $personTable set rsvp = :rsvp, " .
                'email = :email where password = :password and name = :name');
            $statement->bindValue(':rsvp',  (string) $person['rsvp'],  SQLITE3_TEXT);
            $statement->bindValue(':email', (string) $person['email'], SQLITE3_TEXT);
            $statement->bindValue(':password', $password, SQLITE3_TEXT);
            $statement->bindValue(':name',     $name,     SQLITE3_TEXT);
            $results = $statement->execute();
            $results->finalize();
            $statement->close();
            
            //// real error
            if($db->changes() !== 1)
            {
                echo 'unable to perform update';
                break;
            }
            $rsvpChangesPerformed = true;
        }
        // If no rsvp changes were made, then something was wrong with the parameters and
        //   we shouldn't trust the rest of the request
        //// real error
        if(!$rsvpChangesPerformed)
        {
            echo "\nno rsvp changes made";
            break;
        }
        
        // Checks songs currently in db for password
        $maxSongsPerPassword = 50;
        $statement = $db->prepare("select count(*) from $songTable where password = :password");
        $statement->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $statement->execute()->fetchArray(SQLITE3_NUM);
        $numSongsInDb = reset($result);
        $results->finalize();
        $statement->close();
        
        // Adds songs to db unless
        //   they are already at the max and aren't trying to add anything
        if(!(count($_POST['songs']) == $maxSongsPerPassword &&
                $numSongsInDb == $maxSongsPerPassword))
            foreach($_POST['songs'] as $song)
                if(trim($song))
        {
            if($numSongsInDb >= $maxSongsPerPassword)
            {
                $tooManySongs = true;
                break;
            }
            
            $statement = $db->prepare("insert or ignore into $songTable values (:password, :song)");
            $statement->bindValue(':password', (string) $password, SQLITE3_TEXT);
            $statement->bindValue(':song', trim((string) $song),   SQLITE3_TEXT);
            $results = $statement->execute();
            $changes = $db->changes();
            if(is_int($changes))
            {
                $numSongsAdded += $changes;
                $numSongsInDb  += $changes;
            }
            $results->finalize();
            $statement->close();
        }
    }
    else
    {
        //// real error
        echo 'invalid POST parameters: ' . var_export($_POST, true);
        break;
    }
    
    // Gets people associated with this password
    $people = array();
    $statement = $db->prepare("select * from $personTable where password = :password");
    $statement->bindValue(':password', $password, SQLITE3_TEXT);
    $results = $statement->execute();
    while($row = $results->fetchArray(SQLITE3_ASSOC))
    {
        $row['display_name'] = $row['displayName'];
        unset($row['displayName']);
        $people[] = $row;
    }
    $results->finalize();
    $statement->close();
    
    //// real error
    if(!$people)
    {
        echo 'Wrong password!';
        break;
    }
    
    // Gets songs associated with this password
    $songs = array();
    $statement = $db->prepare("select song from $songTable where password = :password " .
        'order by song collate nocase asc');
    $statement->bindValue(':password', $password, SQLITE3_TEXT);
    $results = $statement->execute();
    while($row = $results->fetchArray(SQLITE3_ASSOC))
        $songs[] = $row['song'];
    $results->finalize();
    $statement->close();
    if(!$songs) $songs = array('');
    
    $db->close();
?>
<form id="rsvpform" method="POST" autocomplete="off" target="_blank">
    <input type="hidden" name="groupname" value="<?php echo h($password); ?>" />
    <?php foreach($people as $i => $person) { ?>
        <?php $name = h($person['name']); ?>
        <h3><div><?php echo h($person['display_name']); ?></div></h3>
        <div class="radio field one">
            <input id="rfRsvp<?php  echo $i; ?>1" name="people[<?php echo $name; ?>][rsvp]"
                type="radio" value="yes"
                <?php if($person['rsvp'] == 'yes')    { ?>checked <?php } ?>/>
            <label for="rfRsvp<?php echo $i; ?>1">I will absolutely be attending</label>
        </div>
        <div class="radio field two">
            <input id="rfRsvp<?php  echo $i; ?>2" name="people[<?php echo $name; ?>][rsvp]"
                type="radio" value="no"
                <?php if($person['rsvp'] == 'no')     { ?>checked <?php } ?>/>
            <label for="rfRsvp<?php echo $i; ?>2">I regrettably cannot attend</label>
        </div>
        <div class="radio field three">
            <input id="rfRsvp<?php  echo $i; ?>3" name="people[<?php echo $name; ?>][rsvp]"
                type="radio" value="unsure"
                <?php if($person['rsvp'] == 'unsure') { ?>checked <?php } ?>/>
            <label for="rfRsvp<?php echo $i; ?>3">I'll get back to you by April 2nd</label>
        </div>
        <div class="email field"><!--
            --><label for="rfRsvp<?php echo $i; ?>Email">Email:</label><!--
            --><input id="rfRsvp<?php  echo $i; ?>Email" name="people[<?php echo $name; ?>][email]"
                type="email" placeholder="me@gmail.com"
                <?php if($person['email']) { ?>value="<?php echo h($person['email']); ?>" <?php } ?>/><!--
        --></div>
    <?php } ?>
    
    <?php $multiplePeople = count($people) > 1; ?>
    <?php $numSongs = count($songs); ?>
    <?php $multipleSongs = $numSongs > 1; ?>
    <label id="rfSongsLabel" for="rfSong0">
        <?php
            if($multiplePeople) { ?>We<?php }
            else { ?>I<?php }
        ?> promise to dance <span class="spacer"></span>if you play
        <span id="thissong"><?php
            if($multipleSongs) { ?>these songs<?php }
            else { ?>this song<?php }
        ?></span>:
    </label>
    <div id="rfSongsAndButton">
        <span id="rfSongs" data-numsongs="<?php echo $numSongs; ?>"
                data-num-songs-added="<?php echo $numSongsAdded; ?>"
                data-too-many-songs="<?php echo (int) $tooManySongs; ?>">
            <?php $lastSongIndex = $numSongs - 1; ?>
            <?php foreach($songs as $i => $song) { ?>
                <input id="rfSong<?php echo $i; ?>" name="songs[<?php echo $i; ?>]" type="text"
                    placeholder="At Last by Etta James"
                    <?php if($song) { ?>value="<?php echo h($song); ?>" <?php } ?>/>
                <?php if($i != $lastSongIndex) { ?><br /><?php } ?>
            <?php } ?>
        </span>
        <button id="rfAnotherSong">Another?</button>
    </div>
    
    <div class="field"><!--
        --><img class="left  loader" src="images/ajax-loader.gif" /><!--
        --><input type="submit" value="RSVP" /><!--
        --><img class="right loader" src="images/ajax-loader.gif" /><!--
    --></div>
</form>
<?php }  while(0); ?>
