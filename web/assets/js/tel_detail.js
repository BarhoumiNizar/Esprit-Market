$(function(){

 $("#tel").click(function(){
     var x=$("#num").val();
     $("span",this).html(x);
     $("span",this).css({color:'black','font-weight':'bold','font-size':'15px'});
    //alert(x);
 });

 $("#email").click(function(){
    var em=$("#emails").val();
    $("span",this).hide();
    $("b",this).html(em);
    $("b",this).css({color:'black','font-weight':'bold','font-size':'15px'});
});

});