<?php
error_reporting(-1);
//generate infusion soft api classes
//generate
//include 'inc/site.php';
define('_SITE_ROOT',dirname(__DIR__).'/');

function makeServices(){

	$services_page = 'https://developer.infusionsoft.com/docs';
	writeMessage('Downloading '.$services_page);
	$page = file_get_contents($services_page);

    $start = '<h2>Docs Navigation</h2>';
	$stop = '<!-- /SUB -->';
	$navigation_start = strpos($page,$start);
	$page = substr($page,$navigation_start);
	$page = substr($page,0,strpos($page,$stop));
	preg_match_all('#<a[^>]+href="([^"]+)"[^>]*>([^>]+)</a>#i',$page,$matches);

	$services = associateMatches($matches,array('Introduction','Getting Started With OAuth2','Table Documentation','Usage Guidelines'));
	$services_r = array();

	foreach($services as $name=>$url){
		$services_r[$name]['name'] = str_replace(' ','',$name);
		$fname = substr($name,0,-8);
		$fname = str_replace(' ','',$fname);
		if ($fname == 'Webform') {
			$fname = 'WebForm';
		}
		$services_r[$name]['fname'] = $fname;
		$services_r[$name]['iname'] = $name;
		$services_r[$name]['url'] = $url;
		writeMessage('Downloading '.$url);
		$page = file_get_contents($url);
		$methods_r = parseServiceMethods($page, $fname);
		$services_r[$name]['methods'] = $methods_r;
	}

	writeServices($services_r);

}

makeServices();

makeDbFiles();

function parseServiceMethods($page, $serviceName) {
	$res = array();
	$methodsFound = array();
	writeMessage('parsing '.$serviceName);
	$mathes = preg_match_all('#<span class="collection">'.$serviceName.'Service.</span><span class="method"><a name="[^"]+">([^<]+)#',$page,$vars);
	if (!$mathes) {
		writeErrorMessage('noting found for '.$serviceName);
	}

	foreach($vars[1] as $key => $functionName) {
		if (isset($methodsFound[$functionName])) continue;
		$methodsFound[$functionName] = true;
		$arguments = array();
		$cutOffPage = substr($page,strpos($page,$vars[0][$key]));
		$cutOffPage = substr($cutOffPage,0,strpos($cutOffPage,'</table>'));
		$matches1 = preg_match_all("#<tr>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+</tr>#", $cutOffPage, $vars2);
		if (!$matches1){
			writeErrorMessage('no arguments found for '.$functionName.'!');
		}
		foreach($vars2[0] as $key => $v) {
			$arguments[] = array(
				'name'=>trim(str_replace(' ','',$vars2[1][$key])),
				'type'=>trim($vars2[2][$key]),
				'comment'=>trim($vars2[3][$key]),
			);
		}

		$res[] = array('name' => $functionName,'iname' => $functionName, 'arguments' => $arguments);
	}
	return $res;
//	print_r($vars);
}


//print('<pre>');
//print_r($services_r);

function associateMatches($matches,$exceptions=array()){
	$services = array();
	foreach($matches[0] as $key=>$v){
		if (in_array($matches[2][$key], $exceptions)) continue;
		$services[$matches[2][$key]] = $matches[1][$key];
	}
	return $services;
}

function writeMessage($msg){
	//print $msg.'<br />';
	print ''.$msg."\n";
	flush();
}

function writeErrorMessage($msg){
	//print '<b style="color:red;">'.$msg.'</b><br />';
	print 'Error:'.$msg."\n";
	flush();
}

function writeWarningMessage($msg){
	//print '<b style="color:green;">'.$msg.'</b><br />';
	print 'Warning:'.$msg."\n";
	flush();
}

	
function writeServices($services){
	writeMessage('write files');
	$folder = _SITE_ROOT.'src/infusionsoft/service/';
	foreach($services as $service){
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/servise
		
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/service/APIAffiliate.class.ph		
		$fname = $folder.$service['fname'].'.php';
		writeMessage($fname);
ob_start();
print '<?'."php"."\n";
?>
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from <?= $service['url'] ?>

 * Date: <?=date('r')?>

 * <?= $service['fname'] ?>Service
 
 */
class isoft_service_<?= $service['fname'] ?> extends isoft_Service {
<?
foreach($service['methods'] as $method){
	$arguments = $method['arguments'];
	array_shift($arguments);
	$names = array();
	$args = '';
	foreach($arguments as $a){
		$args .= '     * @param '.$a['type'].' '.$a['name'].' '.$a['comment']."\n";
		$names[] = '$'.$a['name'];
	}
?>

    /**
     * <?=$method['name'] ?>

<?=
$args
?>
	 */
	function <?=$method['name'] ?>(<?= implode(', ',$names) ?>){
	    return $this->owner->call('<?= $service['fname'] ?>Service.<?= $method['iname'] ?>'<?= count($names)?', '.implode(', ',$names):'' ?>);
	}
<?	
}
?>
} 
<?
$content = ob_get_contents();
ob_end_clean();
		file_put_contents($fname, $content);
	}
}

function makeDbFiles(){
	//http://developers.infusionsoft.com/dbDocs/
	$base = 'http://developers.infusionsoft.com';
	$docs_page = $base.'/dbDocs/';
	writeMessage('Downloading '.$docs_page);
	$page = file_get_contents($docs_page);
	
	//<li><a href="Contact.html">Contact</a></li>
	preg_match_all('#<li><a[^>]+href="([^"]+)"[^>]*>([^>]+)</a></li>#i',$page,$matches);
	
	$tables = associateMatches($matches,array());
	$tables_r = array();
	
	foreach($tables as $name => $link){
		$table = array('name' => $name,'fields' => array(),'url' => $link);
		$url = $docs_page.$link;
		writeMessage('Downloading '.$url);
		$page = file_get_contents($url);
		
		preg_match_all('#<tr[^>]*>\s*<td>([^>]*)</td>\s*<td>([^>]*)</td>\s*<td>([^>]*)</td>\s*<td[^>]*>([^>]*)</td>\s*</tr>#i',$page,$matches);
		
		//print_r($matches);
		foreach($matches[0] as $key=>$v){
			$n = $matches[1][$key];
			//$n = str_replace('.','',$n);
			$table['fields'][] = array($n,$matches[2][$key],$matches[3][$key],$matches[4][$key]); 
		}
		//$methods = associateMatches($matches,array('API Basics','Usage Guidelines','Developer Forum'));
		$tables_r[] = $table;
		//break;
	}
	

	writeTableClasses($tables_r);
	//print '<pre>';
	//print_r($tables_r);
	//print '</pre>';
	
}

function writeTableClasses($services){
	writeMessage('write table classes');
	$folder = _SITE_ROOT.'src/infusionsoft/db/';
	
	foreach($services as $service){
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/servise

		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/service/APIAffiliate.class.ph
		$fname = $folder.$service['name'].'.php';
		writeMessage($fname);
		ob_start();
		print '<?'."php"."\n";
		?>
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from <?= $service['url'] ?>

 * Date: <?=date('r')?>

 * <?= $service['name'] ?> Table
 */
class isoft_db_<?= $service['name'] ?> {
<?
foreach($service['fields'] as $field){
?>

	/**
	 * <?=$field[0] ?>
	 
	 */
	const <?=makeupper($field[0]) ?> = '<?=$field[0] ?>';
<?	
}
?>
} 
<?
$content = ob_get_contents();
ob_end_clean();
		file_put_contents($fname, $content);
	}
}

/**
 * transforms camel style into upper case with inderstrokes
 * 
 * @param unknown_type $str
 */
function makeupper($str){
	$exceptions = array(
		'IPAddress'=>'IP_ADDRESS',
		'Contact.Id'=>'CONTACT_ID_'
	);
	if (isset($exceptions[$str])) return $exceptions[$str];

	$str = str_replace('.','',$str);
	$len = strlen($str);
	$res = '';
	$first = true;
	

	$prev_was_small = true; //first character suppse is alwaus small

	
	for($i=0;$i<$len;$i++){
		if ($first){
			$res = $res.strtoupper($str[$i]);
			if (strtolower($str[$i])==$str[$i]){ //small letter or number
			}
			else {
				$prev_was_small = false;
			}
		}
		else {
			if (strtolower($str[$i])==$str[$i]){ //small letter or number
				$res = $res.strtoupper($str[$i]);
				$prev_was_small = true;
			}
			else { //upper
				if ($prev_was_small){
					$res = $res.'_'.strtoupper($str[$i]);
				}
				else {
					$res = $res.strtoupper($str[$i]);
				}
				$prev_was_small = false;
			}
			
		}
		$first = false;
	}
	if ($res=='PUBLIC'){
		$res = 'IS_PUBLIC';
	}
	return $res;
}
