<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="kewords"     content="wedding, wedding website, vincent garcia, jacklin sammis" />
        <meta name="description" content="Vincent Garcia and Jacklin Sammis' wedding website" />
        <meta name="author"      content="Vincent Garcia" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="/css/css.css" />
        <link rel="stylesheet" href="/css/jquery.fullPage.css" />
        
        <title><?php echo $title; ?></title>
        
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/jquery.easings.min.js"></script>
        <script src="/js/jquery.slimscroll.min.js"></script>
        <script src="/js/jquery.fullPage.js"></script>
        <!--<script src="/js/jquery.fullPage.min.js"></script>-->
        <script src="/js/js.js"></script>
    </head>
    
    <body>
        <nav id="menu"><ul>
            <?php foreach(array(
                array('url' => 'headliners', 'text' => 'Headliners'),
                array('url' => 'tour',       'text' => 'Tour'),
                array('url' => 'openers',    'text' => 'Openers'),
                array('url' => 'venue',      'text' => 'Venue'),
                array('url' => 'sosleepy',   'text' => 'Accommodations'),
                array('url' => 'merch',      'text' => 'Merch'),
            ) as $menuItem) { ?>
                <a href="<?php echo $menuItem['url']; ?>"><!--
                    --><li<?php if($menuItem['url'] == $url) { ?> class="active"<?php } ?>><!--
                        --><?php echo $menuItem['text']; ?><!--
                    --></li><!--
                --></a>
            <?php } ?>
        </ul></nav>
        <main id="fullpage"><div class="section">
            <div class="slide" data-index="0" data-url="headliners" id="slide0">
                headliners
            </div>
            
            <div class="slide" data-index="1" data-url="tour" id="slide1">
                tour
            </div>
            
            <div class="slide" data-index="2" data-url="openers" id="slide2">
                openers
            </div>
            
            <div class="slide" data-index="3" data-url="venue" id="slide3">
                venue
            </div>
            
            <div class="slide" data-index="4" data-url="sosleepy" id="slide4">
                accommodations
            </div>
            
            <div class="slide" data-index="5" data-url="merch" id="slide5">
                merch
            </div>
        </div></main>
    </body>
</html>
