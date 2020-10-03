<!DOCTYPE html>
<html>
<title>Открытие кейсов brawlstars</title>
<meta charset="utf-8">
<script src="https://pocketmine.ru/donate/js/jquery.min.js?req=1"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="__styles.css" />
<body>
<div class="container">
	<div class="block-one">
		<h2>Открытие кейсов (Demo)</h2>
		<p>Нажми на кнопку чтобы начать открытие кейса</p>
		<p><span class="__open-button __m-b10" id="open">Открыть кейс</span></p>
		<img src="__img/__arrow.png" id="__arrow"/>
	</div>
	<div class="block-two">
		<h2>И тебе выпадает: </h2>
		<ul id="id01"  class="hr">
		  <li><img src="__img/__gems-brawlstars.png" title="BrawlStars Prize" class="__image_default" />
			<p class="__image_content">50</p></li>
		  <li><img src="__img/__gems-brawlstars.png" title="BrawlStars Prize" class="__image_default" />
			<p class="__image_content">100</p></li>
		  <li><img src="__img/__gems-brawlstars.png" title="BrawlStars Prize" class="__image_default" />
			<p class="__image_content">250</p></li>
		  <li><img src="__img/__gems-brawlstars.png" title="BrawlStars Prize" class="__image_default" />
			<p class="__image_content">500</p></li>
		  <li><img src="__img/__gems-brawlstars.png" title="BrawlStars Prize" class="__image_default" />
			<p class="__image_content">700</p></li>
		</ul>
	</div>
</div> <script>
  window.played = false;
  var tickPlay = new Audio(); 
   tickPlay.preload = 'auto';
   tickPlay.src = 'c4_click.wav';
  var endGame = new Audio(); 
   endGame.preload = 'auto';
   endGame.src = 'knife_deploy1.wav';
	function shuffle() {
		$(".block-two").css('display','block');
		$("#__arrow").css('display','block');
		tickPlay.play();
		var ul = document.querySelector('ul');
		for (var i = ul.children.length; i >= 0; i--) {
			ul.appendChild(ul.children[Math.random() * i-2 | 0]);
		}
		w3.sortHTML('#id01', 'li');
	}
    function randomInteger(min, max) {
		let rand = min - 0.5 + Math.random() * (max - min + 1);
		return Math.round(rand);
	}
  
  $(document).ready(function(){
	function stopShuffle() {
		clearInterval(window.__ticker);
		var $latest = parseInt($("#id01 > li").eq(0).text());
		endGame.play();
		window.played = false;
		console.log('interval cleared');
		$(".block-two").css('display','none');
		$("#__arrow").css('display','none');
		alert("BrawlStars Рулетка\n\nТебе выпало " + $latest + " гемов!\nПоздравляем!");
	}
	$("#open").on('click',function() {
		 window.__ticker = setInterval(function(){ // ticker
		   //console.log('ticker on | played = '+window.played);
		   if(!window.played) return;
			shuffle();
		},400);
		
		if(window.played == true) return; // played
			var $time = parseInt(randomInteger(4000,7000));
			window.played = true;
			window.__interval = setTimeout(function(){ //stop
			stopShuffle();
		},$time);
	});
  });
  </script>
</body>
</html>