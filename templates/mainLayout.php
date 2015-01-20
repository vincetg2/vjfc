<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="kewords"     content="wedding, wedding website, vincent garcia, jacklin sammis, rsvp" />
        <meta name="description" content="Vincent Garcia and Jacklin Sammis' Official wedding website" />
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
                                    <?php if(!$openerInfo['plain']) { ?>
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
                                    <?php } else { ?>
                                        <header><h1>Very Special Guests</h1></header>
                                        <p class="plain">
                                            We also wanted to give a special shout out to everyone else that has helped us along the way.
                                            Thank you, Angelita Garcia-Stonehocker, for the role you will play in our ceremony.
                                            Thank you, Tim Stonehocker, for being our go to guy for all of our A/V needs.
                                            Thank you, Vanessa Hellmann, for the beautiful engagement shots that were featured on our save the dates!
                                            Thank you, Michelle Safley and Kenneth Lee for being our 2nd set of eyes and hands on all things design and photoshop related.
                                            Last, but not least, thank you to our parents! We appreciate all of your love and support!
                                        </p>
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
                                </p><!--
                            --></div>
                            
                            <div class="vcard"><a href="https://www.google.com/maps/place/Hecker+Pass+Winery/@37.0062073,-121.7078231,10z" target="_blank">
                                <span class="fn org">Hecker Pass Winery</span>
                                <div class="adr">
                                    <span class="street-address">4605 Hecker Pass Road</span><br />
                                    <span class="locality">Gilroy</span>,
                                    <abbr class="region" title="California">CA</abbr>
                                    <span class="postal-code">95020</span>
                                </div>
                            </a></div><!-- .vcard -->
                            
                            <div class="door"><div></div></div>
                            <div class="plaingroup"><!--
                                --><p class="plain">
                                    The ceremony will begin promptly at 4pm.
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
                                    src="<?php echo h('https://www.google.com/maps/embed/v1/place?q=Hecker+Pass+Winery,+Hecker+Pass+Road,+Gilroy,+CA,+United+States&zoom=8&key=AIzaSyBQiL4aCIr4i8Gx0v2GmmtANgTc9QH_WpM'); ?>"></iframe>
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
                                We've reserved a block of rooms at the Best Western Plus Forest Park Inn in Gilroy
                                for your convenience. The hotel is 5.3 miles from the venue and is one of the
                                highest rated in the area. If you are planning on staying at the hotel on May 1st
                                or 2nd, you can reserve a room with either two queen beds or one king bed for $140.
                                If you are reserving multiple rooms and you would like them to be adjoining, please
                                mention that while you are making the reservation.<br /><br />
                                
                                To reserve a room in the block, please call (408) 848-5144 and let them know that
                                you will be attending the Garcia/Sammis wedding.<br /><br />
                                
                                Please keep in mind that all reservations must be made by March 15, 2015.<br /><br />
                                
                                If you try to book a room before March 15th and you are told that there are no more
                                available in the block, please contact us at <a class="vince email"></a>
                                ASAP so that we can reserve more rooms.
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
                            
                            <div class="icons"><!--
                                --><a class="iconcontain" href="mailto:info@bestwesterngilroy.com" target="_blank"><!--
                                    --><div class="email icon" title="info@bestwesterngilroy.com"></div><!--
                                --></a>
                                <a class="iconcontain" href="https://www.google.com/maps/place/BEST+WESTERN+PLUS+Forest+Park+Inn/@37.021421,-121.570439,10z" target="_blank"><!--
                                    --><div class="map icon" title="375 Leavesley Road, Gilroy, CA 95020"></div><!--
                                --></a>
                                <a class="iconcontain" href="http://www.bestwesterngilroy.com/" target="_blank"><!--
                                    --><div class="website icon" title="http://www.bestwesterngilroy.com/"></div><!--
                                --></a><!--
                            --></div><!-- .icons -->
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
                            <?php foreach($merches as $merch => $merchInfo) { ?>
                                <div class="polaroidcol">
                                    <div id="<?php echo $merch; ?>" class="polaroidcontain">
                                        <?php if(isset($merchInfo['url'])) { ?>
                                            <a href="<?php echo h($merchInfo['url']); ?>" target="_blank">
                                        <?php } ?>
                                                <div class="polaroid">
                                                    <img src="<?php echo $merchInfo['image']; ?>" /><br />
                                                    <?php echo $merchInfo['caption']; ?>
                                                </div>
                                        <?php if(isset($merchInfo['url'])) { ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #merch.inslide -->
            </div><!-- .slide -->
            
            <!-- Tickets -->
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="<?php echo $slideInfo['url']; ?>" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>Tickets</h1>
                            <div class="summary"><div></div></div>
                            <p class="pre words">
                                Please enter the password printed on the back of your invitation to RSVP by
                                April&nbsp;2nd,&nbsp;2015.
                            </p>
                            <div id="forms">
                                <?php if(!(isset($_POST) && $_POST)) { ?>
                                <form id="passwordform" method="POST" autocomplete="on" target="_blank">
                                    <div class="field"><!--
                                        --><label for="pfPassword">Password:</label><!--
                                        --><input id="pfPassword" name="password" type="password" placeholder="Password" autofocus /><!--
                                    --></div>
                                    <div class="field"><!--
                                        --><input type="submit" value="Enter" /><!--
                                        --><img class="loader" src="images/ajax-loader.gif" /><!--
                                    --></div>
                                </form>
                                <?php } else
                                {
                                    require_once('templates/rsvp.php');
                                } ?>
                            </div><!-- #forms -->
                            <p class="post words">
                                If you lost or did not receive an invitation, please contact us at
                                <a class="vince email"></a>.
                            </p>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #tickets.inslide -->
            </div><!-- .slide -->
            
        </div><!-- .section --></div><!-- #fullpage -->
    </body>
</html>
