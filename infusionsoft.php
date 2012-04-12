<html><body>
<?php
error_reporting(-1);
//generate infusion soft api classes
//generate
//include 'inc/site.php';
define('_SITE_ROOT',$_SERVER['DOCUMENT_ROOT'].'/');


$base = 'http://help.infusionsoft.com';
$services_page = $base.'/developers/services-methods';

/*
writeMessage('Downloading '.$services_page);
$page = file_get_contents($services_page);


//<li class="collapsed menu-mlid-659"><a href="/developers/services-methods/contacts" title="">ContactService</a></li>
//preg_match('/\<li class="collapsed[^"]"\>\<a href="([^"]+)" title=""\>([^\<]+)\<\/a\>\<\/li\>/i',$page,$matches);
preg_match_all('#<li[^>]+class="collapsed[^>]+><a[^>]+href="([^"]+)"[^>]*>([^>]+)</a></li>#i',$page,$matches);

$services = associateMatches($matches,array('SDK Methods','Table Documentation'));
$services_r = array();
//print '<pre>';
//print_r ($services);
//print '</pre>';

foreach($services as $name=>$url){
	//if ($name!='WebFormService') continue;
	$services_r[$name]['name'] = $name;
	$fname = substr($name,0,-7);
	if (strpos($fname, 'API')===0){
		$fname = substr($fname,3);
	}
	$services_r[$name]['fname'] = $fname;
	$services_r[$name]['iname'] = $name;
	$url = $base.$url;
	writeMessage('Downloading '.$url);
	$page = file_get_contents($url);
	
	preg_match_all('#<li[^>]+class="leaf[^>]+><a[^>]+href="([^"]+)"[^>]*>([^>]+)</a></li>#i',$page,$matches);
	$methods = associateMatches($matches,array('API Basics','Usage Guidelines','Developer Forum'));
	$methods_r = array();
	//print '<pre>';
	//print_r($methods);
	//print '</pre>';
	
	foreach($methods as $methodName=>$url2){
		//if ($methodName!='getMap') continue;
		writeMessage('Downloading '.$base.$url2);
		$page = file_get_contents($base.$url2);
		$page = str_replace('<br />','', $page);
		$page = str_replace('<br/>','', $page);
		$page = str_replace('&nbsp;',' ', $page);
		$page = str_replace('<strong>','', $page);
		$page = str_replace('</strong>','', $page);		
		$page = str_replace('<p>','', $page);
		$page = str_replace('</p>','', $page);
		
		$methods_r[$methodName]['name'] = $methodName;
		$methods_r[$methodName]['iname'] = $methodName;
		
		
		
		if (!preg_match_all('#<pre class="parameters">([^<]*)</pre>#i',$page,$matches)){
			if (!preg_match_all('#<pre class="parameters"><p>([^<]*)</p>[^<]*</pre>#i',$page,$matches)){
//				preg_match_all('#<pre class="parameters">([^<]*)</pre>#i',$page,$matches)
			}
		}
		//print_r($matches);
		$code = $matches[1][0];
		if (!preg_match_all('#([0-9a-z]+) ([0-9a-z]+)\s*\(([^\)]+)\)#i',$code,$matches2)){
			if (!preg_match_all('#([0-9a-z]+) ([0-9a-z]+)\s*\(([^\)]+)\}#i',$code,$matches2)){
				if (!preg_match_all('#([0-9a-z]+)\s*\(([^\)]+)\)#i',$code,$matches2)){ //no type in definion
					if (!preg_match_all('#([0-9a-z]+)\s*\{([^\)]+)\}#i',$code,$matches2)){ // same as above but with {}
						//no type in definion
						writeErrorMessage('code not found!');
						//print $code;
						
					}
				}
			}
		}
		//print_r($matches2);
		if (!isset($matches2[1][0])){
			writeErrorMessage('no arguments found for '.$name.'::'.$methodName);
		}
		if (count($matches2[1])>1){
			writeWarningMessage('warning '.$name.'::'.$methodName.' has options');
		}
		
		foreach($matches2[1] as $key=>$vv){
			$arguments_r = array();
			if (isset($matches2[3][$key])){
				$result = $matches2[1][$key];
				$methodName2 = $matches2[2][$key];
				$arguments = $matches2[3][$key];
			}
			else { //type not defined
				$result = '';
				$methodName2 = $matches2[1][$key];
				$arguments = $matches2[2][$key];
			}
		
			$arguments_arr = explode(',',$arguments);
			foreach($arguments_arr as $arg){			
				$arg = str_replace("\t"," ",$arg);
				$arg = preg_replace("/\s+/"," ",$arg);
				$arg = str_replace("[optional ","[",$arg);
				$arg = trim($arg);
				if (empty($arg)) continue;
				list($type,$argumentname) = explode(' ',$arg);
				//print $type.':'.$argumentname.'<br />';
				$arguments_r[] = array('type'=>$type,'name'=>$argumentname);
			}
			if ($key==0){
				$methods_r[$methodName]['arguments'] = $arguments_r;
			}
			else {
				$methods_r[$methodName.'_'.($key+1)]['name'] = $methodName.'_'.($key+1); 
				$methods_r[$methodName.'_'.($key+1)]['iname'] = $methodName;				
				$methods_r[$methodName.'_'.($key+1)]['arguments'] = $arguments_r;
			}
		}
		//break;
	}
	$services_r[$name]['methods'] = $methods_r;
}

writeServices($services_r);
*/

makeDbFiles();


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
	print $msg.'<br />';
	flush();
}

function writeErrorMessage($msg){
	print '<b style="color:red;">'.$msg.'</b><br />';
	flush();
}

function writeWarningMessage($msg){
	print '<b style="color:green;">'.$msg.'</b><br />';
	flush();
}

	
function writeServices($services){
	writeMessage('write files');
	$folder = _SITE_ROOT.'inc/class/isoft/service/';
	foreach($services as $service){
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/servise
		
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/service/APIAffiliate.class.ph		
		$fname = $folder.$service['fname'].'.class.php';
		writeMessage($fname);
ob_start();
print '<?'."\n";
?>
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * <?= $service['name'] ?>
 
 */
class isoft_service_<?= $service['fname'] ?> extends isoft_Service {
<?
foreach($service['methods'] as $method){
	$arguments = $method['arguments'];
	array_shift($arguments);
	$names = array();
	foreach($arguments as $a){
		$names[] = '$'.$a['name'];
	}
?>
	/**
	 * <?=$method['name'] ?>
	 
	 */
	function <?=$method['name'] ?>(<?= implode(', ',$names) ?>){
	    return $this->owner->call('<?= $service['name'] ?>.<?= $method['iname'] ?>'<?= count($names)?', '.implode(', ',$names):'' ?>);
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
		$table = array('name' => $name,'fields' => array());
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
	$folder = _SITE_ROOT.'inc/class/isoft/db/';
	
	foreach($services as $service){
		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/servise

		//odesk/cleverinvestor/svn/vipmastermindevent/html/inc/class/isoft/service/APIAffiliate.class.ph
		$fname = $folder.$service['name'].'.class.php';
		writeMessage($fname);
		ob_start();
		print '<?'."\n";
		?>
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * <?= $service['name'] ?>
 
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
	$str = str_replace('.','',$str);
	$len = strlen($str);
	$res = '';
	$first = true;
	
	$exceptions = array(
		'IPAddress'=>'IP_ADDRESS'
	);
	$prev_was_small = true; //first character suppse is alwaus small
	if (isset($exceptions[$str])) return $exceptions[$str]; 
	
	
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
