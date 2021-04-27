<?php

class excludeSitemap extends plxPlugin {

  const BEGIN_CODE = '<?php /* ' . __CLASS__ . 'plugin */' . PHP_EOL;
  const END_CODE = PHP_EOL . '?>';

  public function __construct($default_lang) {

		# Appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# Autorisation d'acces à la configuration du plugins
		$this-> setConfigProfil(PROFIL_ADMIN);

    $this->addHook('SitemapBegin', 'SitemapBegin');
  }

  /* Méthode qui filtre les catégories et les articles
   * Merci bazooka07 pour l'aide
   */
  public function SitemapBegin() {
    global $plxMotor;

    $excludeCat = trim($this->getParam('excludeSitemap'));
    echo self::BEGIN_CODE;
    ?>

    if(!empty('<?= $excludeCat ?>')) {
      $cat = array_keys($plxMotor->aCats);
      $exclude = explode('|', '<?= $excludeCat ?>');
      foreach ($cat as $key) {
        $plxMotor->aCats[$key]["active"] = in_array($key, $exclude) ? 0 : 1;
      }
      $activeCats = explode('|', $plxMotor->activeCats);
      $activeCats = array_diff($activeCats, $exclude);
      $plxMotor->activeCats = implode('|', $activeCats);
    }

  <?php
    echo self::END_CODE;
  }
}
?>
