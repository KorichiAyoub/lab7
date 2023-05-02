<?php 

include("../init.php");

class Pagination {
    private $conn;
    public $number_per_page;
    public function __construct($conn) {
        $this->conn = $conn;
        $this->number_per_page = 5;
    }

    public function get_limited_items( $offset) {
        

        #$stmt = $this->conn->query(, $offset, $number_per_page)->fetchAll();
        $stmt = $this->conn->query('SELECT * FROM items LIMIT ?,?', $offset,$this->number_per_page);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_items() {
        

        #$stmt = $this->conn->query(, $offset, $number_per_page)->fetchAll();
        $stmt = $this->conn->query('SELECT * FROM items ');
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_page_number()
    {
        return $this->number_per_page;
    }
   
    public function numberofitems($array)
    {
        return count($array);
    }
    public function numberofpages()
    {
      
        return  count($this->get_items())/$this->number_per_page;
    }
    public function generateHtml($array) {
        
       
  $html = '<nav aria-label="Page navigation example">
             <ul class="pagination">';
  for ($i = 0; $i < $this->numberofpages($array); $i++) {
      $html .= "<li class='page-item'><a class='page-link' href='index.php?action=list&page=$i'>page" . $i . '</a></li>';
  }
  $html .= '</ul></nav>';
  
  return $html;
    }
}


?>