<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Contact;

class PanelController extends Controller
{
    public function __construct($router)
    {
        parent:: __construct($router);
    }

    public function home()
    {
        $this->router->redirect("contact.index");
    }
    public function index(): void
    {
        $contact = new Contact();
        echo $this->view->run('panel',[
            'title'=>'UX | panel',
            'contacts' => $contact->find()->order('created_at ASC')->fetch(true),
        ]);
    }
    
}
