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
    $('#add_fav').on('click',function(){
        $('#myModal').modal('show');
    });
    $('#remove_fav').on('click',function(){
        $('#myModal2').modal('show');
    });
    $('#save_fav').on('click',function(){
        if($("#fav_image").val()){
            $.ajax({
                url: "api/save_fav.php",
                type: "post",
                data : {id : $("#fav_image").val(), size:$('#select_size').val()},
                cache: false,
                success: function(html){
                $('.content').html(html);
                alert("Image added to favourites Successfully");
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        }
        else{
            alert('kindly enter an image id');
        }  
    });
    $('#rem_fav').on('click',function(){
        if($("#rem_image").val()){
            $.ajax({
                url: "api/save_fav.php",
                type: "post",
                data : {id : $("#rem_image").val(), size:$('#select_size').val()},
                cache: false,
                success: function(html){
                    alert("Image removed from favourites Successfully");
                    location.reload();
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        }
        else{
            alert('kindly enter an image id');
        }  
    });
});
