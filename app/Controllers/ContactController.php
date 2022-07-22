<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct($router)
    {
        parent:: __construct($router);
    }

    public function index(): void
    {
        echo $this->view->run('contact',[
            'title'=>'UX | contact'
        ]);
    }
    public function store(array $request)
    {
        $contact = new Contact();
        //  validations 
        $validation = $this->validator->make($request, [
            'name' => 'required|max:225',
            'email' => 'required|email|max:225',
            'message' => 'required|min:10',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            $data = [
                'status' => 400,
                'errors' => $errors->firstOfAll(),
            ];
        } else {
            $contact->name = $request['name'];
            $contact->email = $request['email'];
            $contact->message = $request['message'];
            if ($contact->save()) {
                $data = [
                    'status' => 201,
                    'message' => 'Your message has been successfully sent. We will get back to you as soon as we can.',
                ];
            } else {
                $data = [
                    'status' => 400,
                    'message' => 'Ooops! Unable to send the message. Try again.',
                    'error' => $contact->fail(),
                ];
            }
        }

        echo json_encode($data);
            
    }
    
}
