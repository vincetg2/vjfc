// http://rosspenman.com/pushstate-jquery/
String.prototype.decodeHTML = function()
{ return $('<div>', {html: '' + this}).html(); };

// Elements whose contents are allowed to scroll
var scrollables = '.maincontain main, #tmain';

// Declared here so that it can be used in updatePageAndHistory
//   Defined in ready() so it can re-use a reference to the DOM
var activateMenuItem = function() {};

// Gets run onSlideLeave (arrow key press, moveTo(), etc)
var pageUpdatesModifyHistory = true;
var popstatesMoveToSlide     = false;
var updatePageAndHistory = function(anchorLink, index, prevSlideIndex, slideIndex, direction)
{
    // If this is just the page being loaded for the first time, does nothing
    if(direction == 'none') return;
    
    // Adds the current slide url to the history stack
    //   unless the slide movement is BECAUSE of a history movement
    var url = $('#slide' + slideIndex).data('url');
    if(pageUpdatesModifyHistory)
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
            
        // Sets the specified menu item as active, and the rest as inactive
        activateMenuItem(html
            .match(/href="(.*?)"><li class="active"/)[1]
            .decodeHTML());
        
        //// comment this better
        popstatesMoveToSlide = true;
    });
};

// Adjusts main elements by .inslide and .maincontain properties, or
//   by main children properties (whichever is less)
var resizeMainElements = function()
{
    var main = $('.maincontain main');
    var windowsHeight = $(window).height();
    main.each(function()
    {
        var extraHeight = 0;
        var heights = $(this).closest('.inslide').css(
            ['margin-top',  'margin-bottom', 'padding-top', 'padding-bottom']);
        $.each(heights, function(property, value)
            { extraHeight += Number(value.substring(0, value.length - 2)); });
        var heights = $(this).closest('.maincontain').css(
            ['margin-top',  'margin-bottom', 'padding-top', 'padding-bottom']);
        $.each(heights, function(property, value)
            { extraHeight += Number(value.substring(0, value.length - 2)); });
        var newHeight = windowsHeight - extraHeight;
        var children = $(this).children();
        var childrenHeight = 0;
        $.each(children, function()
            { childrenHeight += $(this).outerHeight(true); });
        if(childrenHeight < newHeight) newHeight = childrenHeight;
        $(this).css('height', newHeight + 'px');
        $(this).closest('.slimScrollDiv').css('height', newHeight + 'px');
    });
};

// Once the dom has loaded
$(function()
{
    // Defines function that sets the specified menu item as active,
    //   and the rest of them as inactive
    var allMenuItems = $('#menu li');
    activateMenuItem = function(url)
    {
        allMenuItems.removeClass('active');
        $('#menu a[href="' + url + '"] li').addClass('active');
    };
    
    // Initializes slide framework
    var fp = $('#fullpage');
    fp.fullpage
    ({
        slidesNavigation: true,
        verticalCentered: false,
        loopHorizontal: false,
        afterResize: resizeMainElements,
        onSlideLeave: updatePageAndHistory,
        normalScrollElements: scrollables
    });
    // Fixes fullpage.js' full-page background image issues
    fp.css('background', fp.css('background'));
    var hl = $('#headliners');
    hl.css('background', hl.css('background'));
    
    // Nicer scrollbars for non-iOS browsers
    if(!navigator.userAgent.match(/(iPod|iPhone|iPad)/i))
    {
        $('.maincontain main').slimScroll(
        {
            height: 'auto',
            distance: '3px'
        });
    }
    
    // Prevents bouncing on scrolling past top/bottom of scrollable elements
    // http://stackoverflow.com/questions/10357844/how-to-disable-rubber-band-in-ios-web-apps/17767943#17767943
    // Tracks initial Y position
    var touchStartY = 0;
    $(document).on('touchstart',function(e)
        { touchStartY = e.originalEvent.touches[0].clientY; });
    $(document).on('touchmove',function(e)
    {
        // Gets scrollable ancestor if possible
        var scrollableAncestor = $(e.target).closest(scrollables)[0];
        
        // If the touch was not within a scrollable ancestor,
        //   prevents the scroll of the element
        if(!scrollableAncestor)
        {
            e.preventDefault();
            return;
        }
        
        // If a scroll past the top/bottom of a scrollable element is attempted,
        //   prevent the scroll of the element
        var scrollDelta = touchStartY - e.originalEvent.touches[0].clientY;
        var scrollPos   = scrollableAncestor.scrollTop;         
        var atBottom = (scrollPos + $(scrollableAncestor).height()) ==
            scrollableAncestor.scrollHeight;
        if(scrollDelta < 0 && scrollPos == 0 || scrollDelta > 0 && atBottom)
            e.preventDefault();
    });
    
    // Moves to slide when a navigation menu item is pressed
    $('#menu a').click(function()
    {
        var url = $(this).attr('href');
        
        // If the slide is already active, scrolls to the top of its main element
        if($(this).find('li').hasClass('active'))
        {
            var main = $('#' + url + ' main');
            if(main.closest('.slimScrollDiv').length)
                main.slimScroll({scrollTo: '0px'});
            else
                main.scrollTop(0);
        }
        // Moves to slide specified by the href
        else
        {
            console.log('menu move to: ' + url);
            $.fn.fullpage.moveTo(1, $('[data-url="' + url + '"]').data('index'));
        }
        
        // Cancels the normal anchor operation
        return false;
    });
    
    //// test going to back/forward to other/external pages
    // Scrolls when the back/forward buttons are pressed
    $(window).on('popstate', function(e)
    {
        if(!popstatesMoveToSlide) return;
        
        // Moves to slide specified by data-url
        //   without performing history stack manipulation
        var url = location.href.match(/vincejacklinforever\.com\/(.*?)$/)[1];
        console.log('history move to: ' + url);
        pageUpdatesModifyHistory = false;
        $.fn.fullpage.moveTo(1, $('[data-url="' + url + '"]').data('index'));
        pageUpdatesModifyHistory = true;
    });
    
    // Togglifies tour stories
    // http://stackoverflow.com/questions/7672556/how-to-add-an-opacity-fading-effect-to-to-the-jquery-slidetoggle/7672911#7672911
    $('#tour .row').click(function(e)
    {
        if(e.target.localName == 'a') return true;
        
        $(this).find('.story').animate(
        {
            height:  "toggle",
            opacity: "toggle"
        });
    });
    var allStoriesShown = false;
    $('#tour h1 div').click(function(e)
    {
        var showOrHide = allStoriesShown ? "hide" : "show";
        $(this).closest('main').find('.story').finish().animate(
        {
            height:  showOrHide,
            opacity: showOrHide,
        });
        allStoriesShown = !allStoriesShown;
    });
    
    //// Supposed to make the main scroll to top when status bar is tapped
    //window.addEventListener('scroll', function()
    //{
    //    var elem = document.getElementById('temp');
    //    elem.scrollTo(0, 0, 0);
    //}, false);
});

// Once the dom and all images have loaded
$(window).load(function() { resizeMainElements(); });
