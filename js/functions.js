$(document).ready(function(){
    // on change size ajax call for api request
    $('#select_size').on('change',function(){
        $.ajax({
            url: "api/cat_size.php",
            type: "post",
            data : {size : $(this).val()},
            cache: false,
            success: function(html){
              $('.content').html(html);
            },
            error:function(xhr){
                console.log(xhr);
            }
        });
    });
    $('#search_id').on('keyup',function(){
        $.ajax({
            url: "api/cat_id.php",
            type: "post",
            data : {id : $(this).val(), size:$('#select_size').val()},
            cache: false,
            success: function(html){
              $('.content').html(html);
            },
            error:function(xhr){
                console.log(xhr);
            }
        });
    });
    $('.fav').on('click',function(){
        // $('#myModal').modal('show');
        id = $(this).parents('tr').find("td:eq(1)").text();
        $.ajax({
            url: "api/save_fav.php",
            type: "post",
            data : {id : id, size:$('#select_size').val()},
            cache: false,
            success: function(html){
                // $('.content').html(html);
                alert(html+"Image added to favourites Successfully");
            },
            error:function(xhr){
                console.log(xhr);
            }
        });
    });
    $('.rem').on('click',function(){
        id = $(this).parents('tr').find("td:eq(1)").text();
        $.ajax({
            url: "api/remove_fav.php",
            type: "post",
            data : {id : id, size:$('#select_size').val()},
            cache: false,
            success: function(html){
                alert(html+"Image removed from favourites Successfully");
                location.reload();
            },
            error:function(xhr){
                console.log(xhr);
            }
        });
    });
    $('#fav_list').on('click',function(){
        $.ajax({
            url: "api/fav_list.php",
            type: "post",
            data : {size:$('#select_size').val()},
            cache: false,
            success: function(html){
                $('.content').html(html);
            },
            error:function(xhr){
                console.log(xhr);
            }
        });
    });
});
