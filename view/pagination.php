<?php
class pagination_bar {
    private $text;
    private $color;

    public function __construct($text, $color) {
        $this->text = $text;
        $this->color = $color;
    }

    public function generateHtml() {
        
        return '<button style="background-color: ' . $this->color . '">' . $this->text . '</button>';
    }
}

// Example usage
$button = new pagination_bar('Click me!', 'red');
echo $button->generateHtml();
?>

