<?php
    ini_set('display_errors', 0);
    error_reporting(0);
    require_once('ajax/ajaxResponseHandler.php');
    Arh::exec($url, $title);
    
    // Shortcut for htmlspecialchars()
    function h($text) { return htmlspecialchars($text); }
    // Canonicalizes string (after htmlspecialchars-ing)
    function c($text) { return preg_replace('/[^a-z0-9]/', '', strtolower(h($text))); }
    
    
    
    
    
    // Slides
    $slideInfos = array
    (
        array('url' => 'headliners', 'navtext' => 'Headliners', ),
        array('url' => 'tour',       'navtext' => 'Tour',       ),
        array('url' => 'openers',    'navtext' => 'Openers',    ),
        array('url' => 'venue',      'navtext' => 'Venue',      ),
        array('url' => 'afterparty', 'navtext' => 'Afterparty', ),
        array('url' => 'merch',      'navtext' => 'Merch',      ),
        array('url' => 'tickets',    'navtext' => 'Tickets',    ),
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
            'date'  => array('month' => 'Feb', 'day' => '14', 'year' => 2012),
            'city'  => 'San Francisco, CA',
            'place' => 'Yum Yum Hunan',
            'story' => "Vincent and Jacklin celebrate their first Valentine's Day together and start an annual dinner tradition.",
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
            'story' => "Vincent and Jacklin move in together. This is getting serious, you guys.",
        ),
        array
        (
            'date'  => array('month' => 'Oct', 'day' => '27', 'year' => 2012),
            'city'  => 'San Francisco, CA',
            'place' => 'The Mission',
            'story' => "Vincent carves his --PUMPKIN--. It is so good that Jacklin doesn't want to carve a pumpkin ever again.",
            'replace' => array
            (
                '--PUMPKIN--' => '<a href="http://instagram.com/p/RT_V-yiSc2/" target="_blank">first pumpkin ever</a>',
            ),
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
            'story' => "Vincent and Jacklin relocate to greener pastures.",
        ),
        array
        (
            'date'  => array('month' => 'Jan', 'day' => '06', 'year' => 2014),
            'city'  => 'Santa Clara, CA',
            'place' => 'AT&T',
            'story' => "Vincent and Jacklin take pretty much the final step to becoming a fully committed couple by signing up for their own cell phone family plan.",
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
            'place' => 'Golden Gate Park',
            'story' => "Vincent proposes to Jacklin in the tulip gardens under the Dutch Windmill. They finally become Facebook Official.",
            'replace' => array
            (
                '--BR--' => '<br />',
            ),
        ),
        array
        (
            'date'  => array('month' => 'May', 'day' => '26', 'year' => 2014),
            'city'  => 'San Francisco, CA',
            'place' => 'Fort Mason',
            'story' => "Vincent and Jacklin go to see the 8th wonder of the modern world: --ACROCATS--.",
            'replace' => array
            (
                '--ACROCATS--' => '<a href="http://www.circuscats.com/" target="_blank">The Acro-Cats</a>',
            ),
        ),
        array
        (
            'date'  => array('month' => 'May', 'day' => '02', 'year' => 2015),
            'city'  => 'Gilroy, CA',
            'place' => 'Hecker Pass Winery',
            'story' => "Vincent and Jacklin get married!",
        ),
        array
        (
            'date'  => array('month' => 'May', 'day' => '03', 'year' => 2015),
            'city'  => 'Rome, IT',
            'place' => 'Fiumicino International Airport',
            'story' => "Vincent and Jacklin leave for their romantic Italian honeymoon!",
        ),
    );
    
    foreach($dateInfos as &$dateInfo)
    {
        if(!isset($dateInfo['story']))
            $dateInfo['story'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        
        $dateInfo['city']  = htmlspecialchars($dateInfo['city']);
        $dateInfo['place'] = htmlspecialchars($dateInfo['place']);
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
            'caption' => 'Bridal Party',
            'image'   => 'images/spice-girls-fiah.jpg',
            'plain'   => false,
            'members' => array
            (
                array
                (
                    'name' => 'Kaitlyn Crain Enriquez',
                    'nick' => 'The BFFF',
                    'info' => array
                    (
                        'Years Active' => '2003 - Present',
                        'Parts'        => 'High School Partner in Crime, Matron of Honor',
                    ),
                ),
                array
                (
                    'name' => 'Melissa Carter',
                    'nick' => 'The Flirty Girl',
                    'info' => array
                    (
                        'Years Active' => '1992 - Present',
                        'Parts'        => 'Practically Sisters, Bridesmaid',
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
            'caption' => 'Groomsmen',
            'image'   => 'images/backstreet-boys-fiah.jpg',
            'plain'   => false,
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
        'vips' => array
        (
            'caption' => 'VIPs',
            'image'   => 'images/chumbawamba-fiah.jpg',
            'plain'   => false,
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
                    'name' => 'Cooper Sammis',
                    'nick' => 'The Absent-Minded Professor',
                    'info' => array
                    (
                        'Years Active' => '1999 - Present',
                        'Parts'        => 'Brother, Usher',
                    ),
                ),
                array
                (
                    'name' => 'Regan Cecelia',
                    'nick' => 'Button',
                    'info' => array
                    (
                        'Years Active' => '2005 - Present',
                        'Parts'        => 'Cousin, Flower Girl',
                    ),
                ),
                array
                (
                    'name' => 'Tobías Stonehocker',
                    'nick' => 'Toby',
                    'info' => array
                    (
                        'Years Active' => '2009 - Present',
                        'Parts'        => 'Nephew, Ring Bearer',
                    ),
                ),
            ),
        ),
        'wvsgs' => array
        (
            'caption' => 'With Very Special Guests',
            'image'   => 'images/dj.jpg',
            'plain'   => true,
        ),
    );
    
    
    
    
    
    // Merch
    $merches = array
    (
        'honeymoon' => array
        (
            'caption' => 'Honeymoon',
            'image'   => 'images/teatro-la-fenice.jpg',
            'url'     => null,
            'overlay' => true,
        ),
        'bbb' => array
        (
            'caption' => 'Bed Bath & Beyond',
            'image'   => 'images/merch-table-s.jpg',
            'url'     => 'https://www.bedbathandbeyond.com:443/store/giftregistry/view_registry_guest.jsp?registryId=541530851&eventType=Wedding',
            'overlay' => false,
        ),
        'amazon' => array
        (
            'caption' => 'Amazon',
            'image'   => 'images/merch-booth-s.jpg',
            'url'     => 'http://www.amazon.com/registry/wedding/1ZHJUPNCOM84Y',
            'overlay' => false,
        ),
    );
    
    
    
    
    
    // Merch - Honeymoon Fund
    $products = array
    (
        array
        (
            'name'        => 'Air Travel',
            'price'       => 65,
            'stock'       => 15,
            'stock_label' => 'Desired',
            'description' => "Help us get to our first stop, Rome, and back home to the real world from our last stop, Venice! We'll also have layovers in Munich and Frankfurt for a little extra exploring.",
            'image'       => 'plane-s-300xx.jpg',
            'paypal_code' => 'ZAS4V2VCGCCSU',
        ),
        array
        (
            'name'        => 'Lodging: Rome',
            'price'       => 115,
            'stock'       => 5,
            'stock_label' => 'Nights',
            'description' => "We picked out a beautiful flat in the hip Trastevere neighborhood to call our home for the first 5 nights. It's also within walking distance from all the big sights!",
            'image'       => 'roma.jpg',
            'paypal_code' => 'DNJQTJ6Z686HQ',
        ),
        array
        (
            'name'        => 'Lodging: Naples',
            'price'       => 80,
            'stock'       => 3,
            'stock_label' => 'Nights',
            'description' => "In the city that invented PIZZA, our home base will be a cute little flat that's a hop, skip, and a jump from the bay and its fantastic view of the ever-looming Mount Vesuvius.",
            'image'       => 'napoli.jpg',
            'paypal_code' => 'NA5CT5Y65ZF2E',
        ),
        array
        (
            'name'        => 'Lodging: Tuscany',
            'price'       => 100,
            'stock'       => 3,
            'stock_label' => 'Nights',
            'description' => "Our time in Tuscany will be very unique. We hope to drive through and visit the Arrezzo, Sienna, and Chianti regions, known for their medieval charm and exceptional wine.",
            'image'       => 'toscana.jpg',
            'paypal_code' => '6U4YGNY37GQGN',
        ),
        array
        (
            'name'        => 'Lodging: Florence',
            'price'       => 90,
            'stock'       => 3,
            'stock_label' => 'Nights',
            'description' => "For our 3 nights in Florence, we will be staying in the artisan's enclave of Oltrarno. From here, a short walk across the Ponte Vecchio will take us to the heart of this Renaissance City.",
            'image'       => 'firenze.jpg',
            'paypal_code' => '3PCCRJ6LBRPXG',
        ),
        array
        (
            'name'        => 'Lodging: The&nbsp;Cinque&nbsp;Terre',
            'price'       => 120,
            'stock'       => 2,
            'stock_label' => 'Nights',
            'description' => "The Five Lands, with their daringly vertical architecture, make up the most picturesque stretch of the Italian Riviera. Our stay here will be in (where else?) a room with a view!",
            'image'       => 'riomaggiore.jpg',
            'paypal_code' => 'UMNPMG8E3QEY2',
        ),
        array
        (
            'name'        => 'Lodging: Parma',
            'price'       => 150,
            'stock'       => 1,
            'stock_label' => 'Nights',
            'description' => "We'd like to stay in the Honeymoon Suite while we are in the foodie capital of Italy. Some would say that this equates to being in the foodie capital of the world!",
            'image'       => 'parma.jpg',
            'paypal_code' => 'TM7NL7X49N6W2',
        ),
        array
        (
            'name'        => 'Lodging: Venice',
            'price'       => 135,
            'stock'       => 3,
            'stock_label' => 'Nights',
            'description' => "The last nights of our trip will be spent in the authentic Venetian neighborhood of Castello. Our romantic flat is just a quick walk (or swim) from the famed San Marco Square.",
            'image'       => 'venezia.jpg',
            'paypal_code' => '3VKF6ED8CMR58',
        ),
        array
        (
            'name'        => 'Museum Admission',
            'price'       => 15,
            'stock'       => 14,
            'stock_label' => 'Tickets',
            'description' => "Among others, we plan to visit the Vatican Museum, the Borghese Gallery, the Uffizi Gallery, and maybe even the Musei di Criminologia Medievale. Or, if you have suggestions, just let us know!",
            'image'       => 'musei.jpg',
            'paypal_code' => '279BZ9HPGNTAQ',
        ),
        array
        (
            'name'        => 'Gondola Ride',
            'price'       => 45,
            'stock'       => 2,
            'stock_label' => 'Tickets',
            'description' => "With your help, we will embark on one of the most romantic journeys a couple can take: a gentle glide over the waters of the City of Canals! Singing gondolier or not? You decide!",
            'image'       => 'gondola.jpg',
            'paypal_code' => '9CGP6Z7FDX7MG',
        ),
        array
        (
            'name'        => 'Spa Day',
            'price'       => 75,
            'stock'       => 2,
            'stock_label' => 'Tickets',
            'description' => "The thermal waters on the island of Ischia have been known for their healing properties since antiquity. Here, we'll enjoy a full day of pampering complete with massages and volcanic mud wraps.",
            'image'       => 'ischia.jpg',
            'paypal_code' => '9SUVAF6CA9CPC',
        ),
        array
        (
            'name'        => 'Rental Car',
            'price'       => 50,
            'stock'       => 8,
            'stock_label' => 'Days',
            'description' => "A very practical gift, we hope to pick up one of those tiny Italian cars in Naples so we can navigate the spectacularly winding road to the Amalfi Coast before venturing up north through Tuscany.",
            'image'       => 'fiat.jpg',
            'paypal_code' => 'NMNDUSXWXEN52',
        ),
        array
        (
            'name'        => 'Italian Food',
            'price'       => 30,
            'stock'       => 20,
            'stock_label' => 'Meals',
            'description' => "Need we say more?? We love Italian food! We can't wait to try the specialties of each region, and maybe even visit our first Michelin-starred restaurant.",
            'image'       => 'pasta.jpg',
            'paypal_code' => 'C8K3L2VGFVF9Y',
        ),
        array
        (
            'name'        => 'Wine Tasting',
            'price'       => 20,
            'stock'       => 4,
            'stock_label' => 'Desired',
            'description' => "Tuscany is the perfect spot to do some wine tasting at local vineyards and restaurants. Some have been producing wine for centuries while others are set in beautiful valleys backed by postcard-perfect scenery.",
            'image'       => 'vino.jpg',
            'paypal_code' => 'X353RKL53NHCQ',
        ),
        array
        (
            'name'        => 'Aperitivo',
            'price'       => 25,
            'stock'       => 5,
            'stock_label' => 'Desired',
            'description' => "The experience of the aperitivo is an established Italian tradition, opening up the appetite with cocktails and finger food. As we are huge fans of the American happy hour, this is one tradition we can't miss!",
            'image'       => 'apertivo.jpg',
            'paypal_code' => 'VPMJQHK4H3784',
        ),
        array
        (
            'name'        => 'Cooking Class',
            'price'       => 40,
            'stock'       => 2,
            'stock_label' => 'Desired',
            'description' => "As Italian food is our favorite, it just makes sense to learn how to cook it from a local. (Jacklin's mom, Judie, will love this. She's been trying to teach Jacklin to cook for years!)",
            'image'       => 'cucina.jpg',
            'paypal_code' => '9XGBMWUB6E8WE',
        ),
        array
        (
            'name'        => 'Recreaction',
            'price'       => 35,
            'stock'       => 6,
            'stock_label' => 'Desired',
            'description' => "We will be taking in the sights while hiking in the Cinque Terre, exploring the ruins of Pompeii, and attempting to hold up a certain tower in Pisa.",
            'image'       => 'pisa.jpg',
            'paypal_code' => 'GJA5RXP8L8LMS',
        ),
        array
        (
            'name'        => 'Gelato Fund',
            'price'       => 5,
            'stock'       => 10,
            'stock_label' => 'Desired',
            'description' => "Gelato is amazing, and we hope to consume a ton of it while we are in Italy. Be an enabler. Help feed our addiction. Donate today!",
            'image'       => 'gelato.jpg',
            'paypal_code' => '6YED4KTXPBF3S',
        ),
        array
        (
            'name'        => 'Cappuccino Fund',
            'price'       => 10,
            'stock'       => 20,
            'stock_label' => 'Cups',
            'description' => "Café stops and people-watching; what better way to start the day? We will be taking several coffee and champagne breaks at cute bars and cafés along the city streets all over Italy.",
            'image'       => 'cappuccino.jpg',
            'paypal_code' => '5JQNLWPTP5Y2L',
        ),
        array
        (
            'name'        => 'Shopping Fund',
            'price'       => 60,
            'stock'       => 5,
            'stock_label' => 'Desired',
            'description' => "It would be great to come home with some nice Italian leather shoes and some trinkets for our beloved family and adoring friends. If you have a request, let us know!",
            'image'       => 'comprare.jpg',
            'paypal_code' => 'GHPLZMZ9PZ37S',
        ),
        array
        (
            'name'        => 'Choose Your Own Adventure',
            'price'       => 40,
            'stock'       => 10,
            'stock_label' => 'Remaining',
            'description' => "Email us and tell us what you think we should use it for!",
            'image'       => 'chooseyourownhoneymoon.jpg',
            'paypal_code' => 'VV845J96WSZBA',
        ),
    );
    $paypalEncrypted = '-----BEGIN PKCS7-----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-----END PKCS7-----';





    require_once('templates/mainLayout.php');
