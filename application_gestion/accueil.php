<!DOCTYPE html>
<html>
    <head>
        <title>application de gestion</title>
        <meta charset="UTF-8">
        
        <style>
           
            nav #paysage{
    width: 100px;
    height: 70px;
}
 
 nav ul{
     float: right;
    margin-right: 20px;
}
nav  li  {
    display: inline-block;
    list-style-type: none;
    
}
nav ul li a{
    text-decoration: none;
    padding: 40px;
}
/*nav ul li a.sb{
    background: burlywood;
    border-radius: 1px;
    height: 10px;
}*/
nav{
    width: 100%;
    height: 70px;
    background-color: dimgrey;
    opacity: 0.8;
}
a{
    color: white;
}
h1{
    text-align:center;
    font-size:30px;
    color:red;
}
#acueil{
    border:0px solid black;
    width:100%;
    height:500px;
    background-image:url(ap1.jpg);
    background-size:cover;
}
        </style>
    </head>
    <body>
        <header>
           <h1>APPLICATION DE GESTION DES APPRENANTS DE LA SA</h1> 
        </header>
        <div class="index">
        <div>
                
         <nav>
            <img src="hotel.jpg" alt="" id="paysage">
         
                <ul>
                    
                    <li>
                        <a  href="promotion.php">GESTION DES PROMO</a>
                    </li>
                    <li>
                       <a href="apprenants.php">GESTION DES APPRENANTS</a>
                    </li>
                    <li>
                        <a class="sb" href="listeaprenant.php">LISTER APPRENANTS</a>
                    </li>
                </ul>

        </nav>
        </div>
        <div id="acueil">

        </div>

    </body>
</html>