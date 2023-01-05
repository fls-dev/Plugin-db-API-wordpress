<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <h1 class="h1-ob">Добавление баннера</h1>

    <div class="add-new-block-ob">
        <h2 class="h2-ob">Добавить новый баннер</h2>
        <form method="POST" action="http://testov.kodim.website/wp-json/api/api-hype/new-banner">
            <div class="line-item-ob">
                <label>Id Banner's</label>
                <input class="inp-val" name="id" required type="text" value="">
                <input type="hidden" name="json_val" value="W3sia2V5IjoiIiwidmFsdWUiOiIiLCJvcHRpb25zIjoiIn1d">
            </div>
            <button type="submit" class="btn-ob-add">ADD</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


</script>
</body>
</html>










