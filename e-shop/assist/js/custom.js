$(document).ready(function() {
    $("#search").hide();
    open_search();
    function open_search(){
        $('#open_search').click(function(){
            $("#search").toggle(600);
        });
    }

    $("#modal").hide();
    $("#open-modal").click(function(){
        $("#modal").show(777).html(data);
    });
    $("#modal-close").click(function(){
        $("#modal").hide(777).html(data);
    });

    $("#category-content").hide();
    $("#category").click(function(){
        $("#category-content").toggle(777).html(data);
    });

    $("#brand-content").hide();
    $("#brand").click(function(){
        $("#brand-content").toggle(777).html(data);
    });

    $("#product-content").hide();
    $("#product").click(function(){
        $("#product-content").toggle(777).html(data);
    });

    $("#get_mens_clothing").hide();
    $("#mens_clothing").click(function(){
        $("#get_mens_clothing").toggle(777).html(data);
    });

    $("#get_womens_clothing").hide();
    $("#womens_clothing").click(function(){
        $("#get_womens_clothing").toggle(777).html(data);
    });

    $("#get_kids_clothing").hide();
    $("#kids_clothing").click(function(){
        $("#get_kids_clothing").toggle(777).html(data);
    });

});
