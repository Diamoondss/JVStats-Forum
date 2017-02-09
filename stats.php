<?php 
$timestamp_debut = microtime(true);
$result=array();
print("Forum : ");
$forum = trim(fgets(STDIN));
print("Numéro de la dernière page du forum : ");
$page = trim(fgets(STDIN));
while ($page>=1) {
	$source = file_get_contents ("http://www.jeuxvideo.com/forums/0-".$forum."-0-1-0-".$page."-0-counter-strike-global-offensive.htm");
	preg_match_all('#<span class="topic-count">[^\d]*(\d+)[^\d]*?</span>#s', $source, $nombre[$i]);
	$result = array_merge($result, $nombre[$i][1]);
	print("Page : ".$page ."\n");
	$page-=25;
}
$nbrmsg = array_sum($result);
$nbrtopic = count($result);
echo ("\nIl y a au total ");
print_r ($nbrmsg);
echo (" messages et ");
print_r ($nbrtopic);
echo (" topics ! \n");
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
echo ("\nStatistiques générées en : " . $difference_ms . " secondes.");
?>