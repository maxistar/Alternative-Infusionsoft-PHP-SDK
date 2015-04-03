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

//makeDbFiles();

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
		$optionalArguments = array();
		$cutOffPage = $dataSection =  substr($page,strpos($page,$vars[0][$key]));

		$dataSection = substr($dataSection,0,strpos($dataSection,'<h3>Sample Request</h3>'));

		$cutOffPage = substr($cutOffPage,0,strpos($cutOffPage,'</table>'));
		$matches1 = preg_match_all("#<tr>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+</tr>#", $cutOffPage, $vars2);
		if (!$matches1){
			writeErrorMessage('no arguments found for '.$functionName.'!');
		}
		foreach($vars2[0] as $key => $v) {
			$pname = trim(str_replace(' ','',$vars2[1][$key]));
			if (strpos($pname,'(optional)')===false) {
				$arguments[] = array(
					'name' => $pname,
					'type' => trim($vars2[2][$key]),
					'comment' => trim($vars2[3][$key]),
				);
			}
			else {
				$optionalArguments[] = array(
					'name' => substr($pname, 0, -10),
					'type' => trim($vars2[2][$key]),
					'comment' => trim($vars2[3][$key]),
				);
			}
		}

		//look for extra optional parameters:
        if (strpos($dataSection,'<h3>Optional Parameters</h3>') !== false) {
			$optionalSection = substr($dataSection, strpos($dataSection, '<h3>Optional Parameters</h3>'));
			$optionalSection = substr($optionalSection, 0, strpos($optionalSection, '</table>'));
			preg_match_all("#<tr>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+<td>([^<]+)</td>\s+</tr>#", $optionalSection, $vars3);
			foreach ($vars3[0] as $key => $v) {
				$pname = trim(str_replace(' ', '', $vars3[1][$key]));
				$optionalArguments[] = array(
					'name' => $pname,
					'type' => trim($vars3[2][$key]),
					'comment' => trim($vars3[3][$key]),
				);
			}
		}

		//look for returns:
		$returnsSection = substr($dataSection, strpos($dataSection, '<h3>Returns</h3>'));
		$returnsSection = substr($returnsSection, 0, strpos($returnsSection, '</p>'));
		$returnsSection = substr($returnsSection, strpos($returnsSection, '<p>')+3);
		$returnsSection = str_replace('Return: ','',$returnsSection);

		//look for description:
		$descriptionSection = substr($dataSection, strpos($dataSection, '<p>')+3);
		$descriptionSection = substr($descriptionSection, 0, strpos($descriptionSection, '</p>'));


		$res[] = array(
			'name' => $functionName,
			'iname' => $functionName,
			'arguments' => $arguments,
			'optionalArguments' => $optionalArguments,
			'returns' => $returnsSection,
			'description' => $descriptionSection);
	}
	return $res;
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
	$folder = _SITE_ROOT.'src/maxistar/infusionsoft/service/';
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

 * <?= $service['fname'] ?>Service
 */
namespace maxistar\infusionsoft\service;
class <?= $service['fname'] ?> extends \maxistar\infusionsoft\Service {
<?
foreach($service['methods'] as $method){
	$arguments = $method['arguments'];
	array_shift($arguments);
	$names = array();
	$args = '';
	$vars = array();
	foreach($arguments as $a){
		$args .= '     * @param '.$a['type'].' '.$a['name'].' '.$a['comment']."\n";
		$names[] = '$'.$a['name'];
		$vars[] = '$'.$a['name'];
	}
	$optionalArgs = '';

	$optionalArguments = $method['optionalArguments'];
	foreach($optionalArguments as $a){
		$args .= '     * @param optional '.$a['type'].' '.$a['name'].' '.$a['comment']."\n";
		$names[] = '$'.$a['name'].' = null';

		$optionalArgs .= '
		if ($' . $a['name'] . ' !== null) {
			$args[] = $' . $a['name'] . ';
		}
		';
	}

?>

    /**
     * <?= $service['fname'] ?>Service.<?= $method['iname'] ?>

	 *
	 * <?= $method['description'] ?>

     *
<?=
$args
?>
	 * @returns <?= $method['returns'] ?>

	 */
	function <?=$method['name'] ?>(<?= implode(', ',$names) ?>){
	    $args = array(<?= implode(', ',$vars) ?>);
<?= $optionalArgs ?>

	    return $this->owner->call('<?= $service['fname'] ?>Service.<?= $method['iname'] ?>', $args);
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

}

function writeTableClasses($services){
	writeMessage('write table classes');
	$folder = _SITE_ROOT.'src/maxistar/infusionsoft/db/';
	
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

 * <?= $service['name'] ?> Table
 */
namespace maxistar\infusionsoft\db;

class <?= $service['name'] ?> {
    /**
     * Table name
     */
	const TABLE_NAME = '<?= $service['name'] ?>';
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
