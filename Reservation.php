<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Sst.css">
    <title>Ochkha Resturant</title>
</head>

<body>
<?php
    $sname = "localhost";
    $uname = "root";
    $pass = "";
    
    $conn = new mysqli($sname, $uname, $pass);
    $db = mysqli_select_db($conn,"reserva");
    // REQUETE : CREATE DATABASE reserva ;
?>
    <section class="header">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
        <div class="links-container">
            <ul>
                <a href="index.html">Home</a>
                <a href="Reservation.php">Reservations</a>
                <a href="Menu.html">Menu</a>
                <a href="Events.html">Events</a>
                <a href="contact.html">About us</a>
                <a href="SOON!.html"><img src="img/x.png" width="18px" style="padding-top: 8px;"></a>
                <!-- <select name="Menus">
                    <option value="Food Menu"><a href="">Food Menu</a></option>
                    <option value="Drink Menu"><a href="">Drink Menu</a></option>
                    <option value="Vine Menu"><a href="">Vine Menu</a></option>
                </select> -->
            </ul>
        </div>
    </section>
    <div class="eve-titles" >
        <h2>OUCHKHA RESTURANT</h2>
        <h2 class="orange" style="font-size:xx-large;" >RESERVE NOW!!!</h2>
    </div>
    <div class="res">
        <div id = "label" >
        <div>
                <img src="img/rspsitu.png" alt="">
        </div><br>
            <h3>DETAILS</h3>
            <p style="text-align: center;">
                Use this form to make a reservation in our restaurant... <BR>
                For more information contact us...</p>
        </div>
        <div id="form" style="background-color: #F0D2D4;">
            <h2>Réservez votre table :</h2>
            <form action="" method="post" >
                <h3>DEMANDE DE RÉSERVATION</h3>
                <p>VEUILLEZ REMPLIR CE FORMULAIRE POUR NOUS FAIRE UNE DEMANDE DE RÉSERVATION</p>
                <span>First Name :</span>
                <input type="text" name="fname" placeholder="Nom">
                <span>Last Name :</span>
                <input type="text" name="lname" placeholder="Prenom">
                <span>Email :</span>
                <input type="email" name="email" placeholder="Email">
                <span>Numero de telephone :</span>
                <input type="tel" name="Numero" placeholder="Telephone">
                <span>Date :</span>
                <?php 
                $date = getdate();
                $j = $date['mday'] ; $m = $date['mon'] ; $y = $date['year'];
                echo "<input type='date' name='date' min = '$y-$m-$j'> ";
                ?>
                <div>
                <span>Nombre de personnes :</span>
                <select name="nbr">
                        <option value="" disabled selected hidden>Please Choose...</option>
                         <option value="2">2 People</option>
                         <option value="3">3 People</option>
                         <option value="4">4 People</option>
                         <option value="5">5 People</option>
                         <option value="6">6 People</option>
                         <option value="7">7 People</option>
                         <option value="8">8 People</option>
                         <option value="9">9 People</option>
                         <option value="10">10 People</option>

                </select>
                <span>Events :</span>
               <select name="Events">
                         <option value="1">Nothing Special </option>
                         <option value="2">Meeting </option>
                         <option value="3">Pool Party </option>
                         <option value="4">Engagement Party </option>
                         <option value="5">Eid Party </option>
                         <option value="6">Birthday Party </option>
                </select>
                </div>
                <div>
                <span>Type de paiement  :</span>
                <input type="radio" name="tpp" value="Espèces"><span> Espèces</span>
                <input type="radio" name="tpp" value="Carte Bancaire"><span> Carte Bancaire</span>
                </div>
                <div>
                    <center>
                <input type="checkbox"> <span id="s"> Sign me up to receive dining offers and news by email. </span><br>
                <input type="checkbox"> <span id="s"> Yes, I want to get text updates and reminders about my reservations.* </span><br>
                    </center>
                </div>
                <input type="submit" name ="Envoyer"></form>
                <?php
                 if (isset($_POST['Envoyer'])){
                    $p = $_POST['fname'];
                    $n = $_POST['lname'];
                    $email = $_POST['email'];
                    $Numero = $_POST['Numero'];
                    $date = $_POST['date'];
                    $tp = $_POST['tpp'];
                    $event = $_POST['Events'];
                    $nbr = $_POST['nbr'];
                    if(empty($p)) die ('<p>veuillez remplir tous les champs requis!</p>');
                    if(empty($n)) die ('<p>veuillez remplir tous les champs requis!</p>');
                    if(empty($email)) die ('<p>veuillez remplir tous les champs requis!</p>');
                    if(empty($date)) die ('<p>veuillez remplir tous les champs requis!</p>');
                    if(empty($tp)) die ('<p>veuillez remplir tous les champs requis!</p>');
                    if ($tp == "Carte Bancaire"){
                        echo "<div><center>
                        <h3>Payer en ligne</h3><br>
                        <form action ='' method = 'post'>
                        <span>N de carte :</span> <input type='text' name='ncarte' placeholder='1111 2222 3333 4444'><br><br>
                        <span>Date d'expiration : </span> <input type='text' name='d' size ='5'placeholder='12/25'>
                        <span>CVV : </span> <input type='text' name='cc' size ='5'placeholder='123'><br>
                        <input type='submit' name ='Envoyer1'></form></center>
                        </div>";
                        if (isset($_POST['Envoyer1'])){
                            $reqe = "INSERT INTO reservation values(NULL, '$p', '$n','$email', '$Numero', '$date', '$tp', '$nbr', '$event')";
                            $result1 = mysqli_query($conn, $reqe);
                            $file = fopen("Reservation.txt","w");
                            fwrite($file,"------------------------------------- RESERVATION -------------------------------------
                            NUMERO DE RESERVATION : $id
                            NOME COMPLETE : $p $n 
                            EMAIL : $email 
                            EVENT : $event 
                            NOMBRES DE PERSONNES : $nbr 
                            NUMERO DE TELEPHONE : $Numero
                            TYPE DE PAIEMENT : $tp 
                            
                
                            PRIX TOTAL : $prix MAD
                            
                            MERCI POUR VOTRE RESERVATION.
                            OUCHKHA RESTAURANT. 
        ---------------------------------------------------------------------------------------");
                            fclose($file);
                               echo "<div><center>
                            <h3>YOUR RESERVATION TICKET :</h3><br>
                            <a href='Reservation.txt' download='RESERVATION'>
                            <input type='button' value = 'Download'>
                            </a>                    </div>";
                            
                            }
                    }
                    $req = "CREATE TABLE IF NOT EXISTS Reservation (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    Fname VARCHAR(50) NOT NULL,
                    Lname VARCHAR(50) NOT NULL,
                    Email VARCHAR(50) NOT NULL,
                    Tele INTEGER NOT NULL,
                    RDate Date NOT NULL,
                    Type VARCHAR(50) NOT NULL,
                    nbr INTEGER NOT NULL,
                    Event VARCHAR(50) NOT NULL);";
                    $result = mysqli_query($conn, $req);
                    if (($tp == "Espèces")){
                    $reqe = "INSERT INTO reservation values(NULL, '$p', '$n','$email', '$Numero', '$date', '$tp', '$nbr', '$event')";
                    $result1 = mysqli_query($conn, $reqe);
                    }
                    $ee = 0 ;
                    if ($event != "nothing special") $ee = 100 ;
                    $prix = (int)$nbr * 50 + $ee ;
                    mysqli_close($conn);
                    $file = fopen("Reservation.txt","w");
                    fwrite($file,"------------------------------------- RESERVATION -------------------------------------
                    NOME COMPLETE : $p $n 
                    EMAIL : $email 
                    EVENT : $event 
                    NOMBRES DE PERSONNES : $nbr 
                    NUMERO DE TELEPHONE : $Numero
                    TYPE DE PAIEMENT : $tp 
                    
        
                    PRIX TOTAL : $prix MAD
                    
                    MERCI POUR VOTRE RESERVATION.
                    OUCHKHA RESTAURANT. 
---------------------------------------------------------------------------------------");
                    fclose($file);
                    if (($tp == "Espèces")){
                       echo "<div><center>
                    <h3>YOUR RESERVATION TICKET :</h3><br>
                    <a href='Reservation.txt' download='RESERVATION'>
                    <input type='button' value = 'Download'>
                    </a>                    </div>";
                    }
                 }

            ?>
            </form>

        </div>
    </div>
    <center>
        <div class="pied">
            <p>© Système de gestion de restaurants
                - Nouih Omar
                - El Hassan Semlali
                - Zaghloul Chaimaa</p>
        </div>
    </center>
</body>
