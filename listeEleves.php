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
require_once 'inc/manager-db.php';
//print_r($_POST);
$listeEleve = '';
$eleves = affichEleve($listeEleve);

if (isset($_POST['update'])) {
    getUpdateUtil($_POST);
}
if (isset($_GET['cont']))
    $continent = $_GET['cont'];
else {
    $continent = "Asia";
}

$desPays = getCountriesByContinent($continent);
?>

<div class="container">
    <h1>
        <?php echo $_SESSION['login'] ?> voici la liste des utilisateurs
    </h1>
    <div>
        <table class="table table-bordered table-dark">
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Role</th>
                <?php if ($_SESSION['role'] == 'Admin'): ?>
                    <th>Update</th>
                    <th>Delete</th>
                <?php endif; ?>
            </tr>
    </div>
    <?php foreach ($eleves as $elv): ?>
        <tr>
            <td>
                <?php echo $elv->id ?>
            </td>
            <td>
                <?php echo $elv->login ?>
            </td>
            <td>
                <?php echo $elv->role ?>
            </td>
            <?php if ($_SESSION['role'] == 'Admin'): ?>
                <td><a href="UpdateUtil.php?id=<?php echo $elv->id ?> "><input type='submit' class='btn btn-primary'
                            value='Modifier Utilisateur'></a></td>
                <td><a href="deleteUtil.php?delete=<?php echo $elv->id ?>"
                        onClick="return(confirm('Etes-vous sûr de vouloir supprimer <?php echo $elv->login ?> ?'));"><input
                            type='submit' class='btn btn-danger' value='Supprimer'></a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </table>
    <div style="text-align:center;">
        <?php if (($_SESSION['role'] == 'Admin') || ($_SESSION['role'] == 'Enseignant')): ?>
            <a href="ajoutUtil.php"><input type='submit' class='btn btn-primary' value='Ajouter élève'></a>
        <?php endif; ?>
    </div>
</div>
<?php
require_once 'javascripts.php';
?>