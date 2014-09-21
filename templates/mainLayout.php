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
                            <?php
                                $dateInfos = array
                                (
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => '13', 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => "Outside Lands Music Festival",
                                        'story' => "4:35 PM - Vincent & Jacklin meet at the replica Dutch Windmills while Arctic Monkeys are setting up on stage.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => '13', 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => "Outside Lands Music Festival",
                                        'story' => "4:48 PM - Vincent gets Jacklin's phone number while Arctic Monkeys are playing on stage.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Aug', 'day' => '25', 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => "Tommaso's Italian Restaurant",
                                        'story' => "Vincent takes Jacklin out for their first date. Everything goes wrong except for the food, but they enjoy every minute of it anyway.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Sep', 'day' => '06', 'year' => 2011),
                                        'city'  => 'Menlo Park, CA',
                                        'place' => "Saint Ben's",
                                        'story' => "12:07 AM - Vincent asks Jacklin to “go steady.”",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Sep', 'day' => '07', 'year' => 2011),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'The Regency Ballroom',
                                        'story' => "Vincent takes Jacklin to see Hansen of “Mmmbop” fame. But really, they go to see the opener, Meiko, for their first date as an official couple.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Mar', 'day' => '21', 'year' => 2012),
                                        'city'  => 'New York, NY',
                                        'place' => 'Off-Broadway',
                                        'story' => "Vincent and Jacklin take their first big trip together.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'May', 'day' => '05', 'year' => 2012),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Rock Bottom',
                                        'story' => "Jacklin and Vincent host their first annual Kentucky Derby Party.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Jun', 'day' => '07', 'year' => 2012),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'The Chateau',
                                        'story' => "Vincent and Jacklin move in together.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Apr', 'day' => '20', 'year' => 2013),
                                        'city'  => 'Santa Cruz, CA',
                                        'place' => 'Santa Cruz Mountains',
                                        'story' => "Vincent and Jacklin go wine tasting for their first time ever.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'May', 'day' => '21', 'year' => 2013),
                                        'city'  => 'Santa Clara, CA',
                                        'place' => 'SoundHound',
                                        'story' => "Jacklin starts a job at SoundHound with Vincent because living together was not enough.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Jul', 'day' => '13', 'year' => 2013),
                                        'city'  => 'Sacramento, CA',
                                        'place' => 'The Ranch',
                                        'story' => "Known as D-Day, Vincent and Jacklin add a new member to their small family by adopting --DOODLE--.",
                                        'replace' => array
                                        (
                                            '--DOODLE--' => '<a href="http://instagram.com/doodleofthemission" target="_blank">@doodleofthemission</a>',
                                            //'--DOODLE--' => '<a href="instagram://user?username=doodleofthemission" target="_blank">@doodleofthemission</a>',
                                        ),
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Sep', 'day' => '07', 'year' => 2013),
                                        'city'  => 'San Diego, CA',
                                        'place' => 'El Zarape',
                                        'story' => "Vincent and Jacklin spend their second anniversary in San Diego where they eat the best burritos ever.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Nov', 'day' => '18', 'year' => 2013),
                                        'city'  => 'San Jose, CA',
                                        'place' => 'The Perchoir',
                                        'story' => "Vincent and Jacklin move to San Jose.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Apr', 'day' => '07', 'year' => 2014),
                                        'city'  => 'Indio, CA',
                                        'place' => 'Coachella Valley Music and Arts Festival',
                                        'story' => "Vincent and Jacklin take their first camping trip together.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'Apr', 'day' => '26', 'year' => 2014),
                                        'city'  => 'San Francisco, CA',
                                        'place' => 'Golden Gate Park Tulip Gardens',
                                        'story' => "Vincent proposes to Jacklin by the Dutch Windmill.",
                                    ),
                                    array
                                    (
                                        'date'  => array('month' => 'May', 'day' => '02', 'year' => 2015),
                                        'city'  => 'Gilroy, CA',
                                        'place' => 'Hecker Pass Winery',
                                        'story' => "Vincent and Jacklin get married!",
                                    ),
                                );
                                
                                foreach($dateInfos as &$dateInfo)
                                {
                                    if(!isset($dateInfo['story']))
                                        $dateInfo['story'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
                                    
                                    $dateInfo['story'] = htmlspecialchars($dateInfo['story']);
                                    
                                    if(isset($dateInfo['replace']))
                                    {
                                        $dateInfo['story'] = str_replace(array_keys($dateInfo['replace']),
                                            array_values($dateInfo['replace']), $dateInfo['story']);
                                    }
                                }
                                unset($dateInfo); // safety net
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
                            <h1>openers</h1>
                            <div class="polaroidcol">
                            <div id="spice" class="polaroidcontain">
                                <div class="polaroid">
                                    <img src="images/spice-girls.jpg" /><br />
                                    Spice Girls
                                </div>
                            </div>
                            </div>
                            <div class="polaroidcol">
                            <div id="backstreet" class="polaroidcontain">
                                <div class="polaroid">
                                    <img src="images/backstreet-boys-square.jpg" /><br />
                                    Backstreet Boys
                                </div>
                            </div>
                            </div>
                            <div class="polaroidcol">
                            <div id="spice2" class="polaroidcontain">
                                <div class="polaroid">
                                    <img src="images/spice-girls.jpg" /><br />
                                    Spice Girls 2
                                </div>
                            </div>
                            </div>
                        </main>
                    </div><!-- .maincontain -->
                    <div class="maincontain bg overlay">
                        <main></main>
                    </div>
                    <div class="maincontain text overlay">
                        <main>
                            <article class="opener spice active">
                                <header><!--
                                    --><h1>Kaitlyn Crain</h1><!--
                                    --><p>The BFFF</p><!--
                                --></header>
                                <table class="body">
                                    <tr><td class="label">Years Active</td><td>2007 - Present</td></tr>
                                    <tr><td class="label">Parts</td><td>High School Partners in Crime, Matron of Honor</td></tr>
                                </table>
                                
                                <header><!--
                                    --><h1>Melissa Carter</h1><!--
                                    --><p>The Flirty Girl</p><!--
                                --></header>
                                <table class="body">
                                    <tr><td class="label">Years Active</td><td>1992 - Present</td></tr>
                                    <tr><td class="label">Parts</td><td>Childhood Neighbors,  Bridesmaid</td></tr>
                                </table>
                                
                                <header><!--
                                    --><h1>Vienna Brunt</h1><!--
                                    --><p>The Musketeer</p><!--
                                --></header>
                                <table class="body">
                                    <tr><td class="label">Years Active</td><td>2006 - Present</td></tr>
                                    <tr><td class="label">Parts</td><td>Sorority Sisters, Bridesmaid</td></tr>
                                </table>
                                
                                <header><!--
                                    --><h1>Gillian Sammis</h1><!--
                                    --><p>The Pill</p><!--
                                --></header>
                                <table class="body">
                                    <tr><td class="label">Years Active</td><td>1997 - Present</td></tr>
                                    <tr><td class="label">Parts</td><td>Actual Sisters, Bridesmaid</td></tr>
                                </table>
                            </article>
                            <div class="opener backstreet">
                                <h1>Ruben</h1>
                                <h1>Mat</h1>
                                <h1>Kevin</h1>
                                <h1>Vince</h1>
                                <h1>David</h1>
                            </div>
                            <div class="opener spice2">
                                <h1>Rachel</h1>
                                <h1>Aaron</h1>
                                <h1>Regan</h1>
                                <h1>Cooper</h1>
                            </div>
                        </main>
                    </div>
                </div><!-- #openers.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="venue" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>venue</h1>
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
                            <h1>accommodations</h1>
                        </main>
                    </div><!-- .maincontain -->
                </div><!-- #accommodations.inslide -->
            </div><!-- .slide -->
            
            <?php $slideInfo = next($slideInfos); ?>
            <div class="slide<?php if($slideInfo['active']) { ?> active<?php } ?>" data-index="<?php echo $slideInfo['index']; ?>" data-url="<?php echo $slideInfo['url']; ?>" id="<?php echo $slideInfo['id']; ?>">
                <div id="merch" class="inslide">
                    <div class="maincontain">
                        <main>
                            <h1>merch</h1>
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
