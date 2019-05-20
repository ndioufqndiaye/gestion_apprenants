<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gestion des apprenants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">
<style>
     #t1 th{
      font-size:30px;
      color:white;
  }
  h1{
    font-size:60px;
    font-family:verdana;
    color:red;
    text-align:center;
      
  }
  #nom3{
    width:50%;
  }
  #inputEmail3{
    width:50%;
  } 
  #inputPassword3{
    width:50%; 
  }
  #nom1,#email,#pass,#adresse{
    font-size:20px;
    font-family:verdana;
  
  } 
  #form1{
    border:0px solid black;
    width:100%;
    margin-top:50px;
    margin-left:200px;
  }
  #conn{
    margin-left:200px;
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
<center><h1>GESTION DES APPRENANTS</h1></center>
<div id="form1">
<form action="etudiant.php" method="POST">
<div class="form-group row">
    <label for="inputEmail3" id="email" class="col-sm-2 col-form-label">code apprenants</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="code" placeholder="">
    </div>
  </div>
<div class="form-group row">
<label for="inputEmail3" id="email" class="col-sm-2 col-form-label">nom promo</label>

<?php
  echo "<select name='select'>";
  echo "<option></option>";
    $promotion = fopen("promo.txt",'r');
    while(!feof($promotion))
    {
    
      $open=fgets($promotion);
    $ajout=explode(",",$open);

    echo "<option >".$ajout[1]."</option>";
  }  
     fclose($promotion);
     echo "</select>";
    ?>
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" id="email" class="col-sm-2 col-form-label">nom apprenants</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="nom" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" id="email" class="col-sm-2 col-form-label">prenom apprenant</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="prenom" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" id="pass" class="col-sm-2 col-form-label">date de naissance</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  id="inputPassword3" name="date" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" id="adresse" class="col-sm-2 col-form-label">numero téléphone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="inputPassword3" name="tel" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" id="adresse" class="col-sm-2 col-form-label">adresse émail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  id="inputPassword3" name="email" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" id="adresse" class="col-sm-2 col-form-label">statut utilisateur</label>
    <div class="col-sm-10">
    <select name="statut">
    <option  value="exclure">exclure</option>
    <option  value="accepter">accepter</option>
    </select>
    </div>
  </div>
  
  
 
  
  <div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" class="btn btn-primary" id="conn" name="ajouter">ajouter</button>
      <button type="submit" class="btn btn-primary" id="conn" name="modifier">modifier</button>
    </div>
  </div>
</form>
</div>

</body>  
<?php
//ini_set("display_errors",1);

echo "<table id='tete' border=1 width='80%' >";
  echo "<tr class='titre'>
      <th>Nom promo</th>
      <th>code apprenant</th>
      <th>Nom</th>
      <th>prénom</th>
      <th>date de naissance</th>
      <th>numero telephon</th>
      <th>adresse email</th>
      <th>statut</th>
      


      </tr>";

if(isset($_POST['modifier'])){
    $select=$_POST["select"];
    $code=$_POST["code"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $date=$_POST["date"];
    $tel=$_POST["tel"];
    $email=$_POST["email"];
    $statut=$_POST["statut"];
    
    
          $prod=fopen("apprenants.txt", 'r' );
          while(!feof($prod)){
          $lines=fgets($prod);
          $fichier=explode(',', $lines);
    
    if($code==$fichier[1]){
                $fichier[0]=$select;
                $fichier[2]=$nom;
                $fichier[3]=$prenom;
                $fichier[4]=$date;
                $fichier[5]=$tel;
                $fichier[6]=$email;
                $fichier[7]=$statut;
               
                $effacer=$fichier[0].",".$fichier[1].",".$fichier[2].",".$fichier[3].",".$fichier[4].",".$fichier[5].",".$fichier[6].",".$fichier[7]."\n";
               
    }else {
                $effacer=$lines;

    }
           $newlines=$newlines.$effacer;
    }
    
      fclose($prod);

          $prod=fopen("apprenants.txt", 'w+' );
              
            fwrite($prod,$newlines);
          
          fclose($prod);
}
if(isset($_POST['ajouter'])){
            $select=$_POST["select"];
            $code=rand(0,1000);
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $date=$_POST["date"];
            $tel=$_POST["tel"];
            $email=$_POST["email"];
            $statut=$_POST["statut"];


      $prod = fopen("apprenants.txt",'a+');
      $lines=fgets($prod);
      $fichier=explode(",",$lines);
      fwrite($prod, $select.','.$code.','.$nom.','.$prenom.','.$date.','.$tel.','.$email.','.$statut."\n");


}
        
    $prod=fopen("apprenants.txt", 'r');
        
while(!feof($prod)){
            $lines=fgets($prod);
            $fichier=explode(',', $lines);
                      if($fichier[7]==1){
              echo "<tr>";				
       
                echo "<td>" . $fichier[0] . "</td>";
                echo "<td>" . $fichier[1] . "</td>";
                echo "<td>" . $fichier[2] . "</td>";
                echo "<td>" . $fichier[3]. "</td>";
                echo "<td>" . $fichier[4] . "</td>";
                echo "<td>" . $fichier[5] . "</td>";
                echo "<td>" . $fichier[6] . "</td>";
                echo "<td> 
                <a href='traitement.php?code=$fichier[1]'><button name='buton' id='buton'>";
                if($fichier[7]==1){
                  echo "accepter";
                }else if($fichier[7]==0){
                  echo "exclure";
                }  
                echo "</button></a>
                
                </td>";
               

              echo "</tr>";
                      }

}
   fclose($prod);
 

echo "</table>";
?>


</body>
</html>