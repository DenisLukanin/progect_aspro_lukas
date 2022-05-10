<?php 
  
namespace Component\Model_create;

class Main extends \Component{


    function render(){
        $form_field = $this->get_target();
        
        aar($form_field);
    }

}

?>