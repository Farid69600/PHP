
<?php 

//pour convertir les mots de passe existants
$salt = "Cryptage";
$motDePasseCrypteK = md5("banane".md5($salt));


$users =[
    [
        "username" => "karim",
        "password" => "bce6fa3352c3a3778a65a77c501dc640"   
    ],
    [
        "username" => "thomas",
        "password" => "0597b4c87a5861ce8e77be5740688960"   
    ],
    [
        "username" => "florian",
        "password" => "7a65035a8f7880265b5b5e0c24fe4b13"   
    ],
];


$formulaire = "
<form method='post'>
<div class='form-group'>
    <input type='text' name='username' placeholder='username'>
</div>
<div class='form-group'>
    <input type='text' name='password' placeholder='password'>
</div>
<div class='form-group'>
    <button class='btn btn-success' type='submit'>GO !</button> 
</div>
</form>";

$secret = "<h2> Bien joué.......</h2>";

// $contenuDeLaPage = "";

$messageErreur = "";

$utilisateurInconnu = "Utilisateur inconnu";
$motPasseErrone = "Mot de passe éronné";
$champsVides = "Veuillez renseigner tous les champs";

$modeFormulaire = true;




if(
    (isset($_POST['username']) && isset($_POST['password']))
    &&
    (!empty($_POST['username']) && !empty($_POST['password']))
)
{ 
        // boucle dans le tableau

        $userExists = false;
        $motDePasse;

        foreach ($users as $user){
        if ($_POST['username'] == $user['username']){
        $userExists = true;
        $motDePasse = $user['password'];
        }
        }

        if($userExists){

                     //VERIFICATION SUIVANTE Est-ce le mot de passe est le bon ?
                                                   
                                 if($motDePasse == md5($_POST['password'].md5($salt)) ) {

                                        $modeFormulaire = false;

                                }  else {

                                 $messageErreur = $motPasseErrone;
                                }

                        }else{

                            $messageErreur = $utilisateurInconnu;
                        }       
       }else{

            $messageErreur = $champsVides;
       }

$modeFormulaire ? $contenuDeLaPage = $formulaire : $contenuDeLaPage = $secret;
        
?>