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
            <?php foreach($slideInfos as $slideInfo) { ?>
                <a href="<?php echo $slideInfo['url']; ?>"><!--
                    --><li<?php if($slideInfo['active']) { ?> class="active"<?php } ?>><!--
                        --><?php echo $slideInfo['navtext']; ?><!--
                    --></li><!--
                --></a>
            <?php } ?>
        </ul></nav><!-- #menu -->
        
        <div id="fullpage"><div class="section">
            <!-- Headliners -->
            <?php $slideInfo = reset($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>"><div id="headlinersoverlay"></div></div>
            </div>
            
            <!-- Tour Dates -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
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
            
            <!-- Openers -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
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
            
            <!-- Venue -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Venue</h1>
                            
                            <div class="summary"><div></div></div>
                            <div class="sumblock">
                            <img class="summary" src="images/hecker-pass-1.jpg" /><!--
                            --><p class="summary">
                                <span class="name">Hecker Pass Winery</span><br />
                                Ceremony at 4<br />
                                Dinner/dancing to follow<br />
                            </p>
                            </div>
                            
                            <div class="vcard"><a href="https://www.google.com/maps/place/Hecker+Pass+Winery/@37.0062073,-121.7078231,10z" target="_blank">
                                <span class="fn org">Hecker Pass Winery</span>
                                <div class="adr">
                                    <span class="street-address">4605 Hecker Pass Road</span><br />
                                    <span class="locality">Gilroy</span>,
                                    <abbr class="region" title="California">CA<abbr>
                                    <span class="postal-code">95020<span>
                                </div>
                            </a></div><!-- .vcard -->
                            
                            <div class="door"><div></div></div>
                            <div class="plaingroup"><!--
                                --><p class="plain">
                                    The ceremony will being promptly at 4pm.
                                    A cocktail hour will begin around 4:30pm and dinner and dancing will follow directly after.
                                    The entire event will take place outside, so please don't forget a light jacket in case it gets cold in the evening!<br /><br />
                                    
                                    Cell phone reception is limited, so printing out directions (or saving maps for <a href="https://support.google.com/gmm/answer/3273567" target="_blank">offline use</a>) could save you some time if you tend to get lost.
                                    There is a large, free parking lot at the venue for your convenience.<br /><br />
                                    
                                    The tasting room is open from 10am to 4:30pm Monday - Friday, and 10am to 5pm Saturday and Sunday.<br /><br />
                                    If you have any questions, concerns, or accommodation inquiries, feel free to contact us at <a class="vince email"></a> or <a class="jacklin email"></a>.
                                </p><!--
                                --><img class="door" src="images/hecker-pass-4.jpg" /><!--
                            --></div><!-- .plaingroup -->
                            
                            <div class="iframe-rwd">
                                <iframe frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?q=Hecker+Pass+Winery,+Hecker+Pass+Road,+Gilroy,+CA,+United+States&zoom=8&key=AIzaSyBQiL4aCIr4i8Gx0v2GmmtANgTc9QH_WpM"></iframe>
                            </div>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #venue.inslide -->
            </div><!-- .slide -->
            
            <!-- Afterparty -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Afterparty</h1>
                            <div class="summary"><div></div></div>
                            <h2>Best Western Plus Forest Park Inn</h2>
                            <p class="words">
                                We are in the process of getting a block of rooms at this hotel,
                                but it is best to book early, as there are few hotels in Gilroy.
                                Check back in a month or so for more information if interested
                                (or send us an email at <a class="vince email"></a>).<br /><br />
                                
                                Phone: (408) 848-5144
                            </p>
                            
                            <?php /*
                            <div class="vcard">
                                <span class="fn org">Best Western Plus Forest Park Inn</span>
                                <div class="adr"><a href="https://www.google.com/maps/place/BEST+WESTERN+PLUS+Forest+Park+Inn/@37.021421,-121.570439,10z" target="_blank">
                                    <span class="street-address">375 Leavesley Road</span><br />
                                    <span class="locality">Gilroy</span>, <span class="region">CA<span> <span class="postal-code">95020<span>
                                </a></div>
                                <span class="tel">(408) 848-5144</span><br />
                                <a class="email" href="mailto:info@bestwesterngilroy.com">info@bestwesterngilroy.com</a><br />
                                <a class="url" href="http://www.bestwesterngilroy.com/" target="_blank">http://www.bestwesterngilroy.com/</a><br />
                                <span class="note">4.5mi from Hecker Pass Winery</span>
                            </div>
                            */ ?>
                            
                            <div class="icons">
                                <a class="iconcontain" href="mailto:info@bestwesterngilroy.com" target="_blank"><!--
                                    --><div class="email icon" title="info@bestwesterngilroy.com"></div><!--
                                --></a>
                                <a class="iconcontain" href="https://www.google.com/maps/place/BEST+WESTERN+PLUS+Forest+Park+Inn/@37.021421,-121.570439,10z" target="_blank"><!--
                                    --><div class="map icon" title="375 Leavesley Road, Gilroy, CA 95020"></div><!--
                                --></a>
                                <a class="iconcontain" href="http://www.bestwesterngilroy.com/" target="_blank"><!--
                                    --><div class="website icon" title="http://www.bestwesterngilroy.com/"></div><!--
                                --></a>
                            </div><!-- .icons -->
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #afterparty.inslide -->
            </div><!-- .slide -->
            
            <!-- Merch -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
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
        </div><!-- .section --></div><!-- #fullpage -->
    </body>
</html>
