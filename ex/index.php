<?php
$uploaddir = 'song/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "<script>console.log('Файл корректен и был успешно загружен.\n')</script>";
} else {
    echo "<script>console.log('Возможная атака с помощью файловой загрузки!\n')</script>";
}

echo "<script>console.log('Некоторая отладочная информация:')</script>";
$files = $_FILES;
echo "<script>console.log('$files')</script>";


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Music Player</title>
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5">
  <link href='content/1.css' rel='stylesheet' type='text/css'>
<script src="content/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script><link rel="stylesheet" href="content/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
 <div id="iphone">
  
  <div id="screen">
   <div id="content-wrap">
    <div id="background" style="background-image: url('b.jpg');"></div>
    <div id="content" class="content">
   <div id="header">
      <span id="menu-btn"><img src="content/menu.svg" alt="" class="svg men"></span>
   <!--     <span id="options-btn"><img src="https://emilcarlsson.se/assets/svg/more.svg" alt="" class="svg"></span>-->
     </div> 
     <div class="jcarousel" data-jcarousel="true">
      <ul id="songs" style="left: 0px; top: 0px;">
	  
	  
	  <?php
	
	$dir = __DIR__ . '/song';
 
$files = array();
foreach(glob($dir . '/'.$fName.'*.mp3') as $file) {
	$files[] = basename($file);	
} 
	


foreach ($files as &$value) {
$fil = str_replace('.mp3', '', $value);
$filPng = 'song/'.$fil.'.png';
$filMp3 = 'song/'.$fil.'.mp3';
$song = explode('-', $fil);
$artist = $song[0];
$title = $song[1];


if (file_exists($filPng)){

echo <<<OUT


	
	<li class="song" data-audio="$filMp3" data-color="#f38578">
					<img src="$filPng">
					<p class="song-title">$title</p>
					<p class="song-artist">$artist</p>
				</li>



OUT;
}
else {


echo <<<OUT


	
	<li class="song" data-audio="$filMp3" data-color="#f38578">
					<img src="n.png">
					<p class="song-title">$title</p>
					<p class="song-artist">$artist</p>
				</li>



OUT;

}
	
	
}	
?>	
	  
	  
      
	  

	  

	 
	 </ul>
     </div>
     <audio crossorigin="">
				<source src="" type="audio/mpeg">
			</audio>
	<div class='bott'>
     <div id="controls">
	  
	 
	    			
 					 <span id="sub-controls">    <i class="fa fa-random" aria-hidden="true"></i></span>
   			
      <span id="previous-btn"><i class="fa fa-step-backward fa-fw" aria-hidden="true"></i></span>
      <span id="play-btn"><i class="fa fa-play fa-fw" aria-hidden="true"></i></span>
	 
  
      <span id="next-btn"><i class="fa fa-step-forward fa-fw" aria-hidden="true"></i></span>
	
	     		
 									  <span id="sub-controls">   <i class="fa fa-refresh" aria-hidden="true"></i></span>
   				
     </div>
     <div id="timeline">
	 <div class="time current-time" id="current-time">0:00</div>
	 <div class="time total-time" id="total-time">--:--</div>
      <div class="slider" data-direction="horizontal">
				<div class="progress">
					<div class="pin" id="progress-pin" data-method="rewind"></div>
				</div>
			</div>
     </div>
     <div id="sub-controls">


     </div>
	</div>
    </div>
    <div id="overlay"></div>
   </div>
   <div id="sidemenu">
    <ul>
	
	<form enctype="multipart/form-data" action="" method="POST">
    
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
    <input class='fa songFile zfm' onchange="upSong();" style='opacity:0; z-index:1; position: absolute' value='FILE' name="userfile" type="file" />
	<p class='svf zfm' style='left:0; z-index:-1; position: absolute'>upload song</p>
	<br><br><br>
	<!--
	
	<input class='fa imgFile zfm' id='' onchange="upImage();" style='opacity:0; z-index:1; position: absolute' value='FILE' name="userfile" type="file" />
	<p class='ivf zfm' style='left:0; z-index:-1; position: absolute'>upload image</p>
	<br><br><br> -->
	
	<script>
	function upImage(){
	let ivf = document.querySelector('.imgFile');
	let fvi = ivf.value;

	let imageValueFile = document.querySelector('.ivf');
	imageValueFile.innerHTML = 'uploaded image : ' + fvi;
	}
	
	function upSong(){
	let svf = document.querySelector('.songFile');
	let fvs = svf.value;

	let songValueFile = document.querySelector('.svf');
	songValueFile.innerHTML = 'uploaded song : ' + fvs;
	}
	</script>
    <input class='fa zfm' style='background: #444; color: white;' type="submit" value="upload" />
</form>
	
	
 <!--    <li>
      <i class="fa fa-search fa-fw" aria-hidden="true"></i>
			 Search
     </li> -->
   <!--   <li>
      <img class="svg menu-icons" src="content/music-player.svg" alt="">
			 Playlists
     </li>
     <li>
      <img id="album-icon" class="svg menu-icons" src="content/album-icon.svg" alt="">
      Albums
     </li>
     <li>
      <i class="fa fa-microphone fa-fw" aria-hidden="true"></i>
      Artists
     </li>
			<li>
				<i class="fa fa-podcast fa-fw" aria-hidden="true"></i>
				Podcasts
			</li>
			<li>
				<i class="fa fa-cog fa-fw" aria-hidden="true"></i>
				Settings
			</li>-->
    </ul>
   </div>
	 <div id="bluetooth-devices" class="menu">
			<span class="close-btn"><span>×</span> Close</span>
			<h3>Devices nearby</h3>
			<ul>
				<li class="connected">
					<img id="headphones-icon" class="svg menu-icons" src="content/headphone.svg" alt="">
					<p>
						Major II Bluetooth
						<span>Connected</span>
					</p>
				</li>
				<li>
					<img id="headphones-icon" class="svg menu-icons" src="content/loudspeaker.svg" alt="">
					<p>
						Sonos One
						<span>Connected</span>
					</p>
				</li>
				<li>
					<img id="headphones-icon" class="svg menu-icons" src="content/car.svg" alt="">
					<p>
						Kia Motors
						<span>Connected</span>
					</p>
				</li>
			</ul>
			<p class="info-text">
				Make sure your bluetooth device is turned on and in range.
			</p>
		</div>
	 <div id="song-options" class="menu">
		 <span class="close-btn"><span>×</span> Close</span>
		 <div id="song-info">
		 	<img src="n.png" alt="">
			 <div class="artist-wrap">
			 	<p>
			 		<span class="title">Music</span>
					<span class="artist">Music</span>
			 	</p>
			 </div>
		 </div>
	 	<ul>
	 		<li>
        <i class="fa fa-music fa-fw add" aria-hidden="true"></i>
				Add to playlist
			</li>
			<li>
				<i class="fa fa-microphone fa-fw" aria-hidden="true"></i>
				View Artist
			</li>
     <li>
      <img id="album-icon" class="svg menu-icons" src="content/compact-disc.svg" alt="">
      View Album
     </li>
			<li>
				<i class="fa fa-share-square-o fa-fw" aria-hidden="true"></i>
				Share
			</li>
	 	</ul>
	 </div>
	 <div id="home-screen">
		<div class="home-content">
			<h2>Music Player App</h2>
		
			<div class="app-icon">
				
			</div>
		
		</div>
	 </div>
  </div>
  
 </div>
</div>
<!-- partial -->
  <script src='content/jquery.min.js'></script>
<script src='content/15af25ac7b.js'></script>
<script src='content/jquery.jcarousel.min.js'></script>




<?php
include('script.js.php');
?>

</body>
</html>
