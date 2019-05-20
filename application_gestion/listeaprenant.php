<!DOCTYPE html>
<html>
    <head>
        <title>liste apprenants</title>
        <meta charget="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap.min.css">
        <style>
         body{
              background-image:url(j.jpg);
              background-repeat:no-repeat;
              text-align:center;}
        #rouge{
            background-color:red;
        }
        h1{
          font-size:60px;
          color:red;
        }
        #t1{
          width:100%;
          margin-top:20px;
        }
    </style>
    </head>
    <body>
      <h1>LISTER LES APPRENANTS D' UNE PROMO</h1>  
    <form class="form-inline" action=listeaprenant.php method="POST">
    <div class="form-group mx-sm-3 mb-2" id="name">
    <label for="inputPassword2" class="sr-only"><strong>nom promo</strong></label>
    <input type="text" class="form-control" id="nom" name="code" placeholder="nom promo">
  </div> 
 
  <button type="submit" class="btn btn-primary mb-2" name="recherche" >lister</button>
</form>
<?php
echo"<center><table border=1 id='t1'>";
echo "<tr>
<td><strong>code promo</strong></td>
<td><strong>code apprenant</strong></td>
<td><strong>nom</strong></td>
<td><strong>prénom</strong></td>
<td><strong>date de naissance</strong></td>
<td><strong>numero telephone</strong></td>
<td><strong>adressen email</strong></td>
<td><strong>statut</strong></td>
</tr>";
$code=$_POST["code"];
  $liste=fopen("apprenants.txt","r");
  while(!feof($liste))
    {
        $ligne=fgets($liste);
    $element=explode(",",$ligne);
       
      if($code==$element[0]) {
    echo "<tr id='t1'>";
    echo "<td>".$element[0]."</td>";
   echo "<td>".$element[1]."</td>";
   echo "<td>".$element[2]."</td>";
   echo "<td>".$element[3]."</td>";
   echo "<td>".$element[4]."</td>";
   echo "<td>".$element[5]."</td>";
   echo "<td>".$element[6]."</td>";
   echo "<td>".$element[7]."</td>";
   
echo "</tr>";
    
    }
  }
    fclose($liste);


?>
</table>
    </body>
</html>