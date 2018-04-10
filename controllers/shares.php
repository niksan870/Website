<?php

class Shares extends Controller {

    protected function Index() {
        //Assigning $viewmodel to the base class of the ShareModel
        $viewmodel = new ShareModel;
        
        //Throwing $viewmodel->Index()(AKA DAta ), and this true key, whihc i really dont know for what is for,
        $this->returnView($viewmodel->Index(), true);
    }
}
