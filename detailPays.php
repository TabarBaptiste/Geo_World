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
<?php
require_once 'header.php';
require_once 'inc\manager-db.php';

//Condition details
if (isset($_GET['cont'])) {
    $continent = $_GET['cont'];
} else {
    $continent = 'Asia';
}

if (isset($_GET['id']) & !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "Nous n'avons pas réussi a trouver l'id du Pays";
}
$details = getCountries($id);
?>

<div class="container">
    <h1>Détails du Pays</h1>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Continent</th>
                    <th>Region</th>
                    <th>SurfacceArea</th>
                    <th>IndepYear</th>
                    <th>Population</th>
                    <th>LifeExpectancy</th>
                    <th>GNP</th>
                    <th>GNPOld</th>
                    <th>LocalName</th>
                    <th>Président</th>
                </tr>
            </thead>
            <?php foreach ($details as $pays): ?>
                <tr>
                    <td>
                        <?php echo $pays->id ?>
                    </td>
                    <td>
                        <?php echo $pays->Code ?>
                    </td>
                    <td>
                        <?php echo $pays->Name ?>
                    </td>
                    <td>
                        <?php echo $pays->Continent ?>
                    </td>
                    <td>
                        <?php echo $pays->Region ?>
                    </td>
                    <td>
                        <?php echo $pays->SurfaceArea ?>
                    </td>
                    <td>
                        <?php echo $pays->IndepYear ?>
                    </td>
                    <td>
                        <?php echo $pays->Population ?>
                    </td>
                    <td>
                        <?php echo $pays->LifeExpectancy ?>
                    </td>
                    <td>
                        <?php echo $pays->GNP ?>
                    </td>
                    <td>
                        <?php echo $pays->GNPOld ?>
                    </td>
                    <td>
                        <?php echo $pays->LocalName ?>
                    </td>
                    <td>
                        <?php echo $pays->HeadOfState ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </table>
</div>