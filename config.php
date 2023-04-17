<?php if(!defined('PLX_ROOT')) exit; ?>

<?php
    plxToken::validateFormToken($_POST);
    if(!empty($_POST)) {
        $plxPlugin->setParam('excludeSitemap', $_POST['excludeSitemap'], 'string');
        $plxPlugin->setParam('excludeStatSitemap', $_POST['excludeStatSitemap'], 'string');
        $plxPlugin->saveParams();
        header('Location: parametres_plugin.php?p=excludeSitemap');
        exit;
    }
?>
<div>
    <p>Indiquer la liste des numéros de catégories et pages statiques à exclure du sitemap.</p>
    <p>vous devez saisir les identifiants des catégories et pages statiques que vous souhaitez exclure séparé par un <b style="color:blue">|</b> .<br>
        
    Par exemple : 001|003</p>
    <p>Lorsqu'un article est présent dans une de ces catégories alors il n'apparaitra pas dans le sitemap. Si il est présent dans plusieurs catégories et que l'une d'elle n'est pas masqué alors l'article sera visible dans le sitemap.</p>
</div>

<form class="inline-form" action="parametres_plugin.php?p=excludeSitemap" method="post" id="excludeSitemap">
    <fieldset><legend><?php $plxPlugin->lang('L_EXCLUDE_SITEMAP'); ?></legend>
        <style>
            fieldset .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(30vw,1fr));
            gap:1em;
            }
            fieldset .grid label {
            display:block;
            }
            fieldset .grid [id^='id_exclude'] {
            width: 100%;
            min-width:250px;
            }
            fieldset .grid details {
            margin-top: 2.4em;
            }
            fieldset .grid details summary{
            border:solid 1px;
            border-radius:3px;
            padding:0.25em;
            width:max-content;
            background:lightgray;
            box-shadow: 2px 2px 3px;
            }
            fieldset .grid details summary:before {
            content:'> Voir: ';
            color:#999
            }
            fieldset .grid details ul {
            position:relative;
            background:ivory;
            }
        </style>
        <div class="grid">
            <p>
                <label for="excludeSitemap">
                    <span><?php $plxPlugin->lang('L_EXCLUDE_SITEMAP_CATEGORY'); ?></span>
                    <?php plxUtils::printInput('excludeSitemap',$plxPlugin->getParam('excludeSitemap'),'text','') ?>
                </label>
            </p>
            <details><summary><?php $plxPlugin->lang('L_LIST_CATEGORY'); ?></summary>
                <ul>
                    <?php
                        foreach($plxAdmin->aCats as $Cat_num => $Cat_info) {
                            if($Cat_info['active']==1) {
                                echo '<li>N°<b>'.$Cat_num.'</b> - '. $Cat_info['name'].'</li>'.PHP_EOL;    
                            }
                        }
                    ?>
                </ul>
            </details>
            <p>
                <label for="excludeStatSitemap">
                    <span><?php $plxPlugin->lang('L_EXCLUDE_SITEMAP_STATIC'); ?></span>
                    <?php plxUtils::printInput('excludeStatSitemap',$plxPlugin->getParam('excludeStatSitemap'),'text','') ?>
                </label>
            </p>
            <details><summary><?php $plxPlugin->lang('L_LIST_STATIC'); ?></summary>
                <ul>
                    <?php
                        foreach($plxAdmin->aStats as $stat_num => $stat_info) {
                            if($stat_info['active']==1) {
                                echo '<li>N°<b>'.$stat_num.'</b> - '. $stat_info['name'].'</li>';                                
                            }
                        }
                    ?>
                </ul>
            </details>
        </div>
        <p class="in-action-bar">
            <?php echo plxToken::getTokenPostMethod() ?>
            <input type="submit" name="submit" value="Enregistrer" />
        </p>
        <fieldset>
        </form>
        