<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 31/01/15
 * Time: 22:05
 */

namespace OC\PlatformBundle\Antispam;


class OCAntispam extends \Twig_Extension {
	private $mailer;
	private $locale;
	private $minLength;

	public function __construct(\Swift_Mailer $mailer, $minLength) {
		$this->mailer    = $mailer;
		$this->minLength = (int)$minLength;
	}

	public function setLocale($locale) {
		$this->locale = $locale;
	}

	/**
	 * Vérifie si le texte est un spam ou non
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isSpam($text) {
		return strlen($text) < $this->minLength;
	}

	public function getFunctions() {
		return array(
			'checkIfSpam' => new \Twig_Function_Method($this, 'isSpam')
		);
	}

	// La méthode getName() identifie votre extension Twig, elle est obligatoire
	public function getName() {
		return 'OCAntispam';
	}
}