<?php
include 'config/header.php';
include 'config/conn.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.thecatapi.com/v1/images/search?limit=10");
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

header('x-api-key: 8175f91c-3fcc-44ee-83f9-a4d66ff8b331');

$server_output = curl_exec($ch);

curl_close ($ch);

$result = json_decode($server_output,true);
?>
<body class="content">
    <div class="container">
        <h2>Cat App</h2>
        <div class="form-group">
            <div class="input-group">
                <select id="select_size" class="form-control form-select-md mb-3" name="size" >
                    <option value="">Select Size</option>
                    <option value="small">small</option>
                    <option value="med">medium</option>
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
                <th>URL</th>
                <th>Width</th>
                <th>Height</th>
                <th>Actions (Delete Fav from fav list)</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach($result as $val){
                        echo '<tr>';
                        echo '<td>'.$count.'</td>';
                        echo '<td>'.$val['id'].'</td>';
                        echo '<td>'.$val['url'].'</td>';
                        echo '<td>'.$val['width'].'</td>';
                        echo '<td>'.$val['height'].'</td>';
                        echo '<td><button data-id="add_fav" class="btn-success button fav">Add Fav</button></td>';
                        echo '</tr>';
                        $count++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
