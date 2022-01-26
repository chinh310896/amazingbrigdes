<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "amazingbridge");

function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

$db = db_connect();


function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

function confirm_query_result($result)
{
    global $db;

    if ($result) {
        return $result;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
//database bridges------>
function isNameUnique($bridgeName)
{
    global $db;
    $bridgeName = mysqli_real_escape_string($db, $bridgeName);
    $sql = "SELECT * FROM `Bridges` WHERE `name` = '$bridgeName'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $count = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $count == 0;
}

function insert_bridge($bridge)
{
    global $db;
    $bridge['height'] = ($bridge['height'] == null) ? null : $bridge['height'];
    $bridge['clb'] = ($bridge['clb'] == null) ? null : $bridge['clb'];
    $bridge['width'] = ($bridge['width'] == null) ? null : $bridge['width'];
    $bridge['span'] = ($bridge['span'] == null) ? null : $bridge['span'];
    $sql = "INSERT INTO Bridges ";
    $sql .= "(`name`,`official name`,`other name(s)`,status,`construction begin`,`construction end`,opened,country,location,crossed,structure,material,`total length`,height,`clerance below`,width,span,designer,`maintained by`,`heritage status`,description,`map url`) ";
    $sql .= "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($db);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssssssdddddsssss", $bridge['name'], $bridge['ofname'], $bridge['othname'], $bridge['status'], $bridge['begin'], $bridge['end'], $bridge['opened'], $bridge['country'], $bridge['location'], $bridge['crossed'], $bridge['structure'], $bridge['material'], $bridge['length'], $bridge['height'], $bridge['clb'], $bridge['width'], $bridge['span'], $bridge['designer'], $bridge['mtb'], $bridge['hts'], $bridge['description'], $bridge['mapurl']);
    }
    $result = mysqli_stmt_execute($stmt);
    return confirm_query_result($result);
}

function find_all_bridges()
{
    global $db;
    $sql = "SELECT * FROM `bridges` ";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_bridge_by_id($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `bridges` where bridgeID = '$id'";
    $result = mysqli_query($db, $sql);
    $bridge = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $bridge;
}

function update_bridge($bridge)
{
    global $db;
    $bridge['height'] = ($bridge['height'] == null) ? null : $bridge['height'];
    $bridge['clb'] = ($bridge['clb'] == null) ? null : $bridge['clb'];
    $bridge['width'] = ($bridge['width'] == null) ? null : $bridge['width'];
    $bridge['span'] = ($bridge['span'] == null) ? null : $bridge['span'];
    $sql = "UPDATE `Bridges` SET `name`=?,`official name`=?,`other name(s)`=?,`status`=?,`construction begin`=?,`construction end`=?,opened=?,country=?,`location`=?,crossed=?,structure=?,material=?,`total length`=?,height=?,`clerance below`=?,width=?,span=?,designer=?,`maintained by`=?,`heritage status`=?,`description`=?,`map url`=? WHERE bridgeID =?;";
    $stmt = mysqli_stmt_init($db);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssssssdddddsssssi", $bridge['name'], $bridge['ofname'], $bridge['othname'], $bridge['status'], $bridge['begin'], $bridge['end'], $bridge['opened'], $bridge['country'], $bridge['location'], $bridge['crossed'], $bridge['structure'], $bridge['material'], $bridge['length'], $bridge['height'], $bridge['clb'], $bridge['width'], $bridge['span'], $bridge['designer'], $bridge['mtb'], $bridge['hts'], $bridge['description'], $bridge['mapurl'], $bridge['id']);
    }
    $result = mysqli_stmt_execute($stmt);
    return confirm_query_result($result);
}

function delete_bridge($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "DELETE FROM `Bridges` WHERE bridgeID = '$id' LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function get_total_bridges_count(){
    global $db;
    $sql = "SELECT COUNT(*) FROM `bridges`";
    $result = mysqli_query($db, $sql);
    $result = confirm_query_result($result);
    $bridges_count = mysqli_fetch_array($result);
    mysqli_free_result($result);
    return $bridges_count[0];
}

function find_bridges_by_page($offset,$total_bridges_per_page){
    global $db;
    $offset = mysqli_real_escape_string($db,$offset);
    $total_bridges_per_page = mysqli_real_escape_string($db,$total_bridges_per_page);
    $sql = "SELECT * FROM `bridges` LIMIT $offset,$total_bridges_per_page";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

//database Admin -------->
function insert_admin($admin)
{
    global $db;
    $name = mysqli_real_escape_string($db, $admin['name']);
    $email = mysqli_real_escape_string($db, $admin['email']);
    $pwd = mysqli_real_escape_string($db, sha1($admin['pwd']));
    $sql = "INSERT INTO `Admins` (adminName,email,password_hash) VALUES ('$name','$email','$pwd')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_all_admins()
{
    global $db;
    $sql = "SELECT * FROM Admins";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_admin_by_id($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `Admins` where adminID = '$id'";
    $result = mysqli_query($db, $sql);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

function update_admin($admin)
{
    global $db;
    $name = mysqli_real_escape_string($db, $admin['name']);
    $email = mysqli_real_escape_string($db, $admin['email']);
    $pwd = mysqli_real_escape_string($db, sha1($admin['pwd']));
    $id = mysqli_real_escape_string($db, $admin['id']);
    $sql = "UPDATE `Admins` SET adminName='$name',email='$email',password_hash='$pwd'  WHERE adminID = '$id'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_admin($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "DELETE FROM `Admins` WHERE adminID = '$id' LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}


//relationship ------>
function get_images_by_bridgeID($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM Images WHERE bridgeID = '$id'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function get_categories_by_bridgeID($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM Categories WHERE categoryID in ";
    $sql .= "(SELECT categoryID FROM Bridge_Category WHERE bridgeID = '$id')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function clear_categories_from_bridge($bridgeID)
{
    global $db;
    $bridgeIDd = mysqli_real_escape_string($db, $bridgeID);
    $sql = "DELETE FROM Bridge_Category WHERE bridgeID = '$bridgeID'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function categorize_bridge($bridgeID, $categoryID_set)
{
    global $db;
    $bridgeIDd = mysqli_real_escape_string($db, $bridgeID);
    $sql = "INSERT IGNORE INTO Bridge_Category (bridgeID,categoryID) VALUES ";
    foreach ($categoryID_set as $categoryID) {
        $categoryID = mysqli_real_escape_string($db, $categoryID);
        $sql .= "('$bridgeID','$categoryID'),";
    }
    $sql = substr($sql, 0, -1);
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
//database Category ---- >
function insert_category($category)
{
    global $db;
    $name = mysqli_real_escape_string($db, $category['name']);
    $sql = "INSERT INTO `categories` (categoryName) VALUES ('$name')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_all_categories()
{
    global $db;
    $sql = "SELECT * FROM `Categories`";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_category_by_id($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `Categories` where categoryID = '$id'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category;
}

function update_category($category)
{
    global $db;
    $name = mysqli_real_escape_string($db, $category['name']);
    $id = mysqli_real_escape_string($db, $category['id']);
    $sql = "UPDATE `Categories` SET categoryName='$name'  WHERE categoryID = '$id'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_category($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "DELETE FROM `Categories` WHERE categoryID = '$id' LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
//database Image ---->

function isImageNameUnique($imageName)
{
    global $db;
    $imageName = mysqli_real_escape_string($db, $imageName);
    $sql = "SELECT * FROM `Images` WHERE link = '../img/$imageName'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $count = mysqli_num_rows($result);
    mysqli_free_result($result);
    return $count == 0;
}

function insert_image($image)
{
    global $db;
    $link = mysqli_real_escape_string($db, $image['link']);
    $bridgeID = mysqli_real_escape_string($db, $image['bridgeID']);
    $sql = "INSERT INTO `Images` (link,bridgeID) VALUES ('$link','$bridgeID')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

// function add 

function find_all_images()
{
    global $db;
    $sql = "SELECT * FROM `Images`";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_image_by_id($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `Images` where imageID = '$id'";
    $result = mysqli_query($db, $sql);
    $image = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $image;
}

function update_image($image)
{
    global $db;
    $id = mysqli_real_escape_string($db, $image['id']);
    $link = mysqli_real_escape_string($db, $image['link']);
    $bridgeID = mysqli_real_escape_string($db, $image['bridgeID']);
    $id = mysqli_real_escape_string($db, $image['id']);
    $sql = "UPDATE `Images` SET link='$link',bridgeID = '$bridgeID'  WHERE imageID = '$id'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_image($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "DELETE FROM `Images` WHERE imageID = '$id' LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function checkAdminAuthentication($name, $pwd)
{
    global $db, $errors;
    $name = mysqli_real_escape_string($db, $name);
    $pwd = mysqli_real_escape_string($db, sha1($pwd));
    $sql = "SELECT * FROM Admins WHERE adminName = '$name'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $count = mysqli_num_rows($result);
    mysqli_free_result($result);
    if ($count == 0) {
        $errors['loginName'] = "There is no such username.";
    } else {
        $sql = "SELECT * FROM Admins WHERE adminName = '$name' AND password_hash = '$pwd'";
        $result = mysqli_query($db, $sql);
        confirm_query_result($result);
        $count = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($count == 0) {
            $errors['loginPwd'] = "Wrong password.";
        }
    }
}

function checkCookie($cookie){
    global $db;
    $cookie = mysqli_real_escape_string($db, $cookie);
    $sql = "SELECT COUNT(*) FROM `admins` WHERE adminName = '$cookie'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $result = mysqli_fetch_array($result);
    $count = $result[0];
    mysqli_free_result($result);
    return $count==1;
}

function get_bridges_by_categoryID($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `Bridges` WHERE bridgeID in ";
    $sql .= "(SELECT bridgeID FROM Bridge_Category WHERE categoryID = '$id')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function make_slide_indicators($bridgeID)
{
    $image_set = get_images_by_bridgeID($bridgeID);
    $output = '';
    $row_count = mysqli_num_rows($image_set);
    for ($i = 0; $i < $row_count; $i++) {
        if ($i == 0) {
            $output .= '<li data-target="#bridgeImages" data-slide-to="' . $i . '" class="active"></li>';
        } else {
            $output .= '<li data-target="#bridgeImages" data-slide-to="' . $i . '"></li>';
        }
    }
    return $output;
}

function make_slides($bridgeID)
{
    $image_set = get_images_by_bridgeID($bridgeID);
    $output = '';
    $count = 0;
    while ($image = mysqli_fetch_assoc($image_set)) {
        if ($count == 0) {
            $output .= '<div class="carousel-item active"><div class="embed-responsive embed-responsive-1by1">';
        } else {
            $output .= '<div class="carousel-item"><div class="embed-responsive embed-responsive-1by1">';
        }
        $output .= '<img class="embed-responsive-item" src="' . $image['link'] . '"></div></div>';
        $count++;
    }
    mysqli_free_result($image_set);
    return $output;
}

function set_thumbnail($bridgeID,$imageID)
{
    global $db;
    $bridgeID = mysqli_real_escape_string($db, $bridgeID);
    $imageID = mysqli_real_escape_string($db, $imageID);
    $sql = "INSERT INTO thumbnails (bridgeID,imageID) VALUES('$bridgeID','$imageID') ON DUPLICATE KEY UPDATE imageID = '$imageID'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function get_thumbnail($id)
{
    global $db;
    $id = mysqli_real_escape_string($db, $id);
    $sql = "SELECT * FROM `Images` WHERE imageID = ";
    $sql .= "(SELECT imageID FROM thumbnails WHERE bridgeID = '$id')";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $thumbnail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $thumbnail;
}

function get_related_bridges($bridgeID)
{
    global $db;
    $bridgeID = mysqli_real_escape_string($db, $bridgeID);
    $sql = "SELECT DISTINCT * FROM `Bridges` WHERE bridgeID <> '$bridgeID' AND bridgeID in ";
    $sql .= "(SELECT bridgeID FROM Bridge_Category WHERE categoryID in ";
    $sql .= "(SELECT categoryID FROM Bridge_Category WHERE bridgeID = '$bridgeID'))";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function search($input)
{
    global $db;
    $input = mysqli_real_escape_string($db, $input);
    $sql = "SELECT * FROM `Bridges` WHERE `name` like '%$input%' or country like '%$input%'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function select_country_distinct()
{
    global $db;
    $sql = "SELECT DISTINCT `country` FROM `bridges`";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_country_by_category($categoryID)
{
    global $db;
    $sql = "SELECT DISTINCT `country` FROM `bridges` WHERE bridgeID in ";
    $sql .= "(SELECT bridgeID FROM Bridge_Category WHERE categoryID = '$categoryID')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}


function find_bridges_by_country($country)
{
    global $db;
    $country = mysqli_real_escape_string($db, $country);
    $sql = "SELECT * FROM `bridges` WHERE country = '$country'";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_bridges_by_category_country($categoryID, $country)
{
    global $db;
    $categoryID = mysqli_real_escape_string($db, $categoryID);
    $country = mysqli_real_escape_string($db, $country);
    $sql = "SELECT * FROM `Bridges` WHERE country = '$country' AND bridgeID in ";
    $sql .= "(SELECT bridgeID FROM Bridge_Category WHERE categoryID = '$categoryID')";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
