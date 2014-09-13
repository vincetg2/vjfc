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
                array('url' => 'home',      'text' => 'Home'),
                array('url' => 'wtf',       'text' => 'About Us'),
                array('url' => 'letsparty', 'text' => 'Wedding Party'),
                array('url' => 'mawwige',   'text' => 'Venue'),
                array('url' => 'sosleepy',  'text' => 'Accommodations'),
                array('url' => 'presence',  'text' => 'Registry'),
            ) as $menuItem) { ?>
                <a href="<?php echo $menuItem['url']; ?>"><!--
                    --><li<?php if($menuItem['url'] == $url) { ?> class="active"<?php } ?>><!--
                        --><?php echo $menuItem['text']; ?><!--
                    --></li><!--
                --></a>
            <?php } ?>
        </ul></nav>
        <main id="fullpage"><div class="section">
            <div class="slide" data-index="0" data-url="home" id="slide0">
                home
            </div>
            
            <div class="slide" data-index="1" data-url="wtf" id="slide1">
                about us
            </div>
            
            <div class="slide" data-index="2" data-url="letsparty" id="slide2">
                wedding party
            </div>
            
            <div class="slide" data-index="3" data-url="mawwige" id="slide3">
                venue
            </div>
            
            <div class="slide" data-index="4" data-url="sosleepy" id="slide4">
                accommodations
            </div>
            
            <div class="slide" data-index="5" data-url="presence" id="slide5">
                registry
            </div>
        </div></main>
    </body>
</html>
