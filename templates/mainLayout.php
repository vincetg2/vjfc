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
        <link rel="stylesheet" href="/css/knockout.css" />
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
                <div id="headliners"><div id="headlinersoverlay"></div></div>
            </div>
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="tour" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1><div><span>Tour</span></div></h1>
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
                                        <div class="story">
                                            <div class="instory"><?php echo $dateInfo['story']; ?></div>
                                        </div>
                                    </div>
                                    <div class="tickets col">More Info</div>
                                </div>
                            <?php } ?>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #tour.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="openers" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Openers</h1>
                            <?php foreach($openers as $opener => $openerInfo) { ?>
                                <div class="polaroidcol">
                                    <div id="<?php echo $opener; ?>" class="polaroidcontain">
                                        <div class="polaroid">
                                            <img src="<?php echo $openerInfo['image']; ?>" /><br />
                                            <?php echo $openerInfo['caption']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </main>
                    </div><!-- .maincontain -->
                    
                    <div class="maincontain bg overlay">
                        <main></main>
                    </div><!-- .maincontain.bg.overlay -->
                    
                    <div class="maincontain text overlay">
                        <main>
                            <?php $firstOpener = true; ?>
                            <?php foreach($openers as $opener => $openerInfo) { ?>
                                <article class="opener <?php echo $opener; ?><?php if($firstOpener) { ?> active<?php } ?>">
                                    <?php foreach($openerInfo['members'] as $member) { ?>
                                        <header><!--
                                            --><h1><?php echo $member['name']; ?></h1><!--
                                            --><p><?php  echo $member['nick']; ?></p><!--
                                        --></header>
                                        <table class="info">
                                            <?php foreach($member['info'] as $infoName => $infoValue) { ?>
                                                <tr>
                                                    <td class="label"><?php echo $infoName; ?></td>
                                                    <td><?php echo $infoValue; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } ?>
                                    <?php $firstOpener = false; ?>
                                </article>
                            <?php } ?>
                        </main>
                        
                        <img class="theEX" src="images/x.png" />
                    </div><!-- .maincontain.text.overlay -->
                </div><!-- #openers.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="venue" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Venue</h1>
                            <img src="images/hecker-pass-4.jpg" />
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #venue.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="accommodations" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Accommodations</h1>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #accommodations.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="merch" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Merch</h1>
                            <a href="https://www.bedbathandbeyond.com:443/store/giftregistry/view_registry_guest.jsp?registryId=541530851&eventType=Wedding" target="_blank">
                                <img src="images/merch-table-bbb.jpg" />
                            </a>
                            <a href="http://www.amazon.com/registry/wedding/1ZHJUPNCOM84Y" target="_blank">
                                <img src="images/merch-booth-2-azc.jpg" />
                            </a>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #merch.inslide -->
            </div><!-- .slide -->
        </div>
    </body>
</html>
