<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['cont']))
  $continent = $_GET['cont'];
else {
  $continent = "Asia";
}

$desPays = getCountriesByContinent($continent);
?>
<h1> Carte du Monde </h1>
<main role="main" class="flex-shrink-0">
  <div class="row">
    <div class="col-10 mx-auto text-center">
      <img src="images\map.gif" width="1200" height="760" border="0" usemap="#Map">
      <map name="Map">
        <area shape="poly" coords="22,110,98,56,384,12,534,22,494,58,418,100,368,150,278,276,218,316,132,276"
          href="index.php?cont=North America" title="Amérique du Nord">
        <area shape="poly" coords="212,322,220,388,290,580,338,602,400,458,418,384,340,336,300,314,264,300"
          href="index.php?cont=South America" title="Amérique du Sud">
        <area shape="poly"
          coords="532,206,486,260,484,300,516,338,582,342,594,432,626,512,660,508,736,474,762,414,758,308,724,310,684,238,682,226,636,216,588,198"
          href="index.php?cont=Africa" title="Afrique">
        <area shape="poly"
          coords="198,714,130,686,288,664,380,632,410,672,536,656,728,642,782,650,976,638,1046,662,1046,716"
          href="Antarctica" title="Antarctique">
        <area shape="poly" coords="1120,362,1120,404,1080,410,1000,456,992,514,1088,552,1156,568,1194,552,1164,380"
          href="index.php?cont=Oceania" title="Océanie">
        <area shape="poly"
          coords="490,74,524,134,520,170,524,198,552,196,616,192,650,194,654,180,670,154,682,162,698,144,648,102,656,90,648,58,632,22,598,28"
          href="index.php?cont=Europe" title="Europe">
        <area shape="poly"
          coords="654,60,702,24,822,26,1134,76,1092,204,1062,324,1118,366,1116,396,1036,410,970,404,862,326,790,262,772,286,728,302,688,232,686,200,656,202,670,162,694,164,704,144,656,100,666,86"
          href="index.php?cont=Asia" title="Asie"><area shape="rect" coords="500,3,599,17"
          href="http://www.cmap.comersis.com" target="_blank" alt="Free clickable map of the World">
      </map>

    </div>
  </div>


  <?php
  require_once 'javascripts.php';
  require_once 'footer.php';
  ?>