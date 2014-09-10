<?php
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $url = $address
        ? 'comgooglemaps://?q=' . rawurlencode($address)
        : null;
    function e($s) { echo htmlentities($s, ENT_QUOTES | ENT_HTML401); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Google Maps Link Maker</title>
        <style>
            html,
            body { margin: 0; border: 0; padding: 0; background-color: rgb(214, 207, 156); font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; }
            input { margin-top: .15em; font-size: 1em; }
            body { margin: 4px 0; font-size: 3em; }
            a,
            a:hover,
            a:visited { color: rgb(41, 121, 102); text-decoration: none; }
            label,
            input[type=submit] { color: rgb(63, 53, 39); font-weight: 700; }
            input[type=text],
            input[type=url] { margin: 0.2em 2px; border: 1px solid rgb(136, 136, 0); padding: 2px; width: 90%; background-color: #b9aC65; color: rgb(88, 88, 43); }
            input[type=text]:focus,
            input[type=url]:focus { background-color: #c5b03b; }
            input { margin-top: 0.2em; }
            ::-webkit-input-placeholder { color: rgb(132, 138, 158); }
            :-moz-placeholder { /* Firefox 18- */ color: rgb(132, 138, 158);  }
            ::-moz-placeholder {  /* Firefox 19+ */ color: rgb(132, 138, 158);  }
            :-ms-input-placeholder {  color: rgb(132, 138, 158);  }
        </style>
    </head>
    <body>
        <form action="gm" method="post"><center>
            <label for="address">Address:</label><br />
            <input
                id="address"
                name="address"
                type="text"
                placeholder="123 Main St., ..."
                <?php if($address) { ?>value="<?php e($address); ?>" <?php }
                else { ?>autofocus <?php } ?>
                required
            /><br />
            <input type="submit" value="Linkify" /><br /><br />
            
            <?php if($url) { ?>
                <label for="url">URL:</label><br />
                <input
                    id="url"
                    type="url"
                    value="<?php e($url); ?>"
                    autofocus
                /><br /><br />
                
                <label>Link:</label><br />
                <a href="<?php e($url); ?>" /><?php e($url); ?></a>
            <?php } ?>
        </center></form>
    </body>
</html>
