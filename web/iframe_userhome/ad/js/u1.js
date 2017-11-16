//ratio
$(".ratio").click(function(){
    $(this).parent(".ratio-group").find(".ratio").removeClass("on");
    $(this).addClass("on");
});
//opt
$(".opt-sel").change(function(){
    var val=$(this).val();
    if(val=="0"){
        $(this).css("width","80px");
        $(this).next(".opt").show();
    }else{
        $(this).css("width","250px");
        $(this).next(".opt").hide();
    }
});
var u1={};

