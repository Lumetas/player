<?php if ($_GET['delete'] != ''){
function rmRec($path) {
  if (is_file($path)) return unlink($path);
  if (is_dir($path)) {
    foreach(scandir($path) as $p) if (($p!='.') && ($p!='..'))
      rmRec($path.DIRECTORY_SEPARATOR.$p);
    return rmdir($path); 
    }
  return false;
  }
$delD = $_GET['delete'];

$delD = 'playlists/'.$delD;

rmRec($delD);

echo "<script>window.location.href = 'index.php';</script>";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='script.js'></script>
  	<link rel="stylesheet" href="style.css">
    <title>music player</title>
</head>
<body>
 <style>
   body::before {
    content: '';
    position: fixed; /* Фиксируем на одном месте */
    left: 0; right: 0; /* Вся ширин */
    top: 0; bottom: 0; /* Вся высота */
    z-index: -1; /* Фон ниже текста */
    /* Параметры фона */
    background: url(b.jpg) center / cover no-repeat;
    filter: blur(5px); /* Размытие */
   }
   body {
    color: #fff; /* Цвет текста */
   }
  </style>
<iframe style='width:0.000001px; height: 0.000000001px; position:absolute;  left:0; top:0; opacity:0;' id='ajax'></iframe>
    <input id='input' type='text' style='background: rgba(1, 0, 0, 0); border: 2px solid white; border-radius: 50px; color:white; top:0; left: 0; position: absolute; height: 10%; width: 40%;' placeholder='Имя плейлиста: '>
<button onclick='aj()' style='background: rgba(1, 0, 0, 0); border-radius: 50px; border: 2px solid white; color: white; top:0; right: 0; position: absolute; height: 10%; width: 40%;'>Создать плейлист.</button>
<script>function aj(){
//alert('');
let content = document.getElementById('input').value;
if (content != ''){
document.getElementById('input').value = '';
document.getElementById('ajax').src = 'createPlay.php?n=' + content;
window.location.href = 'index.php';
//createPlay.php?n=
}}</script>
<br><br><br><br><br><br>
<?php
//Вывод плейлистов
$dir = __DIR__ . '/playlists';
 
$files = array();
foreach(glob($dir . '/'.$fName.'*') as $file) {
	$files[] = basename($file);	
} 


$i = 0;
$b = $files[$i];
while ($b != ''):
$li = $files[$i];
echo <<<OUT
<a style='
text-decoration:none;
color: white;
left: 1%;
position:absolute;
border: 2px double white;
border-radius: 25px;
padding: 3px;
font-size:200%;
' href='playlists/$li/index.php'>$li</a>   



<a style='
text-decoration:none;
color: white;
right: 1%;
position:absolute;
border: 2px double white;
border-radius: 30px;
font-size:200%;
 padding: 3px;
' href='?delete=$li'>Удалить</a><br><br><br>
OUT;
$i++;
$b = $files[$i];
endwhile;

//if ($files[1] == ''){

//echo 'ok';
//}
//<a href='playlists/$Value/index.php'>$Value 1</a>
?>

</body>
</html>