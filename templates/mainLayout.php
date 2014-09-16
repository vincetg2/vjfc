<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="kewords"     content="wedding, wedding website, vincent garcia, jacklin sammis" />
        <meta name="description" content="Vincent Garcia and Jacklin Sammis' wedding website" />
        <meta name="author"      content="Vincent Garcia" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="/css/jquery.fullPage.css" />
        <link rel="stylesheet" href="/css/jquery.fullPage.css" />
        <link rel="stylesheet" href="/css/css.css" />
        
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
            <?php
                $slideInfos = array
                (
                    array('url' => 'headliners', 'navtext' => 'Headliners',    ),
                    array('url' => 'tour',       'navtext' => 'Tour',          ),
                    array('url' => 'openers',    'navtext' => 'Openers',       ),
                    array('url' => 'venue',      'navtext' => 'Venue',         ),
                    array('url' => 'sosleepy',   'navtext' => 'Accommodations',),
                    array('url' => 'merch',      'navtext' => 'Merch',         ),
                );
                foreach($slideInfos as $key => &$slideInfo)
                {
                    $slideInfo['index']  = $key;
                    $slideInfo['id']     = "slide$key";
                    $slideInfo['active'] = $slideInfo['url'] == $url;
                }
                unset($slideInfo); // safety net
            ?>
            <?php foreach($slideInfos as $slideInfo) { ?>
                <a href="<?php echo $slideInfo['url']; ?>"><!--
                    --><li<?php if($slideInfo['active']) { ?> class="active"<?php } ?>><!--
                        --><?php echo $slideInfo['navtext']; ?><!--
                    --></li><!--
                --></a>
            <?php } ?>
        </ul></nav>
        <div id="fullpage"><div class="section">
            <?php $slideInfo = reset($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="headimg" />
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="tour" class="maincontain">
                    <div class="incontain">
                        <main>
                            <h1>Tour</h1>
                            <?php
                                $dateInfos = array
                                (
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 10, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 11, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 12, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 13, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 14, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 15, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 16, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => 17, 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Outside Lands Music Festival',
                                    ),
                                );
                            ?>
                            <?php foreach($dateInfos as $dateInfo) { ?>
                                <div class="row">
                                    <div class="date col">
                                        <div class="indate">
                                            <div class="month"><?php echo $dateInfo['date']['month']; ?></div>
                                            <div class="day"><?php   echo $dateInfo['date']['day'];   ?></div>
                                            <div class="year"><?php  echo $dateInfo['date']['year'];  ?></div>
                                        </div>
                                    </div>
                                    <div class="location col">
                                        <div class="city"><?php  echo $dateInfo['city'];  ?></div>
                                        <div class="place"><?php echo $dateInfo['place']; ?></div>
                                        <div class="storycontain"><div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div></div>
                                    </div>
                                    <div class="tickets col">More Info</div>
                                </div>
                            <?php } ?>
                        </main>
                    </div><!-- .incontent -->
                </div><!-- #tour.maincontent -->
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="openers" class="maincontain">
                    <div id="tmain" style="-webkit-overflow-scrolling: touch; height: 200px; border: 1px solid white; overflow: scroll;">
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                        openers<br />
                    </div>
                </div>
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="venue" class="maincontain">
                    venue<br />
                    <img src="images/hecker-pass-4.jpg" />
                </div>
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="accommodations" class="maincontain">
                    accommodations
                </div>
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="merch" class="maincontain">
                    merch<br />
                    <a href="https://www.bedbathandbeyond.com:443/store/giftregistry/view_registry_guest.jsp?registryId=541530851&eventType=Wedding" target="_blank"><img src="images/merch-table-bbb.jpg" /></a><br />
                    <a href="http://www.amazon.com/registry/wedding/1ZHJUPNCOM84Y" target="_blank"><img src="images/merch-booth-2-azc.jpg" /></a>
                </div>
            </div>
        </div>
    </body>
</html>
