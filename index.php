<?php
require __DIR__.'/functions.php';
?>

<html>
    <head>
        <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Duel Of Wizzards</title>

           <!-- Bootstrap -->
           <link href="css/bootstrap.min.css" rel="stylesheet">
           <link href="css/style.css" rel="stylesheet">
           <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Duel of Wizards</h1>
            </div>
            <div class="battle-box center-block border">
                <div>
                    <form method="POST" action="/battle.php">
                        <h2 class="text-center">The Duel</h2>
                        <!-- First wizard -->
                        <select class="center-block form-control btn drp-dwn-width btn-default dropdown-toggle" name="wizard1_id">
                            <option value="">Choose a wizard</option>
                            <?php foreach ($wizards as $wizard): ?>
                                <option value="<?php echo $wizard->getId(); ?>"><?php echo $wizard->getNameAndSpecs(true); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <p class="text-center">AGAINST</p>
                        <br>
                        <!-- Second wizard -->
                        <select class="center-block form-control btn drp-dwn-width btn-default dropdown-toggle" name="wizard2_id">
                            <option value="">Choose a wizard</option>
                            <?php foreach ($wizards as $wizard): ?>
                                <option value="<?php echo $wizard->getId(); ?>"><?php echo $wizard->getNameAndSpecs(true); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <button class="btn btn-md btn-danger center-block" type="submit">Engage</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
