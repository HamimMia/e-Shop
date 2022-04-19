/*
$(document).ready(function(){
    category();
    sub_category();
    product();
    //cat() is a funtion fetching category record from database whenever page is load
    function category(){
        $.ajax({
            url	:	"functions.php",
            method:	"POST",
            data	:	{category:1},
            success	:	function(data){
                $("#get_category").html(data);

            }
        })
    }
    function sub_category(){
        $.ajax({
            url	:	"functions.php",
            method:	"POST",
            data	:	{sub_category:1,cat_id:category_id},
            success	:	function(data){
                $("#get_sub_category").html(data);

            }
        })
    }


})




















*/
