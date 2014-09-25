<?php
    require_once('ajax/ajaxResponseHandler.php');
    Arh::exec($url, $title);
    
    
    
    
    
    // Slides
    $slideInfos = array
    (
        array('url' => 'headliners', 'navtext' => 'Headliners', ),
        array('url' => 'tour',       'navtext' => 'Tour',       ),
        array('url' => 'openers',    'navtext' => 'Openers',    ),
        array('url' => 'venue',      'navtext' => 'Venue',      ),
        array('url' => 'afterparty', 'navtext' => 'Afterparty', ),
        array('url' => 'merch',      'navtext' => 'Merch',      ),
    );
    foreach($slideInfos as $key => &$slideInfo)
    {
        $slideInfo['index']  = $key;
        $slideInfo['id']     = "slide$key";
        $slideInfo['active'] = $slideInfo['url'] == $url;
    }
    unset($slideInfo); // safety net
    
    
    
    
    
    // Tour
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
    
    
    
    
    
    // Openers
    $openers = array
    (
        'spice' => array
        (
            'caption' => 'Spice Girls',
            'image'   => 'images/spice-girls-fiah.jpg',
            'members' => array
            (
                array
                (
                    'name' => 'Kaitlyn Crain',
                    'nick' => 'The BFFF',
                    'info' => array
                    (
                        'Years Active' => '2007 - Present',
                        'Parts'        => 'High School Partners in Crime, Matron of Honor',
                    ),
                ),
                array
                (
                    'name' => 'Melissa Carter',
                    'nick' => 'The Flirty Girl',
                    'info' => array
                    (
                        'Years Active' => '1992 - Present',
                        'Parts'        => 'Childhood Neighbors, Bridesmaid',
                    ),
                ),
                array
                (
                    'name' => 'Vienna Brunt',
                    'nick' => 'The Musketeer',
                    'info' => array
                    (
                        'Years Active' => '2006 - Present',
                        'Parts'        => 'Sorority Sisters, Bridesmaid',
                    ),
                ),
                array
                (
                    'name' => 'Gillian Sammis',
                    'nick' => 'The Pill',
                    'info' => array
                    (
                        'Years Active' => '1997 - Present',
                        'Parts'        => 'Actual Sisters, Bridesmaid',
                    ),
                ),
            ),
        ),
        'backstreet' => array
        (
            'caption' => 'Backstreet Boys',
            'image'   => 'images/backstreet-boys-square.jpg',
            'members' => array
            (
                array
                (
                    'name' => 'Ruben Garcia',
                    'nick' => 'Chubba',
                    'info' => array
                    (
                        'Years Active' => '1988 - Present',
                        'Parts'        => "Brother's Keeper, Best Man",
                    ),
                ),
                array
                (
                    'name' => 'Matthew Brehove',
                    'nick' => 'The Scientist',
                    'info' => array
                    (
                        'Years Active' => '2006 - Present',
                        'Parts'        => 'Roommate Extraordinare, Groomsman',
                    ),
                ),
                array
                (
                    'name' => 'Kevin Chavarria',
                    'nick' => 'The San Diegan',
                    'info' => array
                    (
                        'Years Active' => '2006 - Present',
                        'Parts'        => 'College Orientation Train Rider, Groomsman',
                    ),
                ),
                array
                (
                    'name' => 'David Sforza',
                    'nick' => 'The Advisor',
                    'info' => array
                    (
                        'Years Active' => '2008 - Present',
                        'Parts'        => 'Political Consultant, Groomsman',
                    ),
                ),
            ),
        ),
        'spice2' => array
        (
            'caption' => 'Spice Girls 2',
            'image'   => 'images/spice-girls.jpg',
            'members' => array
            (
                array
                (
                    'name' => 'Rachel Lepold',
                    'nick' => 'The Marrier',
                    'info' => array
                    (
                        'Years Active' => '2010 - Present',
                        'Parts'        => 'Co-worker, Officiant',
                    ),
                ),
                array
                (
                    'name' => 'Aaron Master',
                    'nick' => 'The Boss',
                    'info' => array
                    (
                        'Years Active' => '2010 - Present',
                        'Parts'        => 'Co-worker, Master of Ceremonies, Disc Jockey',
                    ),
                ),
                array
                (
                    'name' => 'Regan Odbert',
                    'nick' => 'Button',
                    'info' => array
                    (
                        'Years Active' => '2006 - Present',
                        'Parts'        => 'Cousin, Flower Girl',
                    ),
                ),
                array
                (
                    'name' => 'Tobías Stonehocker',
                    'nick' => 'Toby',
                    'info' => array
                    (
                        'Years Active' => '1997 - Present',
                        'Parts'        => 'Nephew, Ring Bearer',
                    ),
                ),
            ),
        ),
    );
    
    
    
    
    
    // Merch
    $merches = array
    (
        'bbb' => array
        (
            'caption' => 'Bed Bath & Beyond',
            'image'   => 'images/merch-table-s.jpg',
            'url'     => 'https://www.bedbathandbeyond.com:443/store/giftregistry/view_registry_guest.jsp?registryId=541530851&eventType=Wedding',
        ),
        'amazon' => array
        (
            'caption' => 'Amazon.com',
            'image'   => 'images/merch-booth-s.jpg',
            'url'     => 'http://www.amazon.com/registry/wedding/1ZHJUPNCOM84Y',
        ),
        'honeymoon' => array
        (
            'caption' => 'Honeymoon',
            'image'   => 'images/italy-s-cs.jpg',
        ),
    );
    




    require_once('templates/mainLayout.php');
