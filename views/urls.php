<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/13/17
 * Time: 11:04 PM
 */

require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\SiteController;

$sites = SiteController::all();

?>

<section id="urls">
    <?php foreach ($sites as $site):?>
    <div class="panel panel-success">
        <h3 class="panel-heading"><?php echo $sites['url']?></h3>
        <div class="panel-body">
            <?php echo $site['description'] ?>
        </div>
    </div>
    <?php endforeach;?>
</section>
