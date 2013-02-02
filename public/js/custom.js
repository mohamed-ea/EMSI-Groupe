
// Infobar Hide/Show
jQuery(document).ready(function($) {
	
	$('#infobar').hide();

	$('#slide-toggle').click(function() {
		$('#infobar').slideToggle(400);
		return false;  
	});

	$("#slide-toggle").click(function () {
		$(this).toggleClass("hide");
	});
});

// Top Menu
jQuery(document).ready(function($){ 
    $('ul.top-menu').superfish({
        delay:       500,
        speed:       'fast',
        dropShadows: false
    }); 

	// Mobile Menu
	var $menu_select = $("<select />"); 
	$("<option />", {"selected": "selected", "value": "", "text": "Site Navigation"}).appendTo($menu_select);
	$menu_select.appendTo("#primary-menu");
	
	$("#primary-menu ul li a").each(function(){
		var menu_url = $(this).attr("href");
		var menu_text = $(this).text();

		if ($(this).parents("li").length == 2) { menu_text = '- ' + menu_text; }
		if ($(this).parents("li").length == 3) { menu_text = "-- " + menu_text; }
		if ($(this).parents("li").length > 3) { menu_text = "--- " + menu_text; }
		$("<option />", {"value": menu_url, "text": menu_text}).appendTo($menu_select)
	})
	
	field_id = "#primary-menu select";
	$(field_id).change(function()
	{
		value = $(this).attr('value');
		window.location = value;
	});
});

// Subscribe form
jQuery(document).ready(function($) {

	$('#subscribe').submit(function(){

		var action = $(this).attr('action');

		$("#notice-messages").slideUp(750,function() {
		$('#notice-messages').hide();

		$.post(action, {
			name: $('#name').val(),
			email: $('#email').val()
		},
			function(data){
				document.getElementById('notice-messages').innerHTML = data;
				$('#notice-messages').slideDown('slow');
				$('#submit').removeAttr('disabled');
				if(data.match('success') != null) $('#subscribe').slideUp('slow');
			});
		});
		return false;
	});
});

// Contact form
jQuery(document).ready(function($) {

	$('#contactform').submit(function(){

		var action = $(this).attr('action');

		$("#form-message").fadeOut(750,function() {
		$('#form-message').hide();
		
		$.post(action, {
			name: $('#form-name').val(),
			email: $('#form-email').val(),
			phone: $('#form-phone').val(),
			subject: $('#form-subject').val(),
			comments: $('#form-comments').val(),
			verify: $('#form-verify').val()
		},
			function(data){
				document.getElementById('form-message').innerHTML = data;
				$('#form-message').slideDown('slow');
				$("#form-message").click(function() {
					$(this).slideUp('slow');
				});
				$('#submit').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform').slideUp('slow');
			});
		});
		return false;
	});
});


// Tabs 
jQuery(document).ready(function($) {
	// Tabs style 1
	$(".tabs-style-1 .tab-content").hide();
	$(".tabs-style-1 ul.tabs li:first").addClass("active").show();
	$(".tabs-style-1 .tab-content:first").show();

	$(".tabs-style-1 ul.tabs li").click(function(e) {		
		$(".tabs-style-1 ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tabs-style-1 .tab-content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		e.preventDefault();
	});

	// Tabs style 2
	$(".tabs-style-2 .tab-content").hide();
	$(".tabs-style-2 ul.tabs li:first").addClass("active").show();
	$(".tabs-style-2 .tab-content:first").show();

	$(".tabs-style-2 ul.tabs li").click(function(e) {		
		$(".tabs-style-2 ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tabs-style-2 .tab-content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		e.preventDefault();
		});

	// Tabs style 3
	$(".tabs-style-3 .tab-content").hide();
	$(".tabs-style-3 ul.tabs li:first").addClass("active").show();
	$(".tabs-style-3 .tab-content:first").show();

	$(".tabs-style-3 ul.tabs li").click(function(e) {		
		$(".tabs-style-3 ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tabs-style-3 .tab-content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		e.preventDefault();
		});

	// Tabs style 4
	$(".tabs-style-4 .tab-content").hide();
	$(".tabs-style-4 ul.tabs li:first").addClass("active").show();
	$(".tabs-style-4 .tab-content:first").show();

	$(".tabs-style-4 ul.tabs li").click(function(e) {		
		$(".tabs-style-4 ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tabs-style-4 .tab-content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		e.preventDefault();
	});
});

// Accordion & Toggle 
jQuery(document).ready(function($) {
	// Accordion style 1
	$('.accordion-style-1 .accordion-container').hide();
	$('.accordion-style-1 .accordion-trigger:first').addClass('active').next().show(); // First item active
	$('.accordion-style-1 .accordion-trigger').click(function(e){
		if( $(this).next().is(':hidden') ) {
			$('.accordion-style-1 .accordion-trigger').removeClass('active').next().slideUp();
			$(this).toggleClass('active').next().slideDown();
		} else {
			$('.accordion-style-1 .accordion-trigger').removeClass('active').next().slideUp();
		}
		e.preventDefault();
	});

	// Accordion style 2
	$('.accordion-style-2 .accordion-container').hide();
	$('.accordion-style-2 .accordion-trigger:first').addClass('active').next().show(); // First item active
	$('.accordion-style-2 .accordion-trigger').click(function(e){
		if( $(this).next().is(':hidden') ) {
			$('.accordion-style-2 .accordion-trigger').removeClass('active').next().slideUp();
			$(this).toggleClass('active').next().slideDown();
		} else {
			$('.accordion-style-2 .accordion-trigger').removeClass('active').next().slideUp();
		}
		e.preventDefault();
	});

	// Toggle style 1
	$(".toggle-style-1 .toggle-container").hide();
	$('.toggle-style-1 .toggle-trigger:first').addClass('active').next().show(); // First item active
	$(".toggle-style-1 .toggle-trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		return false;
	});

	// Toggle style 2
	$(".toggle-style-2 .toggle-container").hide();
	$('.toggle-style-2 .toggle-trigger:first').addClass('active').next().show(); // First item active
	$(".toggle-style-2 .toggle-trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		return false;
	});
});


// Alert Boxes
jQuery(document).ready(function($) {
	$(".hide").click(function() {
		$(this).fadeOut(600);
	});
});

// TipTip
jQuery(document).ready(function($) {
	$(".has-tip").tipTip({
		maxWidth: "200px",
		edgeOffset: 10,
		defaultPosition: "top"
	});

	$(".has-tip.bottom").tipTip({
		defaultPosition: "bottom"
	});

	$(".has-tip.right").tipTip({
		defaultPosition: "right"
	});

	$(".has-tip.left").tipTip({
		defaultPosition: "left"
	});
});
