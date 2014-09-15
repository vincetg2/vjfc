var originalPageLoad = true;

// http://rosspenman.com/pushstate-jquery/
String.prototype.decodeHTML = function()
{
    return $('<div>', {html: '' + this}).html();
};

var activateNavItem = function() {};

// This is set to false temporarily when
//   the slide movement is BECAUSE of a history change
var slideMovesAddToHistory = true;

// Gets run onSlideLeave (arrow key press, moveTo(), etc)
var slideMoveFunction = function(anchorLink, index, prevSlideIndex, slideIndex, direction)
{
    // Does nothing on first load
    if(direction == 'none') return;
    
    // Adds the current slide url to the history stack
    //   unless the slide movement is BECAUSE of a history movement
    var url = $('#slide' + slideIndex).data('url');
    if(slideMovesAddToHistory)
    {
        console.log('adding history state: ' + url);
        history.pushState({}, '', url);
    }
    
    // Updates page data with data from destination page
    console.log('loading page data from ' + url);
    $.get(url, function(html)
    {
        // http://rosspenman.com/pushstate-jquery/
        document.title = html
            .match(/<title>(.*?)<\/title>/)[1]
            .trim()
            .decodeHTML();
            
        activateNavItem(html
            .match(/href="(.*?)"><li class="active"/)[1]
            .decodeHTML());
        
        originalPageLoad = false;
    });
};

$(function()
{
    // Overwrites previously defined function
    var allMenuItems = $('#menu li');
    activateNavItem = function(url)
    {
        allMenuItems.removeClass('active');
        $('#menu a[href="' + url + '"] li').addClass('active');
    };
    
    var scrollables = 'main, #tmain';
    
    // Slide framework
    $('#fullpage').fullpage
    ({
        slidesNavigation: true,
        verticalCentered: false,
        onSlideLeave: slideMoveFunction,
        normalScrollElements: scrollables
    });
    
    // Nicer scrollbars for non-iOS browsers
    if(!navigator.userAgent.match(/(iPod|iPhone|iPad)/i))
    {
        $('main').slimScroll(
        {
            height: 'auto',
            distance: '3px'
        });
    }
    
    // Prevents rubber-banding on vertical scrolling of scrollable elements
    // http://stackoverflow.com/questions/10357844/how-to-disable-rubber-band-in-ios-web-apps/17767943#17767943
    var INITIAL_Y = 0; // Tracks initial Y position, needed to kill Safari bounce effect
    $(document).on('touchstart',function(e)
        { INITIAL_Y = e.originalEvent.touches[0].clientY; });
    $(document).on('touchmove',function(e)
    {
        // Get scrollable ancestor if one exists
        var scrollable_ancestor = $( e.target ).closest(scrollables)[0];
        
        // Nothing scrollable? Block move.
        if(!scrollable_ancestor)
        {
            e.preventDefault();
            return;
        }
        
        // If here, prevent move if at scrollable boundaries.
        var scroll_delta = INITIAL_Y - e.originalEvent.touches[0].clientY;
        var scroll_pos   = scrollable_ancestor.scrollTop;         
        var at_bottom = (scroll_pos + $(scrollable_ancestor).height()) ==
            scrollable_ancestor.scrollHeight;
        
        if(scroll_delta < 0 && scroll_pos == 0 || scroll_delta > 0 && at_bottom)
            e.preventDefault();
    });
    
    // Scrolls when a navigation menu item is pressed
    $('#menu a').click(function()
    {
        // Moves to slide specified by the href
        var url = $(this).attr('href');
        console.log('nav move to: ' + url);
        $.fn.fullpage.moveTo(1, $('[data-url="' + url + '"]').data('index'));
        
        // Cancels the normal anchor operation
        return false;
    });
    
    //// test going to back/forward to other/external pages
    // Scrolls when the back/forward buttons are pressed
    $(window).on('popstate', function(e)
    {
        if(originalPageLoad) return;
        var url = location.href.match(/vincejacklinforever\.com\/(.*?)$/)[1];
        console.log('history move to: ' + url);
        
        // Moves to slide specified by data-url
        //   without manually modifying the history stack
        slideMovesAddToHistory = false;
        $.fn.fullpage.moveTo(1, $('[data-url="' + url + '"]').data('index'));
        slideMovesAddToHistory = true;
    });
});
