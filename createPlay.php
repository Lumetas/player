<?php
$name = $_GET['n'];

echo "$name";

function my_copy_all($from, $to, $rewrite = true) {
if (is_dir($from)) {
@mkdir($to);
$d = dir($from);
while (false !== ($entry = $d->read())) {
if ($entry == "." || $entry == "..") continue;
my_copy_all("$from/$entry", "$to/$entry", $rewrite);
}
$d->close();
} else {
if (!file_exists($to) || $rewrite)
copy($from, $to);
}
}
$link = 'playlists/'.$name;
my_copy_all("ex","$link", false);