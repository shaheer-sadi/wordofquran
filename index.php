<?php
//adds a sample comment
require_once './vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;

//print CssSelector::toXPath('div.item > h4 > a');

$db = null;

$datadir = __DIR__.'/data/v1';

$datafiles = glob($datadir .'/*.txt');





$action = isset($_GET['action'])?$_GET['action']:'';
$filename = isset($_GET['filename'])?$_GET['filename']:'';
$filehtml = '';

switch($action) {
	case 'update_data':
		print "updating data for $filename..";
		set_filehtml($filename);
		
		//now process filedata
		$crawler = new Crawler($filehtml);
		
		$surahName = mysql_real_escape_string($crawler->filter('#heading h1')->text());
		$surahNameEN = mysql_real_escape_string($crawler->filter('#heading h2')->text());
		
		var_dump($surahName);
		var_dump($surahNameEN);


		$surah = str_replace('.txt', '', $filename);

		//remove existing words
		$sql = "DELETE FROM words
				WHERE surah = '$surah'";

		db_query($sql);
		
		$ayah_num = 1;
		$tables = $crawler->filter('table.aya-W td')->each(function(Crawler $node, $i) use (&$ayah_num){
			$class = $node->extract(array('class'))[0];
			
			//var_dump($class);
			
			if ($class == 'ww') {
				$english = mysql_real_escape_string($node->filter('span.e')->text());
				$word = mysql_real_escape_string($node->filter('span.a')->text());
				
				var_dump($english);
				var_dump($word);
				
				var_dump('ayah #' . $ayah_num);

				

				

				//insert words for current surah
				global $surah;
				global $surahName;
				global $surahNameEN;

				$sql = "INSERT INTO words VALUES (NULL, '$word', '$english', '$surah', '$surahName', '$surahNameEN', '$ayah_num', NULL, NOW() )";
				//var_dump($sql);
				if(!db_query($sql)){
					print '<p style="color: red;">Error updating word ('.$english.')</p>';
				}
			}
			elseif ($class == 'n') {
				$ayah_num++;
			}



		});
		
		/* foreach ($tables as $table) {
			var_dump($table->childNodes);
			print $table->nodeName;
		} */
		
		break;
	case 'generate_images':
		//print "generating images for $filename..";
		$surah = str_replace('.txt', '', $filename);

		//testing: get first word of the surah
		$sql = "SELECT * FROM words WHERE surah = '$surah' LIMIT 1";

		$words = db_select($sql);

		$word = $words[0];

		//var_dump($word);

		header("Content-type: image/jpeg");
		error_reporting(0);
		require_once __DIR__.'/libs/I18N/Arabic.php';
		require_once __DIR__.'/libs/word2uni/word2uni.php';

		$ar = new I18N_Arabic('Glyphs');

	    $imgPath = __DIR__.'/templates/stc.jpg';
	    $image = imagecreatefromjpeg($imgPath);
	    $color = imagecolorallocate($image, 0, 0, 0);
	    $string = $word['word'];
	    $fontSize = 50;
	    $x = 115;
	    $y = 300;
	    //imagettftext ( resource $im, int $size, int $angle, int $x, int $y, int $color, string $fontfile, string $text ) 
	    imagettftext ( $image, $fontSize, 0, $x, $y, $color, __DIR__.'/templates/fonts/tradbdo.ttf', word2uni($string) );
	    //imagestring($image, $fontSize, $x, $y, $string, $color);
	    imagejpeg($image);


		exit;
		break;
}

function set_filehtml($filename) {
	global $datadir;
	global $filehtml;
	
	$filepath = $datadir . "/$filename";
	$filehtml = file_get_contents($filepath);
	
	
}

function revUni($text) { 
    
    $wordsArray = explode(" ", $text); 

    $rtlCompleteText=''; 
    for ($i = sizeOf($wordsArray); $i > -1; $i = $i-1) { 

        //$lettersArray = explode("|", str_replace(";|", ";", $wordsArray[$i])); 
        $lettersArray = explode(";", $wordsArray[$i]); 
        
        $rtlWord=''; 
        for ($k = sizeOf($lettersArray); $k > -1; $k = $k-1) { 
            if (strlen($lettersArray[$k]) > 1) { // make sure its full unicode letter 
                $rtlWord = $rtlWord."".$lettersArray[$k].";"; 
            } 
        } 
        
        $rtlCompleteText = $rtlCompleteText." ".$rtlWord; 
        
    } 
    
    return $rtlCompleteText; 
} 

function proper_text($text){
    $text = mb_convert_encoding($text, "HTML-ENTITIES", "UTF-8");
    $text = preg_replace('~^(&([a-zA-Z0-9]);)~',htmlentities('${1}'),$text);
    return($text); 
}

function db_connect() {
	global $db;

	if (!$db) {
		$db = mysql_connect('localhost', 'root', 'pa$$w0rd');
		mysql_select_db('wordofquran');
	}
}

function db_query($sql) {
	global $db;

	db_connect();
	
	//print $sql; return;
	return mysql_query($sql, $db);

}

function db_select($sql) {
	$db_results = db_query($sql);
	$rows = array();


	while ($row = mysql_fetch_assoc($db_results)) {
		$rows[] = $row;	
	}

	return $rows;
}


foreach($datafiles as $datafile) {
		$datafilebase = basename($datafile);
		
	?>
	<p><a href="?action=update_data&filename=<?php echo $datafilebase ?>">Get data for <?php echo $datafilebase ?></a> 
	<a href="?action=generate_images&filename=<?php echo $datafilebase ?>">Generate images for <?php echo $datafilebase ?></a> </p>
	<?php 
}