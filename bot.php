<?php
error_reporting(0);
$zone = json_decode(file_get_contents("http://ip-api.com/json"),1)["timezone"];if($zone){date_default_timezone_set($zone);}
$host="proinfinity.fun";
$a = ["iewil","proinfinity","1.4"];
$reg = "https://bit.ly/3JdzzSp";
$yt = "https://youtu.be/4nCS4nSt4Dg";
$server = "https://pastebin.com/raw/5mri6gAM";
$disable = col("Script mati karena web update / scam!","m")."\nSupport Channel saya dengan cara\nSubscribe ".col("https://www.youtube.com/c/iewil","k")."\nkarena subscribe itu gratis :D\nUntuk mendapatkan info Script terbaru\nJoin grub via telegram ~> ".col("https://t.me/Iewil_G","c")."\nðŸ‡®ðŸ‡© ".col("Family-Team-Function-INDO","b")."\n";Short();bn();
cookie:
Save('Cookie');Save('User_Agent');
system("termux-open-url ".$yt);bn();

menu:
echo col("1 >","m")." AutoFaucet\n";
echo col("2 >","m")." Update Cookie\n";
$pil=readline(col("Input Number ","h").col("> ","m"));
line();
if($pil==1){goto faucet;
}elseif($pil==2){unlink($a[1]."/Cookie");goto cookie;
}else{echo col("Bad Number\n","m")."\n";line();goto menu;}

faucet:
while(true){
	$url = "https://".$host."/session/autofaucet";
	$r=Run($url,head());
	if(preg_match('/Cloudflare/',$r)){
		echo col("cloudflare detect\n","m");
		line();sleep(10);goto menu;
	}
	
    $user = explode('"',explode('t.name="user"),(t.value="',$r)[1])[0];
    $data = "user=".$user;
    $r2 = Run($url,array_merge(head(),["content-length"=>37,"content-type"=>"application/x-www-form-urlencoded"]),$data);
    $err=trim(explode('</div>',explode('<div class="AutoACell AAC-error">',$r2)[1])[0]);
          
	if(preg_match('/FaucetPay/',$r2)){
		$pay=col('Faucetpay.io',"b");
	}elseif(preg_match('/ExpressCrypto/',$r1)){
		$pay=col('ExpressCrypto',"m");
	}elseif(preg_match('/Balance/',$r1)){
		$pay=col('Balance',"p");
	}elseif(preg_match('/Coinbase/',$r1)){
		$pay=col('Coinbase',"b");
	}else{
		$pay=null;
	}
    $token=explode('</div>',explode('<i class="fas fa-coins"></i>',$r)[1])[0];
	preg_match_all('#<div class="AutoACell AAC-success">(.*?)<a#is',$r2,$has);
	if($has[1]){
		if($token){
			echo col(trim($token),"k")."\n";;
		}
		for($i=0;$i<count($has[1]);$i++){
			echo col(trim($has[1][$i]),'h')." ".$pay."\n";
		}
		line();
		tmr(60);
	}
	if($err == 'Insufficient balance to claim rewards.'){echo col($err,"m")."\n";line();goto menu;}
}
function head(){global $host;$user=Save("User_Agent");$cookie=Save("Cookie");$ua=["Host: ".$host,"accept: */*","user-agent: ".$user,"cookie: ".$cookie];return $ua;}
function Run($url, $httpheader = 0, $post = 0, $proxy = 0){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);
	//curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
	if($post){curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}if($httpheader){curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$response = curl_exec($ch);$httpcode = curl_getinfo($ch);if(!$httpcode) return "Curl Error : ".curl_error($ch); else{$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);return array($header, $body)[1];}}
function Short(){global $a,$server,$disable;$d=date("D");if(file_exists($_SERVER["TMPDIR"]."/".$a[1])){$day=trim(file_get_contents($_SERVER["TMPDIR"]."/".$a[1]));}else{file_put_contents($_SERVER["TMPDIR"]."/".$a[1],$d);$day=trim(file_get_contents($_SERVER["TMPDIR"]."/".$a[1]));}if($d==$day){}else{unlink($a[1]."/key.txt");unlink($_SERVER["TMPDIR"]."/".$a[1]);}$script = file_get_contents($server);$status = explode('|',explode('#'.$a[1].':',$script)[1])[0];if($status == "on"){RETRY:$rand = rand(0,14);$short = json_decode(file_get_contents('https://pastebin.com/raw/EiKBhp8U'),1);$link = file_get_contents($short[$rand]['url']);$pass = trim(explode(' ',explode('Password: ',$link)[1])[0]);$read = file_get_contents($a[1]."/key.txt");if(file_exists($a[1]."/key.txt")){}else{bn();echo col(" Link Password : ","h").col($short[$rand]['short'],'k')."\n";$p = readline(col(" Password : ","h"));if($pass == $p){file_put_contents($a[1]."/key.txt",$p);}else{echo col(" Password salah!","m")."\n";line();goto RETRY;}}}elseif($status == "off" or $status == null){bn();echo col("The script is disabled","m")."\n\n";echo Slow($disable);exit;}}	
function Save($namadata){global $a;if(file_exists($a[1]."/".$namadata)){$datauser=file_get_contents($a[1]."/".$namadata);}else{$datauser=readline("Input ".$namadata." > ");echo "\n";file_put_contents($a[1]."/".$namadata,$datauser);}return $datauser;}
function Col($str,$color){if($color=="rand"){$color=['h','k','b','u','m'][array_rand(['h','k','b','u','m'])];}$war=array('rw'=>"\033[107m\033[1;31m",'rt'=>"\033[106m\033[1;31m",'ht'=>"\033[0;30m",'p'=>"\033[1;37m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'rg'=>"\033[102m\033[1;34m",'ry'=>"\033[103m\033[1;30m",'rp1'=>"\033[104m\033[1;37m",'rp2'=>"\033[105m\033[1;37m");return $war[$color].$str."\033[0m";}
function Slow($msg){$slow = str_split($msg);foreach( $slow as $slowmo ){echo $slowmo; usleep(70000);}}
function Line(){$len = 36;$var = '─';echo str_repeat($var,$len)."\n";}
function Bn(){global $a,$reg;system('clear');$m="\033[1;31m";$p="\033[1;37m";$k="\033[1;33m";$h="\033[1;32m";$u="\033[1;35m";$b="\033[1;34m";$c="\033[1;36m";$mp="\033[101m\033[1;37m";$cl="\033[0m";$mm="\033[101m\033[1;31m";$hp="\033[1;7m";$z=trim(strtoupper($a[1]));$x=18;$y=strlen($z);$line=str_repeat('_',$x-$y);echo "\n{$m}[{$p}Script{$m}]->{$k}[".$h.$z."{$k}]-[".$h.$a[2].$k."]".$p.$line.".\n{$u}.__              .__.__ 	    {$p}| \n{$u}|__| ______  _  _|__|  |	\n|  |/ __ \ \/ \/ /  |  |\n|  \  ___/\     /|  |  |__\n|__|\___  >\/\_/ |__|____/\n        \/\n{$mm}[{$mp}▶{$mm}]{$cl} {$k}https://www.youtube.com/c/iewil\n{$c}{$hp} >_{$cl}{$b} Team-Function-INDO\n{$p}────────────────────────────────────\nLink Reg : ".$reg."\n\n";}
function Tmr($tmr){$timr=time()+$tmr;while(true){echo "\r                       \r";$res=$timr-time(); if($res < 1){break;}echo col(date('i:s',$res),"rand");sleep(1);}}
