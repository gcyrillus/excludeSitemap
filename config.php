<?php if(!defined('PLX_ROOT')) exit; ?>

<?php
plxToken::validateFormToken($_POST);
if(!empty($_POST)) {
  $plxPlugin->setParam('excludeSitemap', $_POST['excludeSitemap'], 'string');
  $plxPlugin->saveParams();
  header('Location: parametres_plugin.php?p=excludeSitemap');
  exit;
}
?>
<div>
  <p>Indiquer la liste des numéros de catégories à exclure du sitemap.</p>
  <p>Lorsqu'un article est présent dans une de ces catégories alors il n'apparaitra pas dans le sitemap. Si il est présent dans plusieurs catégories et que l'une d'elle n'est pas masqué alors l'article sera visible dans le sitemap.</p>
</div>

<form class="inline-form" action="parametres_plugin.php?p=excludeSitemap" method="post" id="excludeSitemap">
  <fieldset>
    <p>
    <label for="excludeSitemap">
        <span><?php $plxPlugin->lang('L_EXCLUDE_SITEMAP_CATEGORY'); ?></span>
        <?php plxUtils::printInput('excludeSitemap',$plxPlugin->getParam('excludeSitemap'),'text','100-100') ?>
    </label>
    </p>
    <p class="in-action-bar">
      <?php echo plxToken::getTokenPostMethod() ?>
      <input type="submit" name="submit" value="Enregistrer" />
    </p>
  <fieldset>
</form>
