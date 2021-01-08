$(function(){
$("#fos_user_registration_form_identifiant").hide();
$("#fos_user_registration_form_type_0").click(function(){
    var type=$("#fos_user_registration_form_type_0").val();

if(type=='etudiant')
{
    $("#fos_user_registration_form_identifiant").show();
}

});
$("#fos_user_registration_form_type_1").click(function(){
    var type=$("#fos_user_registration_form_type_1").val();



});

$("#fos_user_registration_form_type_2").click(function(){
    var type=$("#fos_user_registration_form_type_2").val();



});
$("#photo").change(function(){
    var photo=$("#photo").val();
    $(".photo").html(photo);



});


});