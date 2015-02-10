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
var isPhone       = navigator.userAgent.match(/(iPhone|iPod|Android|BlackBerry|BB10|Windows Phone|Tizen|Bada)/i);

// Elements whose contents are allowed to scroll
var scrollables = '.maincontain:not(.bg) main';

// Declared here so that it can be used in updatePageAndHistory
//   Defined in ready() so it can re-use a reference to the DOM
var activateMenuItem = function() {};

// This function gets run onSlideLeave (arrow key press, moveTo(), etc)
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

// Adjusts a main elements by .inslide and .maincontain properties, or
//   by main children properties (whichever is less)
var resizeMainElement = function(main)
{
    var maincontain = main.closest('.maincontain');
    var inslide = maincontain.closest('.inslide');
    
    // If this main element is an overlay, uses the
    //   non-overlay main element of the slide to determine its height
    if(main.closest('.maincontain').hasClass('overlay'))
        var maincontain = inslide.find('.maincontain:not(.overlay)');
        
    // Determines extraHeight, which is the top/bottom margin/padding of
    //   the main container and the inner slide element.
    //   These properties need to be maintained.
    var extraHeight = 0;
    var propertiesToCheck = ['margin-top', 'margin-bottom'];
    // BG overlays need to take up the padding space that the other main elemnts have
    if(!main.closest('.maincontain').hasClass('bg'))
        propertiesToCheck = propertiesToCheck.concat(['padding-top', 'padding-bottom']);
    var heights = inslide.css(propertiesToCheck);
    $.each(heights, function(property, value)
        // Extracts X from Xpx
        { extraHeight += Number(value.substring(0, value.length - 2)); });
    var heights = maincontain.css(propertiesToCheck);
    $.each(heights, function(property, value)
        // Extracts X from Xpx
        { extraHeight += Number(value.substring(0, value.length - 2)); });
    
    // Calculates the main element's newHeight, which is
    //   the height of the window minus the extraHeight
    var newHeight = $(window).height() - extraHeight;
    
    // Except if this is an overlay, which means it should
    //   take up as much space as it can (newHeight)...
    if(!main.closest('.maincontain').hasClass('overlay'))
    {
        // Calculates the heights of all of the main's children
        var children = main.children();
        var childrenHeight = 0;
        $.each(children, function()
            { childrenHeight += $(this).outerHeight(true); });
        
        // If the height of the children is less than
        //   the maximum height of the slide, the lesser of the two is used
        if(childrenHeight < newHeight) newHeight = childrenHeight;
    }
    
    // Sets the height of the main element and its slimScrollDiv element
    main.css('height', newHeight + 'px');
    main.closest('.slimScrollDiv').css('height', newHeight + 'px');
};

// Adjusts all main elements by .inslide and .maincontain properties, or
//   by main children properties (whichever is less)
var resizeMainElements = function()
{
    $('.maincontain main').each( function()
        { resizeMainElement($(this)); });
    
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
    $.fn.fullpage.reBuild();
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
    
    $('.lazy').lazy(
    {
        effect: 'fadeIn',
        effectTime: 500,
        appendScroll: $('main')
    });
    
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
        
        /*
        // If a scroll past the top/bottom of a scrollable element is attempted,
        //   prevent the scroll of the element
        var scrollDelta = touchStartY - e.originalEvent.touches[0].clientY;
        var scrollPos   = scrollableAncestor.scrollTop;         
        var atBottom = (scrollPos + $(scrollableAncestor).height()) ==
            scrollableAncestor.scrollHeight;
        if(scrollDelta < 0 && scrollPos == 0 || scrollDelta > 0 && atBottom)
            e.preventDefault();
            */
    });
    
    // Moves to slide when a navigation menu item is pressed
    $('#menu a').click( function()
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
        var url = location.href.match(/vincejacklinforever\.com\/([^?#]*)/)[1];
        console.log('history move to: ' + url);
        pageUpdatesModifyHistory = false;
        $.fn.fullpage.moveTo(1, $('[data-url="' + url + '"]').data('index'));
        pageUpdatesModifyHistory = true;
    });
    
    // Togglifies tour stories
    // http://stackoverflow.com/questions/7672556/how-to-add-an-opacity-fading-effect-to-to-the-jquery-slidetoggle/7672911#7672911
    $('#tour .row').click( function(e)
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
    $('#tour h1 div').click( function(e)
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
    $('#openers .polaroid').click( function(e)
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
    $('#openers .theEX').click( function(e)
    {
        $(this).closest('.inslide').find('.maincontain.overlay').removeClass('active');
        
        ga('send', 'event', 'opener-overlay', 'click', 'opener-overlay-hide');
    });
    
    // Opens merch overlay if showHoneyfund=1
    var honeymoonMapAdded = false;
    if(location.href.indexOf('/merch') != -1 &&
       location.href.indexOf('showHoneyfund=1') != -1)
    {
        var inslide = $('#merch');
        // Displays overlays
        inslide.find('.maincontain.overlay').addClass('active');
        
        // Adds map to html
        if(!honeymoonMapAdded)
        {
            if(isPhone)
                inslide.find('.iframe-rwd').remove();
            else
                inslide.find('.iframe-rwd')
                    .html('<iframe src="https://www.google.com/maps/d/u/0/embed?mid=z722SGaCaBYI.kkdJodwYFiyg"></iframe>');
            honeymoonMapAdded = true;
        }
    };
    // Togglifies merch overlay
    // Uses CSS for performance
    $('#merch #honeymoon .polaroid').click( function(e)
    {
        // Displays overlays
        $(this).closest('.inslide').find('.maincontain.overlay').addClass('active');
        
        // Adds map to html
        if(!honeymoonMapAdded)
        {
            if(isPhone)
                $(this).closest('.inslide').find('.iframe-rwd').remove();
            else
                $(this).closest('.inslide').find('.iframe-rwd')
                    .html('<iframe src="https://www.google.com/maps/d/u/0/embed?mid=z722SGaCaBYI.kkdJodwYFiyg"></iframe>');
            honeymoonMapAdded = true;
        }
        
        ga('send', 'event', 'merch-overlay', 'click', 'merch-overlay-show');
    });
    $('#merch .theEX').click( function(e)
    {
        $(this).closest('.inslide').find('.maincontain.overlay').removeClass('active');
        
        ga('send', 'event', 'merch-overlay', 'click', 'merch-overlay-hide');
    });
    if(isPhone)
    {
        var mapLink = $('.maplink');
        mapLink.html('<a ' +
            'href="https://www.google.com/maps/d/edit?mid=z722SGaCaBYI.kkdJodwYFiyg" ' +
            'target="_blank">' + mapLink.html() + '</a>');
    }
    
    // Handles password form submission
    var ticketsMain  = $('#tickets main');
    var passwordForm = $('#passwordform');
    passwordForm.submit( function(e)
    {
        e.preventDefault();
        
        var fields = passwordForm.find('input[name]');
        var fieldValues = {};
        fields.each( function(i, field)
        {
            fieldValues[field.name] = field.value;
        });
        $('#passwordform input').prop('disabled', true);
        $('#passwordform .loader').stop().css('opacity', 1);
        $.post('tickets', fieldValues, function(json)
        {
            //console.log('pf: ' + JSON.stringify(json));
            if(json.success)
            {
                $('#forms').replaceWith('<div id="forms">' + json.html + '</div>');
                resizeMainElement(ticketsMain);
                $('.pre.words').html('Please RSVP by April 2nd, 2015.');
                $('.post.words').html('If you have any questions or concerns, please ' +
                    'contact us at <a class="vince email" href="mailto:vince@vincejacklinforever.com">' +
                    'vince@vincejacklinforever.com</a>.');
            }
            else
            {
                alert(json.error);
                setTimeout( function() { $('#pfPassword').focus(); }, 0);
            }
            $('#passwordform input').prop('disabled', false);
            $('#passwordform .loader').stop().fadeTo(1000, 0);
        }, 'json');
    });
    
    // Handles adding more song fields
    $(document).on('click', '#rsvpform button', function(e)
    {
        e.preventDefault();
        
        // Adds new field to html
        var rsvpSongs = $('#rfSongs');
        var numSongs = rsvpSongs.data('numsongs');
        var newSongIndex = numSongs;
        var newInputID = 'rfSong' + newSongIndex;
        rsvpSongs.append('<br /><input id="' + newInputID + '" ' +
            'name="songs[' + newSongIndex + ']" type="text" ' +
            'placeholder="At Last by Etta James" />');
        rsvpSongs.data('numsongs', numSongs + 1);
        $('#rfSongsLabel').prop('for', newInputID);
        
        // Pluralizes text
        if(numSongs == 1)
            $('#thissong').html('these songs');
        
        resizeMainElement(ticketsMain);
        
        // Focuses new field
        $('#' + newInputID).focus();
    });
    
    // Handles rsvp form submission
    $(document).on('submit', '#rsvpform', function(e)
    {
        e.preventDefault();
        
        var fields = $('#rsvpform').find('input[name]');
        var fieldValues = {};
        fields.each( function(i, field)
        {
            if(field.type != 'radio')
                fieldValues[field.name] = field.value;
            else if(field.checked)
                fieldValues[field.name] = field.value;
        });
        $('#rsvpform input, #rsvpform button').prop('disabled', true);
        $('#rsvpform .loader').stop().css('display', 'inline-block');
        $.post('tickets', fieldValues, function(json)
        {
            //console.log('pf: ' + JSON.stringify(json));
            if(json.success)
            {
                $('#forms').replaceWith('<div id="forms">' + json.html + '</div>');
                $('#rsvpform input, #rsvpform button').prop('disabled', true);
                $('#rsvpform .loader').stop().css('display', 'inline-block');
                resizeMainElement(ticketsMain);
                
                var forms = $('#forms');
                var numSongsAdded = forms.find('#rfSongs').data('numSongsAdded');
                var tooManySongs  = forms.find('#rfSongs').data('tooManySongs');
                if(numSongsAdded > 1)
                    alert('Thank you for your rsvp!\n' + numSongsAdded + ' songs added to your suggestions!');
                else if(numSongsAdded == 1)
                    alert('Thank you for your rsvp and song suggestion!');
                else
                    alert('Thank you for your rsvp!');
                if(tooManySongs)
                    alert('too many songs!');
            }
            else
                alert(json.error);
            $('#rsvpform input, #rsvpform button').prop('disabled', false);
            $('#rsvpform .loader').stop().fadeOut(1000, function() { $(this).hide(); });
        }, 'json');
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
