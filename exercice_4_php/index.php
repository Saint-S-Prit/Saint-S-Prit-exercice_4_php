
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="main">

        <?php
            if (isset($erreurs)) {
                echo "<p class='erreurs'>".$erreurs."</p>";
            }
        ?>
        <form action="" method="post">
            <textarea class="textarea1" name="phrases" id="" cols="70" rows="10"></textarea><br>
            <input type="submit" name="submit" value="Envoyer">
        </form>

       

        <?php

            if (isset($_POST['submit']))
            {
                $phrases = strip_tags($_POST['phrases']);

              if (!empty($phrases))
              {
                require_once('fonction.php');

                
                $correction = (correcteur_espace($phrases));
                $phrases = recuperateur_phrases($correction);

                $phrases = $phrases[0];
                $tab = [];

                foreach ($phrases as $key => $val)
                {
                    $nbrCar = strlen($val);
                    if ($nbrCar <=200)
                    {
                        $val = ucfirst($val);
                        $tab[] = $val;
                    }
                }
            

                ?>
               
                    <p>
                        <textarea class="textarea2" readonly="readonly" id="" cols="70" rows="10"><?php foreach($tab as $line) {echo $line;}?></textarea>
                    </p>
                <?php
            }
            else
            {
                $erreurs = "Veuillez remplir le champs !";
            }
              
            }
        ?>
    </div>   
</body>
</html>