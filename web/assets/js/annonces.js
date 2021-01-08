$(function(){
$("#niveau").hide();
$("#titres").hide();
$("#date").hide();
$("#time").hide();
$("#objets").hide();
$("#object").hide();
$("#accueil").hide();
$("#ville").hide();
$("#evenements").hide();
//$("input").attr('disabled','disabled');
$("#accueils img").click(function(){

var categorie=$(this).data('value');

if(categorie=='livre')
{
    $("#accueil").show();
    $("#objet").html('Titre');
    $("#niveau").hide();
    $("#prix").show();
    $("#fichier").html(' Ajouter livre');
    $("#titres").hide();
    $("#evenements").hide();
    $("#titre").show();
    $("#ville").show();
}
if(categorie=='cours')
{
    $("#objet").html('Titre');
    $("#niveau").show();
    $("#titre").show();
    $("#prix").hide();
    $("#fichier").html(' Ajouter Fichier');
    $("#image").hide();
    $("#titres").hide();
    $("#accueil").show();
    $("#evenements").hide();
    $("#ville").show();
}
if(categorie=='pc')
{
    $("#objet").html('Titre');
    $("#niveau").hide();
    $("#objets").hide();
    $("#object").hide();
    $("#prix").show();
    $("#fichier").show();
    $("#fichier").html('Photo');
    $("#fichiers").show();
    $("#fichiers label").html('Ajouter photo');
    $("#titre").hide();
    $("#titres").show();
    $("#titres").attr('placeholder',"");
    $("#date").hide();
    $("#time").hide();
    $("#accueil").show();
    $("#ville").show();
    $("#evenements").hide();
}
if(categorie=='phone')
{
    $("#objet").html('Titre');
    $("#niveau").hide();
    $("#objets").hide();
    $("#object").hide();
    $("#prix").show();
    $("#fichier").show();
    $("#fichier").html('Photo');
    $("#fichiers").show();
    $("#fichiers label").html('Ajouter photo');
    $("#titre").hide();
    $("#titres").show();
    $("#titres").attr('placeholder',"");
    $("#date").hide();
    $("#time").hide();
    $("#accueil").show();
    $("#ville").show();
    $("#evenements").hide();

}
if(categorie=='event')
{
    $("#objet").html('Nom Evenement');
    $("#niveau").hide();
    $("#objets").show();
    $("#object").show();
    $("#prix").hide();
    $("#fichier").hide();
    $("#fichiers").hide();
    $("#titre").hide();
    $("#titres").show();
    $("#date").show();
    $("#time").show();
    $("#accueil").show();
    $("#evenements").show();
    $("#ville").show();

}
if(categorie=='applic')
{
    $("#objet").html('Nom Application');
    $("#niveau").hide();
    $("#objets").hide();
    $("#object").hide();
    $("#prix").show();
    $("#fichier").show();
    $("#fichier").html('Demo');
    $("#fichiers").show();
    $("#fichiers label").html('Ajouter une démonstration');
    $("#titre").hide();
    $("#titres").show();
    $("#titres").attr('placeholder',"Taper le nom de l'application");
    $("#date").hide();
    $("#time").hide();
    $("#accueil").show();
    $("#ville").show();
    $("#evenements").hide();

}
if(categorie=='robo')
{
    $("#objet").html('Titre');
    $("#niveau").show();
    $("#prix").hide();
    $("#fichier").html(' Ajouter Fichier');
    $("#image").hide();
    $("#titres").hide();
    $("#accueil").show();
    $("#evenements").hide();
    $("#ville").show();


}
});
$("#categorie").change(function(){
            if($("#categorie").val()=='cours')
            {
            $("#objet").html('Titre');
            $("#niveau").show();
            $("#prix").hide();
            $("#fichier").html(' Ajouter Fichier');
            $("#image").hide();
            $("#titres").hide();
            $("#titre").show();
            $("#accueil").show();
            $("#ville").show();
            $("#evenements").hide();
            }
             
            if($("#categorie").val()=='livre')
            {
                $("#accueil").show();
                $("#objet").html('Titre');
                $("#niveau").hide();
                $("#prix").show();
                $("#fichier").html(' Ajouter livre');
                $("#titres").hide();
                $("#ville").show();
                $("#evenements").hide();
                $("#titre").show();
                
            }
            if($("#categorie").val()=='evenemment')
            {
                $("#objet").html('Nom Evenement');
                $("#niveau").hide();
                $("#objets").show();
                $("#object").show();
                $("#prix").hide();
                $("#fichier").hide();
                $("#fichiers").hide();
                $("#titre").hide();
                $("#titres").show();
                $("#date").show();
                $("#time").show();
                $("#accueil").show();
                $("#ville").show();
                $("#evenements").show();
            }
            if($("#categorie").val()=='Application')
            {
                $("#objet").html('Nom Application');
                $("#niveau").hide();
                $("#objets").hide();
                $("#object").hide();
                $("#prix").show();
                $("#fichier").show();
                $("#fichier").html('Demo');
                $("#fichiers").show();
                $("#fichiers label").html('Ajouter une démonstration');
                $("#titre").hide();
                $("#titres").show();
                $("#titres").attr('placeholder',"Taper le nom de l'application");
                $("#date").hide();
                $("#time").hide();
                $("#accueil").show();
                $("#ville").show();
                $("#evenements").hide();
            }
            if($("#categorie").val()=='Telephone')
            {
                $("#objet").html('Titre');
                $("#niveau").hide();
                $("#objets").hide();
                $("#object").hide();
                $("#prix").show();
                $("#fichier").show();
                $("#fichier").html('Photo');
                $("#fichiers").show();
                $("#fichiers label").html('Ajouter photo');
                $("#titre").hide();
                $("#titres").show();
                $("#titres").attr('placeholder',"");
                $("#date").hide();
                $("#time").hide();
                $("#accueil").show();
                $("#ville").show();
                $("#evenements").hide();
                
            }
            if($("#categorie").val()=='PC_portable')
            {
                $("#objet").html('Titre');
                $("#niveau").hide();
                $("#objets").hide();
                $("#object").hide();
                $("#prix").show();
                $("#fichier").show();
                $("#fichier").html('Photo');
                $("#fichiers").show();
                $("#fichiers label").html('Ajouter photo');
                $("#titre").hide();
                $("#titres").show();
                $("#titres").attr('placeholder',"");
                $("#date").hide();
                $("#time").hide();
                $("#accueil").show();
                $("#ville").show();
                $("#evenements").hide();
                
            }

});


});