<?php

$servername = "localhost";
$database = "33667244_42d86e99";
$username = "33667244_42d86e99";
$password = "j!LgiCU7";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$res = "";

$result = mysqli_query($conn,"SELECT * FROM api_banners_hype");

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <title>Настройка баннеров</title>
    <style>
        .ob-container *{box-sizing: border-box; font-family: 'Roboto', sans-serif;}
        .ob-container{
            margin: 20px;
        }
        .dataTables_wrapper .dataTables_length select {
            padding: 0 24px 0 8px!important;
        }
        .dataTables_filter{margin-bottom: 20px!important;}
        .dataTables_filter input{
            height: 30px!important;
        }
        .h1-ob{
            color: #464646;
            font-size: 1.6em;
            margin: 0 0 10px 0;
        }
        .header-ob{
            display: flex;
            justify-content: space-between;
        }
        .btn-ob-add{
            cursor: pointer;
            padding: 8px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: rgb(7, 114, 182);
            color: #fff;
        }
        .ob-table{
            margin: 30px 0;
        }

    /*    table     */
        .table{
            border: 1px solid #eee;
            table-layout: fixed;
            width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
            border-collapse: collapse;
        }
        .table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }
        .table td{
            padding: 5px 10px;
            border: 1px solid #eee;
            text-align: left;
        }
        .table tbody tr:nth-child(odd){
            background: #fff;
        }
        .table tbody tr:nth-child(even){
            background: #F7F7F7;
        }
        /*      end  table     */
    </style>
</head>
<body>
<div class="ob-container">
    <h1 class="h1-ob">Настройки баннеров</h1>

    <div class="ob-table" >
        <table class="table" id="obTable">
            <thead>
            <tr>
                <th>Название банера</th>
                <th width="120px">Опции</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($json as $item) {
               ?>
                <tr>
                    <td class="mob-id"><?php echo $item['banner_id']; ?></td>
                    <td><a href="/wp-admin/admin.php?page=db_hype_api/includes/edit_db_banners.php&id=<?php echo $item['banner_id']; ?>">Редактировать</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {

        $('#obTable').dataTable();
    })
</script>
</body>
</html>










