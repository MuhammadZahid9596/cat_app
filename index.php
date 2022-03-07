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
                <button id="add_fav" class="btn-success button">Add Fav</button>
                <button id="remove_fav" class="btn-danger button">Remove Fav</button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>URL</th>
                <th>Width</th>
                <th>Height</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $val){
                        echo '<tr>';
                        echo '<td>'.$val['id'].'</td>';
                        echo '<td>'.$val['url'].'</td>';
                        echo '<td>'.$val['width'].'</td>';
                        echo '<td>'.$val['height'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to favourite</h5>
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
