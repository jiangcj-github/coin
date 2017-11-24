var left={};
left.activeIndex=function(id){
    var ul=$(".left .ul");
    ul.find("a.active").removeClass("active");
    ul.find("a").eq(id).addClass("active");
};