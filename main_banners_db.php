<?php
/*
 * Plugin Name: Banners DB
 * Description: DB data for banners
 * Version: 1.0
 * Author: Pavel Misko
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: kodim
 * Domain Path: /languages
 *
 * Network: true
 */


// Добавляем новую ссылку в меню Админ Консоли
function add_element_menu()
{
    add_menu_page(
        'Настройка баннеров', // тайтл страницы
        'API Banners', // текст ссылки в меню
        'manage_options', // права пользователя, необходимые для доступа к странице
        'db_hype_api/includes/db_banners.php', // ярлык страницы
        '', // функция, которая выводит содержимое страницы
        'dashicons-images-alt2', // иконка, в данном случае из Dashicons
        20 // позиция в меню
    );
    add_submenu_page(
        "db_hype_api/includes/db_banners.php",
        "Добавить баннер",
        "Добавить баннер",
        0,
        "db_hype_api/includes/new_db_banners.php", "");

    add_submenu_page(
        'Редактирование баннеров', //null,  //или 'options.php'
        'Редактирование баннеров',
        'Редактирование баннеров',
        'manage_options',
        'db_hype_api/includes/edit_db_banners.php', ''
    );
}

add_action('admin_menu', 'add_element_menu');

/**
// --- ADD ROUTE methods POST
 **/
add_action( 'rest_api_init', function(){

    register_rest_route( 'api/api-hype', '/edit', array(
        array(
            'methods'  => 'POST',
            'callback' => 'edit_banners',
            'args'     => array(
                'id' => array(
                    'type'     => 'string',
                ),
                'string' => array(
                    'type'    => 'string',
                ),
            ),
        )
    ));

    register_rest_route( 'api/api-hype', '/new-banner', array(
        array(
            'methods'  => 'POST',
            'callback' => 'create_banners',
            'args'     => array(
                'id' => array(
                    'type'     => 'string',
                ),
                'json_val' => array(
                    'type'    => 'string',
                ),
            ),
        )
    ));

    register_rest_route( 'api/api-hype', '/get-info/(?P<id>.+)', array(
        'methods'             => 'GET',            // метод запроса: GET, POST ...
        'callback'            => 'get_info',
        'args' => array(
            'id' => array(
                'default' => null,
                'required' => null,
            ),
		),
	));
});

function edit_banners( WP_REST_Request $request ){
    $servername = "localhost";
    $database = "33667244_42d86e99";
    $username = "33667244_42d86e99";
    $password = "j!LgiCU7";

    $id = $request->get_param('id');
//    json_encode($request->get_param('string'), JSON_UNESCAPED_UNICODE);
    $string = json_encode($request->get_param('string'), JSON_UNESCAPED_UNICODE);
//    $string = $request->get_param('string');

    $conn = mysqli_connect($servername, $username, $password, $database);
    $conn->set_charset('utf8');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE `api_banners_hype` SET json_val='$string' where banner_id ='$id'";

    if (mysqli_query($conn, $sql)) {
        $res = "New record created successfully";
    } else {
        $res = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

    $response = array(
        'status' =>200,
        "res" =>$res
    );

    return $response;
}

function create_banners( WP_REST_Request $request ){
    $servername = "localhost";
    $database = "33667244_42d86e99";
    $username = "33667244_42d86e99";
    $password = "j!LgiCU7";

    $id = $request->get_param('id');
    $json_val = ".$request->get_param('json_val').";

    $conn = mysqli_connect($servername, $username, $password, $database);
    $conn->set_charset('utf8');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $res = "";

    $sql = "INSERT INTO `api_banners_hype` (banner_id,json_val) VALUES('" . $id . "','" . $json_val . "')";
    if (mysqli_query($conn, $sql)) {
        $res = "New record created successfully";
    } else {
        $res = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    wp_redirect("http://testov.kodim.website/wp-admin/admin.php?page=db_hype_api%2Fincludes%2Fdb_banners.php");
    exit();
}

function get_info( WP_REST_Request $request ) {
    $id = $request->get_param( 'id' );

    $servername = "localhost";
    $database = "33667244_42d86e99";
    $username = "33667244_42d86e99";
    $password = "j!LgiCU7";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn,"SELECT json_val FROM `api_banners_hype` where banner_id = '".$id."'");
    $row = mysqli_fetch_row($result);
    mysqli_close($conn);

    $response = array(
        'status' =>200,
        "info" =>$row[0]
    );
    return $response;
}