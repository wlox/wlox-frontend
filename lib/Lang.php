<?php
class Lang {
	public static function string($key=false) {
		global $CFG;
		
		if (empty($key))
			return false;
			
		if (!empty($CFG->lang_table[$key][$CFG->language]))
			return $CFG->lang_table[$key][$CFG->language];
		else
			return false;
	}
	
	public static function url($url=false,$get_alts=false,$get_js=false) {
		global $CFG;
		
		$urls['index.php']['en'] = 'index.php';
		$urls['index.php']['es'] = 'es/index.php';
		$urls['order-book.php']['en'] = 'order-book.php';
		$urls['order-book.php']['es'] = 'es/libreta-de-ordenes.php';
		$urls['contact.php']['en'] = 'contact.php';
		$urls['contact.php']['es'] = 'es/contacto.php';
		$urls['register.php']['en'] = 'register.php';
		$urls['register.php']['es'] = 'es/registro.php';
		$urls['our-security.php']['en'] = 'our-security.php';
		$urls['our-security.php']['es'] = 'es/nuestra-seguridad.php';
		$urls['how-to-register.php']['en'] = 'how-to-register.php';
		$urls['how-to-register.php']['es'] = 'es/como-registrarse.php';
		$urls['fee-schedule.php']['en'] = 'fee-schedule.php';
		$urls['fee-schedule.php']['es'] = 'es/tarifas-y-comisiones.php';
		$urls['about.php']['en'] = 'about.php';
		$urls['about.php']['es'] = 'es/nosotros.php';
		$urls['what-are-bitcoins.php']['en'] = 'what-are-bitcoins.php';
		$urls['what-are-bitcoins.php']['es'] = 'es/que-son-los-bitcoins.php';
		$urls['how-bitcoin-works.php']['en'] = 'how-bitcoin-works.php';
		$urls['how-bitcoin-works.php']['es'] = 'es/como-funciona-bitcoin.php';
		$urls['reset_2fa.php']['en'] = 'reset_2fa.php';
		$urls['reset_2fa.php']['es'] = 'es/reiniciar_2fa.php';
		$urls['news.php']['en'] = 'news.php';
		$urls['news.php']['es'] = 'es/noticias.php';
		$urls['terms.php']['en'] = 'terms.php';
		$urls['terms.php']['es'] = 'es/terminos.php';
		
		if (!$get_alts && !$get_js)
			return $urls[$url][$CFG->language];
		elseif ($get_alts) {
			$HTML = '';
			
			if (array_key_exists($url,$urls)) {
				foreach ($urls[$url] as $lang1 => $url1) {
					if ($lang1 == $CFG->language)
						continue;
					
					$HTML .= '<link rel="alternate" href="'.$CFG->baseurl.$url1.'" hreflang="'.$lang1.'" />';
				}
			}
			return $HTML;
		}
		elseif ($get_js) {
			$HTML = '';
			foreach ($urls as $url1 => $arr) {
				foreach ($arr as $lang2 => $url2) {
					$HTML .= '<input type="hidden" id="url_'.str_replace('.','_',$url1).'_'.$lang2.'" value="'.$url2.'" />';
				}
			}
			return $HTML;
		}
	}
}
?>