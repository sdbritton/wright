<?php

class WrightAdapterJoomlaFooter
{
	public function render($args)
	{
		$doc = Wright::getInstance();
		$js = $doc->generateJS();

		if ($doc->document->params->get('rebrand', 'no') !== 'yes')
		{
			$anchors = array(	"Joomla Template" => 50, "Joomla Templates" => 100);
			$links = array(     "Joomla Templates" => "joomla-templates",	"Joomla Template" => "joomla-templates" );
			$endlines  = array(	": by JoomlaShack" => 50,	": from JoomlaShack" => 100);
			$host = "http://www.joomlashack.com/";
			$class = 'joomlashack';		

			$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

			$md5 = md5($url);

			$nums = "";
			for ($i=0; $i<strlen($md5); $i++) {
				$j = ord(substr($md5,$i,1));
				
				if ($j == 43 ||
					$j == 43 ||
					$j >= 48 && $j <= 57)
					$nums .= substr($md5,$i,1);
			}

			$first = substr($nums,0,2);
			$second = substr($nums,2,2);
			$third  = substr($nums,4,2);

			if(substr($first,0,1)=='0') { $first = substr($first,1,1); }
			if(substr($second,0,1)=='0') { $second = substr($second,1,1); }
			if(substr($third,0,1)=='0') { $third = substr($third,1,1); }

			$anchor = '';
			$endline = '';
			foreach($anchors as $possibility=>$val) {;
			  if($anchor=='' && $val>$first) {
				$anchor = $possibility;
				$host .= $links[$possibility];
				foreach($endlines as $ends=>$v) {
					if($endline=='' && $v>$third) { $endline = $ends; }
				}
			  }
			}

			return '<a class="joomlashack" href="'.$host.'"><img src="./templates/'.JFactory::getApplication()->getTemplate().'/wright/images/jscright.png" alt ="'.$anchor.$endline.'" /> </a>' . $js;
		}
		else
		{
			return $js;
		}
	}
}
