
    <div class="col shadow main-col bg-white">
      <div class="row bg-primary text-white">
        <div class="col  p-2">
          <h4><?php echo LANG_APP_NAME;?></h4>
        </div>
        <div class="col">
             <div class="float-right p-2" >
            
            
            <form method="POST" style="display:inline;" action="index.php?action=list" >
            
              <select name="filter" type="submit" onchange="this.form.submit()" class="form-select" style="background-color: #007bff; border:none; outline:none;" aria-label="Disabled select example" >
                <option value="" selected>items-type</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="all">All</option>
              </select>
            
          </form>

               <?php 
               if (isset($_COOKIE['is-admin'])) {
                # code...
                echo '<a href="./view/admin/index.php"><b style="color:white;">admin page </b></a>' ;
               } 
                ?>
                <a href="index.php?action=logout"><b style="color:white;">Logout</b></a>
            </div>
        </div>
      </div>
      

    <form action="index.php" method="get">      
      <input type="hidden" name="action" value="do_add"    />
      <div class="row justify-content-between text-white p-2">
        
            <div class="form-group flex-fill mb-2">
              <input id="todo-input" name="title" type="text" class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2"><?php echo LANG_ADD_ITEM;?></button>
        
      </div>
     </form> 
      <div class="row" id="todo-container">
          <?php 
            for ($i=0;$i<count($items);$i++){
            ?>
            
                <div class="col col-12 p-2 todo-item" todo-id="${todo.id}">
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                     <a href="index.php?action=complete"> <input type="checkbox"  ></a>
                    </div>
                  </div>
                  <input type="text" readonly class="form-control " aria-label="Text input with checkbox" value="<?php echo htmlspecialchars($items[$i]['title']);?>">
                  <div class="input-group-append">
                  <button  class="btn btn-outline-secondary bg-danger text-white" type="button"  id="button-addon3" 
                onclick="location='view/edit.php?item_id=<?php echo $items[$i]['item_id'];?>'"
                >
                <?php echo LANG_EDIT_ITEM; ?>
                </button>
                    <button  class="btn btn-outline-secondary bg-danger text-white" type="button"  id="button-addon2" onclick="location='index.php?action=delete&item_id=<?php echo $items[$i]['item_id'];?>'">X</button>
                  </div>
                  </div>
            </div>
            
            <?php
            }
            ?>
      </div>
            <?php 
            
            echo $bar->generateHtml($items);
            ?>
    
    
</div>
    
