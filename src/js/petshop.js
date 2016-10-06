$(function() {
	var prev_ = $('.home a');
	
	$('.home a').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "home.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.home a').addClass("spam");
		prev_ = this;
	});
	
	$('.about a').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "about.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.about a').addClass("spam");
		prev_ = this;
	});
	
	$('.sales a').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "sales.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.sales a').addClass("spam");
		prev_ = this;
	});
	
	$('.services a').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "services.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.services a').addClass("spam");
		prev_ = this;
	});
	
	$('.contact a').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "contact.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.contact a').addClass("spam");
		prev_ = this;
	});
	
	$('.login').click(function(event){
		event.preventDefault;
	
		$.ajax({
			url: "login.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
	});
	/*
	$('.staff a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "staffTemplate.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		
		$('.about').addClass("hide");
		$('.sales').addClass("hide");
		$('.services').addClass("hide");
		$('.staff').addClass("hide");
		$('.clients').addClass("hide");
		$('.treatment').removeClass("hide");
		$('.hotel').removeClass("hide");
	});
	*/
	$('.treatment a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "animalTreatment.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.treatment a').addClass("spam");
		prev_ = this;
	});
	
	$('.hotel a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "hotel.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.hotel a').addClass("spam");
		prev_ = this;
	});
	/*
	$('.clients a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "clientTemplate.html",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		
		$('.staff').addClass("hide");
		$('.clients').addClass("hide");
		$('.pets').removeClass("hide");
		$('.procedure').removeClass("hide");
	});
	*/
	$('.pets a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "pets.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.pets a').addClass("spam");
		prev_ = this;
	});
	
	$('.procedure a').click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: "procedure.php",
			success: function(data) {
				$('#content').html(data);
			}
		});
		$(prev_).removeClass("spam");
		$('.procedure a').addClass("spam");
		prev_ = this;
	});
});