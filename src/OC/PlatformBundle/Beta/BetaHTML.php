<?php

namespace OC\PlatformBundle\Beta;

use Symfony\Component\HttpFoundation\Response;

class BetaHTML {
	// Méthode pour ajouter le « bêta » à une réponse
	public function displayBeta(Response $response, $remainingDays) {
		$content = $response->getContent();

		$text = ' - Beta J-'.(int)$remainingDays.' !';

		// Code à rajouter
		$html = '<span style="color: red; font-size: 0.5em;">'.$text.'</span>';

		// Insertion du code dans la page, dans le premier <h1>
		$content = preg_replace(
			'#<h1>(.*?)</h1>#iU',
			'<h1>$1'.$html.'</h1>',
			$content,
			1
		);
		// Insertion du code dans la page, dans le <title>
		$content = preg_replace(
			'#<title>(.*?)</title>#iU',
			'<title>$1'.$text.'</title>',
			$content,
			1
		);

		// Modification du contenu dans la réponse
		$response->setContent($content);

		return $response;
	}
}