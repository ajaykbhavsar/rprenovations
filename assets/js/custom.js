$(document).ready(function () {
	$(".js-example-basic-single").select2();

	$("#exampleModal").modal();
});

$(".homeslider").show();

$(".homeslider").slick({
	fade: true,

	slidesToShow: 1,

	infinite: false,

	slidesToScroll: 1,

	autoplay: true,

	autoplaySpeed: 2000,

	dots: true,

	arrows: false,
});

$(".servicessection").show();

$(".servicessection").slick({
	slidesToShow: 1,

	infinite: false,

	slidesToScroll: 1,

	autoplay: true,

	autoplaySpeed: 2000,

	dots: true,

	arrows: false,

	responsive: [
		{
			breakpoint: 992,

			settings: {
				vertical: false,

				slidesToShow: 1,
			},
		},

		{
			breakpoint: 768,

			settings: {
				vertical: false,

				slidesToShow: 1,
			},
		},

		{
			breakpoint: 680,

			settings: {
				vertical: false,

				slidesToShow: 1,
			},
		},

		{
			breakpoint: 380,

			settings: {
				vertical: false,

				slidesToShow: 1,
			},
		},
	],
});

$(".testimonials").show();

$(".testimonials").slick({
	slidesToShow: 1,

	infinite: false,

	slidesToScroll: 1,

	autoplay: true,

	autoplaySpeed: 2000,

	dots: true,

	arrows: false,
});

//open and close tab menu

$(".nav-tabs-dropdown")
	.on("click", "li:not('.active') a", function (event) {
		$(this).closest("ul").removeClass("open");

		$(".slider-for").slick("setPosition");

		$(".slider-nav").slick("setPosition");
	})

	.on("click", "li.active a", function (event) {
		$(this).closest("ul").toggleClass("open");

		$(".slider-for").slick("setPosition");

		$(".slider-nav").slick("setPosition");
	});

// $('.gallerymain li a').click(function(){

//   $('.gallerypopup').addClass('open');

//   $('.slider-content').slick('setPosition');

//   $('.slider-thumb').slick('setPosition');

// })

$(document).ready(function () {
	$('input[type="radio"]').click(function () {
		var inputValue = $(this).attr("value");

		var targetBox = $("." + inputValue);

		$(".paybox").not(targetBox).hide();

		$(targetBox).show();
	});
});

$(".slider-for").show();

$(".slider-for").slick({
	slidesToShow: 1,

	slidesToScroll: 1,

	arrows: false,

	fade: true,

	asNavFor: ".slider-nav",

	responsive: [
		{
			breakpoint: 767,

			settings: {
				vertical: false,

				arrows: false,
			},
		},
	],
});

$(".slider-nav").show();

$(".slider-nav").slick({
	slidesToShow: 6,

	slidesToScroll: 1,

	asNavFor: ".slider-for",

	dots: false,

	centerMode: false,

	focusOnSelect: true,

	responsive: [
		{
			breakpoint: 992,

			settings: {
				vertical: false,

				slidesToShow: 4,
			},
		},

		{
			breakpoint: 768,

			settings: {
				vertical: false,

				slidesToShow: 4,
			},
		},

		{
			breakpoint: 580,

			settings: {
				vertical: false,

				slidesToShow: 2,
			},
		},

		{
			breakpoint: 380,

			settings: {
				vertical: false,

				slidesToShow: 2,
			},
		},
	],
});

$(".modal").on("shown.bs.modal", function (e) {
	//   $('.your-class').slick('setPosition');

	$(".slider-for").slick("setPosition");

	$(".slider-nav").slick("setPosition");

	//   $('.wrap-modal-slider').addClass('open');
});

// add all to same gallery

$(".gallery a").attr("data-fancybox");

// assign captions and title from alt-attributes of images:

$(".gallery a").each(function () {
	$(this).attr("data-caption", $(this).find("img").attr("alt"));

	$(this).attr("title", $(this).find("img").attr("alt"));
});

// start fancybox:

$(".gallery a").fancybox();

$(document).ready(function () {
	$("#test1").click(function () {
		$("#airport").show();

		$("#intercity").hide();

		$("#local").hide();
	});

	$("#test2").click(function () {
		$("#airport").hide();

		$("#intercity").hide();

		$("#local").show();
	});

	$("#test3").click(function () {
		$("#airport").hide();

		$("#intercity").show();

		$("#local").hide();
	});

	$("#rtrip1").click(function () {
		$("#enddate").show();
	});

	$("#rtrip2").click(function () {
		$("#enddate").hide();
	});
});

$("#datetimepicker").datetimepicker();

$("#datetimepicker").change(function () {
	var start_date = $("#datetimepicker").val();

	var end_date = new Date();

	start_date = new Date(start_date);

	end_date = new Date(end_date);

	var diff = end_date - start_date;

	var diffSeconds = diff / 1000;

	var HH = Math.floor(diffSeconds / 3600);

	var MM = Math.floor(diffSeconds % 3600) / 60;

	var formatted = (HH < 10 ? "0" + HH : HH) + ":" + (MM < 10 ? "0" + MM : MM);

	$("#free").html(formatted);
});

$("#datetimepicker2").datetimepicker();

$("#datetimepicker2").change(function () {
	var start_date = $("#datetimepicker").val();

	var end_date = new Date();

	start_date = new Date(start_date);

	end_date = new Date(end_date);

	var diff = end_date - start_date;

	var diffSeconds = diff / 1000;

	var HH = Math.floor(diffSeconds / 3600);

	var MM = Math.floor(diffSeconds % 3600) / 60;

	var formatted = (HH < 10 ? "0" + HH : HH) + ":" + (MM < 10 ? "0" + MM : MM);

	$("#free").html(formatted);
});

$("#datetimepicker3").datetimepicker();

$("#datetimepicker3").change(function () {
	var start_date = $("#datetimepicker").val();

	var end_date = new Date();

	start_date = new Date(start_date);

	end_date = new Date(end_date);

	var diff = end_date - start_date;

	var diffSeconds = diff / 1000;

	var HH = Math.floor(diffSeconds / 3600);

	var MM = Math.floor(diffSeconds % 3600) / 60;

	var formatted = (HH < 10 ? "0" + HH : HH) + ":" + (MM < 10 ? "0" + MM : MM);

	$("#free").html(formatted);
});

$("#datetimepicker4").datetimepicker();

$("#datetimepicker4").change(function () {
	var start_date = $("#datetimepicker").val();

	var end_date = new Date();

	start_date = new Date(start_date);

	end_date = new Date(end_date);

	var diff = end_date - start_date;

	var diffSeconds = diff / 1000;

	var HH = Math.floor(diffSeconds / 3600);

	var MM = Math.floor(diffSeconds % 3600) / 60;

	var formatted = (HH < 10 ? "0" + HH : HH) + ":" + (MM < 10 ? "0" + MM : MM);

	$("#free").html(formatted);
});

$(".datetimepicker4").datepicker();

$(".timepicker4").timepicker();

// $(".datetimepicker4").change(function() {

// var start_date = $(".datetimepicker").val();

// var end_date = new Date();

// start_date = new Date(start_date);

// end_date = new Date(end_date);

// var diff = end_date - start_date;

// var diffSeconds = diff/1000;

// var HH = Math.floor(diffSeconds/3600);

// var MM = Math.floor(diffSeconds%3600)/60;

// var formatted = ((HH < 10)?("0" + HH):HH) + ":" + ((MM < 10)?("0" + MM):MM)

// $("#free").html(formatted);

// });
