<?php

abstract class Controller {

    protected $request;
    protected $action;

    //Assignining key values.
    public function __construct($action, $request) {

        //If its inserted by ulr the method will be = $this->action
        $this->action = $action;

        //( [controller] => home [action] => [id] => )
        $this->request = $request;
        
    }

    //Execute the method in one of the controllers.
    public function executeAction() {
        //It's is equal to $this->Insert();
        return $this->{$this->action}();
    }

    //Preparing the view it is not preapred go the the main.php
    //also relates to the controller!
    //get_class($this) what ever extention controller is, Idont knwo what fulview s for
    protected function returnView($viewmodel, $fullview) {



        $view = 'views/' . get_class($this) . '/' . $this->action . '.php';
        if ($fullview) {
            require('views/main.php');
        } else {
            require($view);
        }
    }

}
