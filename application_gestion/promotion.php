<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gestion promo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">
<style>
        body{
    /*background-color:grey;*/
    
  }
  #rouge{
            background-color:red;
        }
  #nom3{
    width:50%;
  }
  #nom4{
    width:50%;
  }
  #inputEmail3{
    width:50%;
  } 
  #inputPassword3{
    width:50%; 
  }
  #nom0,#nom1,#email,#pass{
    font-size:20px;
    font-family:verdana;
  
  } 
  #form1{
    border:0px solid black;
    width:60%;
    margin-top:50px;
    margin-left:300px;
  }
  #conn{
    margin-left:100px;
    padding:10px;
  }
  h1{
    font-size:60px;
    font-family:verdana;
    color:red;
    text-align:center;
  }
  #tete{
    width:100%;
  }
  #buton{
    width:100%;
  }
  </style>
</head>
<body>
<center><h1>GESTION DES PROMO</h1></center>
<div id="form1">
<form action="promotion.php" method="POST">
<div class="form-group row">
    <label for="inputnom3" id="nom1" class="col-sm-2 col-form-label">code promo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nom3" name="code" placeholder="">
    </div>
  </div>

<div class="form-group row">
    <label for="inputnom3" id="nom1" class="col-sm-2 col-form-label">nom promo</label>
    <div class="col-sm-10">
      <input type="text" value="nom" class="form-control" id="nom3" name="promo" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" id="email" class="col-sm-2 col-form-label">mois</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="mois" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" id="email" class="col-sm-2 col-form-label">annnée</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="année" placeholder="">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" value="modifier" class="btn btn-primary" id="conn" name="modifier">modifier promo</button>
      <button type="submit" class="btn btn-primary" id="conn" name="ajouter">ajout promo</button>
    </div>
  </div>
</form>
</div>

</body>  
<?php


echo "<table id='tete' border=1 width='80%' >";
  echo "<tr class='titre'>
    <th>code promo</th>
      <th>Nom promo</th>
      <th>année</th>
      <th>mois</th>
      <th>nombre</th>
     
      
      
  </tr>";
  if(isset($_POST['modifier'])){
    $code=$_POST['code'];
  $promo=$_POST['promo'];
  $mois=$_POST['mois'];
  $année=$_POST['année'];

  $prod=fopen("promo.txt", 'r' );
    while(!feof($prod)){
      $lines=fgets($prod);
      $fichier=explode(',', $lines);

        if($code==$fichier[0]){
            $fichier[1]=$promo;
            $fichier[2]=$mois;
            $fichier[3]=$année;
           
            $effacer=$fichier[0].",".$fichier[1].",".$fichier[2].",".$fichier[3]."\n";
           
        }else {
            $effacer=$lines;
        }
       $newlines=$newlines.$effacer;
    }

    fclose($prod);
    $prod=fopen("promo.txt", 'w+' );
          
    fwrite($prod,$newlines);
      
    fclose($prod);
    }

    if(isset($_POST['ajouter'])){
$promo=rand(0,1000);
$nom=$_POST["promo"];
$mois=$_POST["mois"];
$annee=$_POST["année"];


$promotion = fopen("promo.txt",'a+');
$open=fgets($promotion);
$ajout=explode(",",$open);
fwrite($promotion, $promo.','.$nom.','.$mois.','.$annee."\n");

    }
    
$liste = fopen("promo.txt",'r');
 while(!feof($liste)){
  $lines=fgets($liste);
  $fichier=explode(',', $lines);

  $promotion = fopen("apprenants.txt",'r');
  
  $nombre=0;

  $aprenant=file("apprenants.txt");
  while(!feof($aprenant)){
    $line=fgets($aprenant);
  $fiche=explode(',', $line);
    for($i=0;$i<count($aprenant);$i++)
    {
    $nom[$i]=strtok($aprenant[$i],",");
    
      if($fichier[1]==$nom[$i]){
        $nombre++;
        
      }
    }break;
    
  }
                  
          echo "<tr>";				
   
            echo "<td>" . $fichier[0] . "</td>";
            echo "<td>" . $fichier[1] . "</td>";
            echo "<td>" . $fichier[2] . "</td>";
            echo "<td>" . $fichier[3]. "</td>";
            echo "<td>" . $nombre. "</td>";
            
          echo "</tr>";
       
   

    }



    fclose($prod);
 

echo "</table>";
?>


</body>
</html>