<?php
include '../config/header.php';
include '../config/conn.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.thecatapi.com/v1/favourites");
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
                <button id="fav_list" class="btn-success button">Favourite List</button>
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
                <th>Actions</th>
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
                        echo '<td><button data-id="add_fav" class="btn-success button fav">Add Fav</button>&nbsp<button data-id="remove_fav" class="btn-danger button rem">Remove Fav</button></td>';
                        echo '</tr>';
                        $count++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
