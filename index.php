<?php
session_start();

require_once(__DIR__."/auth/check_cookie.php");
require_once(__DIR__."/auth/auth.php");
require_once(__DIR__."/db/db.php");
require_once(__DIR__."/dal/GroupRepository.php");
require_once(__DIR__."/dal/ItemRepository.php");

$auth = new Auth($connection);

if(!isset($_SESSION["email"]))
{
    header("Location: auth/login.php");
}

if(!$auth -> check_user($_SESSION["email"], $_SESSION["heslo"]))
{
    header("Location: auth/login.php");
}

$groups_repo = new GroupRepository($connection);
$groups = $groups_repo -> get_groups_by_user($_SESSION["email"]);

$sqlSelect = $connection -> prepare("Select * FROM USERS WHERE UserName = ?");
$sqlSelect -> bind_param("s", $_SESSION["email"]); 
$sqlSelect -> execute();
$res = $sqlSelect -> get_result();
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $userId = $row["Id"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/auth.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <?php include "./common/favicon.php"; ?>
    <title>TODO — Home</title>
</head>
<body data-userid="<?php echo $userId; ?>">
    <?php include "./common/header.php"?>
    <div class="groups-header">Your <strong>todo</strong> lists:</div>
    <div class="add-list-btn" onclick="addNewGroup(this)">Add new list</div>
    <div class="groups-container">
        <?php 
        foreach ($groups as $index => $group) { ?>
            <div class="form-container" data-open="0" data-groupId="<?php echo $group -> Id; ?>">
                <div class="list-header" contenteditable onblur="updateGroup(this)">
                    <?php echo $group -> Name;?>
                </div>
                <div class="list-content">
                    <?php 
                        $items_repo = new ItemRepository($connection);
                        $items = $items_repo -> get_items_by_group($group -> Id);
                    ?>
                    <div class="items-count">
                        <?php echo "Items count: ".count($items); ?>
                    </div>
                    <div class="items-list">
                        <?php
                            foreach ($items as $index => $item) {
                                ?>
                                <div class="list-item" data-itemId="<?php echo $item -> Id; ?>">
                                    <input 
                                        type="checkbox"
                                        onblur="updateItem(this.parentNode)"
                                        onclick="updateItem(this.parentNode)"
                                        value="<?php echo $item -> Content; ?>" 
                                        <?php if($item -> Done){ echo "checked";} ?>>
                                    <div contenteditable class="list-item-content" onblur="updateItem(this.parentNode)"><?php echo $item -> Content;?></div>
                                    <div class="list-item-control" title="Delete" onclick="deleteItem(this.parentNode)"></div>
                                </div>
                            <?php }
                        ?>
                        <div class="list-item" onclick="addNewItem(this)">
                            <input type="checkbox" class="add-item" disabled>
                            <div class="list-item-content">Add item</div>
                        </div>
                    </div>
                </div>
                <div class="list-content" data-type="date">
                    <?php 
                        if($group -> UpdatedOn === null)
                        {
                            echo "Created: ".date("m/d/Y", strtotime($group -> CreatedOn));
                        }
                        else{
                            echo "Updated: ".date("m/d/Y", strtotime($group -> UpdatedOn));
                        }
                    ?>
                </div>
                <div class="list-controls">
                    <div class="list-control">
                        <div class="list-control-icon" data-type="expand" onclick="expandClick(this.parentNode.parentNode.parentNode)"></div>
                    </div>
                    <div class="list-control">
                        <div class="list-control-icon" data-type="delete" title="Delete" onclick="deleteGroup(this.parentNode.parentNode.parentNode)"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include "./common/footer.php"; ?>
    <?php include "./common/responsive_nav.php"; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/async.js"></script>
<script src="js/script.js"></script>
<script src="js/repository.js"></script>
<script src="js/groupRepository.js"></script>
<script src="js/itemRepository.js"></script>
<script src="js/itemOperations.js"></script>
<script src="js/groupOperations.js"></script>

</html>