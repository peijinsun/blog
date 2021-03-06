searchVisible = 0;
$(document).ready(function () {
	$('ul.nav-tabs li').click(function(){
		$('ul.nav-tabs li').removeClass('selected');
		$(this).addClass('selected');	
	});

	$('ul.nav-tabs li').hover(function(){
	}, function() {
		var el = this;
		setTimeout(function() {
			$(el).removeClass('active');
		}, 0)
	});
    $('[data-toggle="search"]').click(function () {
        if (searchVisible == 0) {
            searchVisible = 1;
            $(this).parent().addClass('active');
            $(this).children('p').html('Close');
            $('.navbar-search-form').fadeIn(function () {
                $('.navbar-search-form input').focus();
            });
        } else {
            searchVisible = 0;
            $(this).parent().removeClass('active');
            $(this).children('p').html('Search');
            $(this).blur();
            $('.navbar-search-form').fadeOut(function () {
                $('.navbar-search-form input').blur();
            });
        }
    });

});

$("button.worth-btn")
    .on("mouseover", function () {
        $(this).css({"background-color": "#ef4135", "color": "white"});
    })
    .on("mouseleave", function () {
        if (!$(this).hasClass("liked")) {
            $(this).css({"background-color": "", "color": ""})
        }
        ;
    });
$("button.worth-btn").on("click", function () {
    $(this).addClass("liked");
    $(this).css("background-color", "#ef4135");
});
$('ul.main-nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).slideDown();
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).slideUp();
});

$('.nav-tabs > li > a').hover(function () {
    $(this).tab('show');
});

$(".cheap-item")
    .on("mouseover", function () {
        $(this).css({"border-color": "#ef4135", "box-shadow": "0 0 5px"});
    })
    .on("mouseleave", function () {
        $(this).css({"border-color": "", "box-shadow": ""});
    });

$(".discover-item")
    .on("mouseover", function () {
        $(this).css({"border-color": "#ef4135", "box-shadow": "0 0 3px"});
    })
    .on("mouseleave", function () {
        $(this).css({"border-color": "", "box-shadow": ""});
    });

$(".post-content").each(function () {
    var maxwidth = 120;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
});
$(".cheap-title").each(function () {
    var maxwidth = 28;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
});
$(".cheap-price").each(function () {
    var maxwidth = 12;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
    ;
});

