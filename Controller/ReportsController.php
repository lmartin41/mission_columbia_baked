<?php

App::uses('AppController', 'Controller');

class ReportsController extends AppController {
    
public function index() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->paginate());
         if ($this->request->is('post')) {
            $results = $this->Client->find('all');
            $correctResults = null;
            $lastName = $this->request->data['Client']['last_name'];
            $firstName = $this->request->data['Client']['first_name'];
            foreach ($results as $current) {
                if ($current['Client']['first_name'] == $firstName && $current['Client']['last_name'] == $lastName) {
                    $correctResults = $current;
                }
            }
            $this->Session->write('results', $correctResults);
            $this->redirect(array('action' => 'searchResults'));
        }
    }
    }
?>
