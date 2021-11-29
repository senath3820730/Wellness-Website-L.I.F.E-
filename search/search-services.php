<?php
    require_once('../includes/functions.php');

    $serviceSearch = trim(isset($_GET['service']) ? $_GET['service'] : '');

    $services = getSearchServices($serviceSearch);
?>


<?php if(count($services) === 0) { ?>
    <p class="alert alert-info">No service matches the search <strong>'<?php echo $serviceSearch; ?>'</strong>.</p>
<?php } else { ?>
    <div class="row">
        <?php foreach($services as $service) { ?> <!-- Displays the icon of the service depending on the search -->
            <div class="col-md-6 col-lg-4 col-xl-3 mt-1">
                <button type='submit' value = '<?php $service['name'] ?>'><img height = "200" width = "170" src="../<?php echo $service['image_path'] ?>"></button>
            </div>
        <?php } ?>
    </div>
<?php } ?>
