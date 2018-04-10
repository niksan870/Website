<?php

class Bootstrap {

    //Initiaizing key values
    //class object
    private $controller;
    //method
    private $action;
    //$_GET url
    private $request;

    //Creating home page if the ulr is empty
    public function __construct($request) {
        //Array ( [controller] => home [action] => [id] => )
        $this->request = $request;
        if ($this->request['controller'] == "") {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if ($this->request['action'] == "") {
            $this->action = 'Index';
        } else {
            $this->action = $this->request['action'];
        }
    }

    //Check if everything with the controllers is okay
    public function createController() {

        //If controller class does exist (11)
        if (class_exists($this->controller)) {

            //Array ( [Controller] => Controller ) 1
            $parents = class_parents($this->controller);

            //Check if the $this->controller has descendances
            //So, basically if it has base Controller
            if (in_array("Controller", $parents)) {

                $_SESSION['profile_path'] = $this->action;
                //If in Existing Controller $this->action method exists.
                if (method_exists($this->controller, $this->action)) {


                    if ($_SESSION['profile_path'] != 'Index') {
                        $_SESSION['profile_path'] = "../";
                    } else {
                        $_SESSION['profile_path'] = '';
                    }

                    //return new Controller($this->action, $this->request);
                    return new $this->controller($this->action, $this->request);
                } else {
                    // Method Does Not Exist
                    echo '<h1>Method does not exist</h1>';
                    return;
                }
            } else {
                // Base Controller Does Not Exist
                echo '<h1>Base controller not found</h1>';
                return;
            }
        } else {
            // Controller Class Does Not Exist
            echo '<h1>Controller class does not exist</h1>';
            return;
        }
    }

}
