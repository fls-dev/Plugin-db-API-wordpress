<?php
$id = $_GET['id'];


$servername = "localhost";
$database = "33667244_42d86e99";
$username = "33667244_42d86e99";
$password = "j!LgiCU7";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$res = "";

$result = mysqli_query($conn,"SELECT json_val FROM `api_banners_hype` where banner_id = '".$id."'");

$row = mysqli_fetch_assoc($result);

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
    <title>Редактирование баннера</title>
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
        .h2-ob{
            font-size: 16px;
            font-weight: 500;
        }
        .header-ob{
            display: flex;
            justify-content: space-between;
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

        .add-new-block-ob{
            width: 100%;
            padding: 25px;
            background-color: #fff;
            margin: 30px 0;
        }
        .line-item-ob label{
            display: block;
        }
        .line-item-ob input{
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .line-item-ob textarea{
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-ob-add{
            cursor: pointer;
            padding: 8px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: rgb(7, 114, 182);
            color: #fff;
            min-width: 100px;
        }
        .add-line-ob-add{
            font-size: 14px;
            margin-bottom: 15px;
            cursor: pointer;
            color: #313131;
            width: 105px;
        }
        .added-new{
            position: relative;
            max-width: 500px;
            padding: 10px 0 0 0;
            border-top: 1px solid rgb(232, 232, 232);
            border-bottom: 1px solid rgb(232, 232, 232);
        }
        #insertBlock{margin-bottom: 15px;}
        .remove-item{
            width: 18px;
            position: absolute;
            right: 0;
            top: 0;
            cursor: pointer;
        }
        .ob-delete img{
            width: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="ob-container">
    <h1 class="h1-ob">Редактирование баннеров</h1>
    <div class="add-new-block-ob">
        <h2 class="h2-ob">Добавить новое значение</h2>
    <form onsubmit="saveData(event)">
        <div class="line-item-ob">
            <label>Key</label>
            <input class="inp-val" required type="text" value="">

            <label>Value</label>
            <textarea class="inp-val" required type="text" value=""></textarea>
        </div>
        <div id="insertBlock"></div>
        <div class="add-line-ob-add">Добавить еще</div>
    <button type="submit" class="btn-ob-add">ADD</button>
    </form>
    </div>

    <div class="ob-table">
        <table class="table">
            <thead>
            <tr>
                <th>Key</th>
                <th>Values</th>
                <th width="50px">Options</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>

    // let data = [];
    let data = JSON.parse(decodeURIComponent(escape(atob(<? echo $row['json_val']; ?>))));

    if(data == ""){
        data = []
    }
    console.log(data)


    $('.table').dataTable({
        "data": data,
        "columns": [
            { "data": "key" },
            { "data": "value" },
            { "data": "options" },
        ],
        "order": [ 0, 'desc' ]
    });

    const insertBlock = document.getElementById('insertBlock');
    const btnAddLine = document.querySelector('.add-line-ob-add');
    const newLine = `<div class="line-item-ob added-new">
     <img onclick="removeItem(event)" class="remove-item" src="http://testov.kodim.website/wp-content/uploads/2023/01/remove.png">
            <label>Key</label>
            <input class="inp-val" required type="text" value="">
            <label>Value</label>
            <textarea class="inp-val" required type="text" value=""></textarea>
        </div>`;
    btnAddLine.addEventListener('click', (e)=>{
        insertBlock.insertAdjacentHTML('beforeend', newLine)
    })

    function removeItem(e) {
        e.target.parentElement.remove()
    }

    function deleteKey(key) {
        const newArray = data.filter(function(el) { return el.key !== key; });
        const dataSend = {
            "id": "<?php echo $id; ?>",
            "string": btoa(unescape(encodeURIComponent(JSON.stringify(newArray))))
        }
        $.ajax({
            url: "http://testov.kodim.website/wp-json/api/api-hype/edit",
            type: "POST",
            data: dataSend,
            success: function (res) {
                console.log(res)
                if(res.status === 200){
                    location.reload()
                }
            }
        });
    }

    // W3sia2V5IjoiIiwidmFsdWUiOiIiLCJvcHRpb25zIjoiIn1d


    function saveData(event) {
        event.preventDefault()
        let allJson = {}
        let arr = []
        const allDiv = document.querySelectorAll('.line-item-ob');
        console.log(allDiv)
        allDiv.forEach(i=>{
           let search = i.querySelectorAll('.inp-val');
            console.log(search)
            let obj = {}
            obj.key = search[0].value;
            obj.value = search[1].value;
            obj.options = `<div onclick="deleteKey('${search[0].value}')" class="ob-delete"><img src="http://testov.kodim.website/wp-content/uploads/2023/01/remove.png"></div>`;
            arr.push(obj);
        })

        const newRecords = data.concat(arr);

        const dataSend = {
            "id": "<?php echo $id; ?>",
            "string": btoa(unescape(encodeURIComponent(JSON.stringify(newRecords))))
        }
        $.ajax({
            url: "http://testov.kodim.website/wp-json/api/api-hype/edit",
            type: "POST",
            data: dataSend,
            success: function (res) {
                console.log(res)
                if(res.status === 200){
                    location.reload()
                }
            }
        });
    }


</script>
</body>
</html>










