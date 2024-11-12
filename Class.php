<?php

if( PHP_OS_FAMILY == "Linux" ){
	define("n","\n");define("d","\033[0m");define("m","\033[1;31m");define("h","\033[1;32m");define("k","\033[1;33m");define("b","\033[1;34m");define("u","\033[1;35m");define("c","\033[1;36m");define("p","\033[1;37m");define("mp","\033[101m\033[1;37m");define("hp","\033[102m\033[1;30m");define("kp","\033[103m\033[1;37m");define("bp","\033[104m\033[1;37m");define("up","\033[105m\033[1;37m");define("cp","\033[106m\033[1;37m");define("pm","\033[107m\033[1;31m");define("ph","\033[107m\033[1;32m");define("pk","\033[107m\033[1;33m");define("pb","\033[107m\033[1;34m");define("pu","\033[107m\033[1;35m");define("pc","\033[107m\033[1;36m");
}else{
	define("n","\n");define("d","\033[0m");define("m","");define("h","");define("k","");define("b","");define("u","");define("c","");define("p","");define("mp","");define("hp","");define("kp","");define("bp","");define("up","");define("cp","");define("pm","");define("ph","");define("pk","");define("pb","");define("pu","");define("pc","");
}

Class Requests {
	static function Curl($url, $head=0, $post=0, $data_post=0, $cookie=0, $proxy=0, $skip=0){while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($cookie){curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie);curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie);}if($post) {curl_setopt($ch, CURLOPT_POST, true);}if($data_post) {curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);}if($head) {curl_setopt($ch, CURLOPT_HTTPHEADER, $head);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);if($skip){return;}$c = curl_getinfo($ch);if(!$c) return "Curl Error : ".curl_error($ch); else{$head = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$body){print "Check your Connection!";sleep(2);print "\r                         \r";continue;}return array($head,$body);}}}
	static function get($url, $head =0){return self::curl($url,$head);}
	static function post($url, $head=0, $data_post=0){return self::curl($url,$head, 1, $data_post);}
	static function getXskip($url, $head =0){return self::curl($url,$head,'','','','',1);}
	static function postXskip($url, $head=0, $data_post=0){return self::curl($url,$head, 1, $data_post,'','',1);}
	static function getXcookie($url, $head=0){return self::curl($url,$head,'','',1);}
	static function postXcookie($url, $head=0, $data_post=0){return self::curl($url,$head,1,$data_post,1);}
	static function getXproxy($url, $head=0, $proxy){return self::curl($url,$head,'','',1,$proxy);}
	static function postXproxy($url, $head=0, $data_post, $proxy){return self::curl($url,$head,1,$data_post,1,$proxy);}
}

class Display {
	static function Clear(){if( PHP_OS_FAMILY == "Linux" ){system('clear');}else{pclose(popen('cls','w'));}} 
	static function Menu($no, $title){print h."---[".p."$no".h."] ".k."$title\n";}
	static function Error($except){return m."---[".p."!".m."] ".p.$except;}
	static function Sukses($msg){return h."---[".p."✓".h."] ".p.$msg.n;}
	static function Cetak($label, $msg = "[No Content]"){$len = 9;$lenstr = $len-strlen($label);print h."[".p.$label.h.str_repeat(" ",$lenstr)."]─> ".p.$msg.n;}
	static function Isi($msg){return m."╭[".p."Input ".$msg.m."]".n.m."╰> ".h;}
	static function Title($activitas){print bp.str_pad(strtoupper($activitas),44, " ", STR_PAD_BOTH).d.n;}
	static function Line(){return c.str_repeat('─',44).n;}
	static function Ban($title, $versi){self::Clear();print "Script by iewil\n";print strtoupper($title." [".$versi."]").n;print self::Line();}
}

class Functions {
	static $configFile = "config.json";
	static function Tmr($tmr){date_default_timezone_set("UTC");$sym = [' ─ ',' / ',' │ ',' \ ',];$timr = time()+$tmr;$a = 0;while(true){$a +=1;$res=$timr-time();if($res < 1) {break;}print $sym[$a % 4].p.date('H',$res).":".p.date('i',$res).":".p.date('s',$res)."\r";usleep(100000);}print "\r           \r";}
	static function Server($title){$url = "https://iewilbot.my.id/List/server.php";$param = "title=".$title;$r = file_get_contents($url."?".$param);return json_decode($r,1);}
	static function setConfig($key){if(!file_exists(self::$configFile)){$config = [];}else{$config = json_decode(file_get_contents(self::$configFile),1);}if(isset($config[$key])){return $config[$key];}else{$data = readline(Display::isi($key));print n;$config[$key] = $data;file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));return $data;}}
	static function removeConfig($key){$config = json_decode(file_get_contents(self::$configFile),1);unset($config[$key]);file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}
	static function view($youtube){$tanggal = date("dmy");$config = json_decode(file_get_contents(self::$configFile),1);$view = $config['view'];if($tanggal == $view){return 0;}else{$config['view'] = $tanggal;if( PHP_OS_FAMILY == "Linux" ){system("termux-open-url ".$youtube);}else{system("start ".$youtube);}file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}}
	static function HiddenConfig($key, $data){if(!file_exists(self::$configFile)){$config = [];}else{$config = json_decode(file_get_contents(self::$configFile),1);}if(!$config[$key]){$config[$key] = $data;file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}return $config[$key];}
	static function temporary($newdata,$data=0){if(!$data){$data = [];}return array_merge($data,$newdata);}
	static function cfDecodeEmail($encodedString){$k = hexdec(substr($encodedString,0,2));for($i=2,$email='';$i<strlen($encodedString)-1;$i+=2){$email.=chr(hexdec(substr($encodedString,$i,2))^$k);}return $email;}
}

class HtmlScrap {
	function __construct(){
		$this->captcha = '/class=["\']([^"\']+)["\'][^>]*data-sitekey=["\']([^"\']+)["\'][^>]*>/i';
		$this->input = '/<input[^>]*name=["\'](.*?)["\'][^>]*value=["\'](.*?)["\'][^>]*>/i';
		$this->limit = '/(\d{1,})\/(\d{1,})/';
	}
	private function scrap($pattern, $html){preg_match_all($pattern, $html, $matches);return $matches;}
	private function getCaptcha($html){$scrap = $this->scrap($this->captcha, $html);for($i = 0; $i < count($scrap[1]); $i++){$data[$scrap[1][$i]] = $scrap[2][$i];}return $data;}
	private function getInput($html){$form = explode('<form', $html)[1];$scrap = $this->scrap($this->input, $form);for($i = 0; $i < count($scrap[1]); $i++){$data[$scrap[1][$i]] = $scrap[2][$i];}return $data;}
	public function Result($html)
	{
		$data['cloundflare']=(preg_match('/Just a moment.../',$html))? true:false;
		$data['firewall'] =(preg_match('/Firewall/',$html))? true:false;
		$data['locked'] = (preg_match('/Locked/',$html))? true:false;
		$data["captcha"] = $this->getCaptcha($html);
		$data["input"] = $this->getInput($html);
		$data["faucet"] = $this->scrap($this->limit, $html);
		return $data;
	}
}

?>