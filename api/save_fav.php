<?php
include '../config/header.php';
include '../config/conn.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.thecatapi.com/v1/favourites?image_id=".$_POST['id']);
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-api-key: 8175f91c-3fcc-44ee-83f9-a4d66ff8b331'));

$server_output = curl_exec($ch);

curl_close ($ch);

$result = json_decode($server_output,true);
// var_dump($result);
?>
<body>
    <div class="container">
        <h2>Cat App</h2>
        <div class="form-group">
            <div class="input-group">
                    <?php 
                        $selected_small = ''; $selected_med ='';
                        ($_POST['size'] == 'med' ? $selected_med = 'selected' : $selected_small = 'selected');
                    ?>
                 <select id="select_size" class="form-control form-select-md mb-3" name="size" >
                    <option <?php echo $selected_small ;?> value="small">small</option>
                    <option <?php echo $selected_med ;?> value="med">medium</option>
                </select>
                <input type="text" class="form-control" name="search_id" id="search_id" placeholder="Search From ID" >
                <button id="add_fav" class="btn-success button">Add Fav</button>
                <button id="remove_fav" class="btn-danger button">Remove Fav</button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Id</th>
                <th>User Id</th>
                <th>Image Id</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach($result as $val){
                        echo '<tr>';
                        echo '<td>'.$count.'</td>';
                        echo '<td>'.$val['id'].'</td>';
                        echo '<td>'.$val['user_id'].'</td>';
                        echo '<td>'.$val['image_id'].'</td>';
                        echo '<td>'.$val['created_at'].'</td>';
                        echo '</tr>';
                        $count++;
                    }
                ?>
            </tbody>
        </table>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Favourite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="fav_image" placeholder="Enter favourite image id">
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_fav" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove From Favourite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="rem_image" placeholder="Enter favourite image id">
                </div>
                <div class="modal-footer">
                    <button type="button" id="rem_fav" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
