<?php


switch($vars['action']){
    case "list":{
        include("pagination.php");
        //$bar = new pagination_bar();
        $bar = new Pagination($db);
        $number_per_page = $bar->get_page_number();
        if (isset($_GET['page'])) {

            $offset = $_GET['page'] * $number_per_page;
       
         }
        else {
            
             $offset = 0;
         }

            // call the getUsers method to retrieve all users from the database
        $items = $bar->get_limited_items($offset);
        
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }break;
   
  
    case "do_add":{
        $db->query("INSERT INTO items (title, userID) VALUES (?, ?)",$vars['title'], $_COOKIE['username']);
        header("location: index.php");
        exit;        
        
    }break;
    
    case "delete":{
        $db->query("DELETE FROM items WHERE item_id=(?)", $vars['item_id']);
        header("location: index.php");
        exit;        
    }break;
    
    case "do_edit":{
        $db->query("UPDATE items SET title=(?) WHERE item_id=(?)", $vars['item_title'], $vars['item_id']);
        header("location: ../index.php");
        exit;
    }break;
    
    
   
    case "help":{
        //some code here to show help 
        exit;
    }break;
    
    
}

?>