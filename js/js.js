var originalPageLoad = true;

// http://rosspenman.com/pushstate-jquery/
String.prototype.decodeHTML = function()
{
    return $('<div>', {html: '' + this}).html();
};

function activateNavItem(url)
{
    $('#menu li').removeClass('active');
    $('#menu a[href="' + url + '"] li').addClass('active');
}

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
    // Sets up fullPage slide scrolling
    $('#fullpage').fullpage
    ({
        sectionsColor: ['#8FB98B'],
        slidesNavigation: true,
        verticalCentered: true,
        onSlideLeave: slideMoveFunction,
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
