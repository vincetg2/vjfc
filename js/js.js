(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-55253417-1', 'auto');
ga('send', 'pageview');

// http://rosspenman.com/pushstate-jquery/
String.prototype.decodeHTML = function()
{ return $('<div>', {html: '' + this}).html(); };

var isTouchDevice = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|Windows Phone|Tizen|Bada)/i);

// Elements whose contents are allowed to scroll
var scrollables = '.maincontain:not(.bg) main';

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
    $.post(url, function(html)
    {
        // http://rosspenman.com/pushstate-jquery/
        var title = html
            .match(/<title>(.*?)<\/title>/)[1]
            .trim()
            .decodeHTML();
        document.title = title;
            
        // Sets the specified menu item as active, and the rest as inactive
        activateMenuItem(html
            .match(/href="(.*?)"><li class="active"/)[1]
            .decodeHTML());
        
        //// comment this better
        popstatesMoveToSlide = true;
        
        ga('send', 'pageview', {'page': url, 'title': title});
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
        var maincontain = $(this).closest('.maincontain');
        var inslide = maincontain.closest('.inslide');
        if($(this).closest('.maincontain').hasClass('overlay'))
            var maincontain = inslide.find('.maincontain:not(.overlay)');
            
        var extraHeight = 0;
        var heights = inslide.css(
            ['margin-top',  'margin-bottom', 'padding-top', 'padding-bottom']);
        $.each(heights, function(property, value)
            { extraHeight += Number(value.substring(0, value.length - 2)); });
        var heights = maincontain.css(
            ['margin-top',  'margin-bottom', 'padding-top', 'padding-bottom']);
        $.each(heights, function(property, value)
            { extraHeight += Number(value.substring(0, value.length - 2)); });
        var newHeight = windowsHeight - extraHeight;
        
        if(!$(this).closest('.maincontain').hasClass('overlay'))
        {
            var children = $(this).children();
            var childrenHeight = 0;
            $.each(children, function()
                { childrenHeight += $(this).outerHeight(true); });
            if(childrenHeight < newHeight) newHeight = childrenHeight;
        }
        
        $(this).css('height', newHeight + 'px');
        $(this).closest('.slimScrollDiv').css('height', newHeight + 'px');
    });
    
    ga('send', 'event', 'window', 'resize', 'window');
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
        touchSensitivity: 33,
        afterResize: resizeMainElements,
        onSlideLeave: updatePageAndHistory,
        normalScrollElements: scrollables
    });
    // Fixes fullpage.js' full-page background image issues
    //fp.css('background', fp.css('background'));
    var hl = $('#headliners');
    hl.addClass('loaded')
        .css({
            'background-position': 'center 80%',
            '-webkit-transform': 'scale(1, 1)',
            '-ms-transform':     'scale(1, 1)',
            'transform':         'scale(1, 1)',
            'background-size': 'cover'});
    
    // Nicer scrollbars for non-iOS browsers
    if(!isTouchDevice)
    {
        $(scrollables).slimScroll(
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
        
        ga('send', 'event', 'button', 'click', 'nav-menu');
        
        // Cancels the normal anchor operation
        return false;
    });
    
    // Scrolls when the back/forward buttons are pressed
    $(window).on('popstate', function(e)
    {
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
        
        ga('send', 'event', 'tour-row', 'click', 'tour-row');
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
    
    // Togglifies opener overlays
    // Uses CSS for performance
    $('#openers .polaroid').click(function(e)
    {
        var inslide = $(this).closest('.inslide');
        
        // Sets picture
        inslide.find('.maincontain.bg.overlay main')
            .css('background-image', 'url(' + $(this).find('img').attr('src') + ')');
        
        // Sets text
        inslide.find('.maincontain.text.overlay .opener').removeClass('active')
            .filter('.' + $(this).closest('.polaroidcontain').attr('id')).addClass('active');
        
        var main = $(this).closest('.inslide').find('.maincontain.text.overlay main');
        if(main.closest('.slimScrollDiv').length)
            main.slimScroll({scrollTo: '0px'});
        else
            main.scrollTop(0);
        
        // Displays overlays
        inslide.find('.maincontain.overlay').addClass('active');
        
        ga('send', 'event', 'opener-overlay', 'click', 'opener-overlay-show');
    });
    $('#openers .maincontain.overlay').click(function(e)
    {
        $(this).parent().find('.maincontain.overlay').removeClass('active');
        
        ga('send', 'event', 'opener-overlay', 'click', 'opener-overlay-hide');
    });
    
    var person = 'vince';
    $('.' + person + '.email').prop('href', 'mailto:' + person + '@vincejacklinforever.com').html(person + '@vincejacklinforever.com');
    person = 'jacklin';
    $('.' + person + '.email').prop('href', 'mailto:' + person + '@vincejacklinforever.com').html(person + '@vincejacklinforever.com');
    
    // Supposed to make the main scroll to top when status bar is tapped
    //window.addEventListener('scroll', function()
    //{
    //    $('main').scrollTop(0);
    //}, false);
});

// Once the dom and all images have loaded
$(window).load(function() { resizeMainElements(); });
