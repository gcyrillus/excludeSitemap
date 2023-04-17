excludeSitemap
====
Plugin pour [PluXml](https://pluxml.org) permettant de ne pas lister des catégories et les articles de ces catégories dans le fichier [sitemap.php](https://www.sitemaps.org/fr/).

fork . Permet aussi de filtrer les pages statiques

Limitation
====
Testé sur PluXml 5.8.9  / php 8.1.5

Configuration
====
Le choix des catégories à ne pas afficher ce fait dans la configuration du plugin. Dans le champ "Exclure du sitemap (référencement)" vous devez saisir les identifiants des catégories que vous souhaitez exclure séparé par un | .

Par exemple :
    011|025

Changelog
====
* 1.1- 17/04/2023
  * fork - ajout filtrage des pages statiques
  
* 1.0 - 27/04/2021
  * Version initial

Remerciement
====
Merci à [bazooka07](https://kazimentou.fr) pour son aide.
