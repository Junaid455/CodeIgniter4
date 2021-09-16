<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use CodeIgniter\Files\File;

class PostController extends BaseController
{
    public function index()
    {}

    public function create()
    {
        if ($this->request->getMethod() !== 'post') {
            return view ('posts/create');
        }
        $model = new Post();
        // $file = new File($this->request->getFile('thumbnail'));
        // $ext = $file->guessExtension();
        // $save = $file->move(WRITEPATH.'uploads'.$file->getRandomName().".{$ext}");
        $fields = [
            'title' => 'required|min_length[5]',
            'body' => 'required',
            // 'thumbnail' => 'required',
        ];
        $validated = $this->validate($fields);
        if (!$validated) {
            return view ('posts/create');
        }
        $insert = $model->insert([
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'),'-',true),
            'body' => $this->request->getPost('body'),
            // 'thumbnail' => $save->getBasename(),
        ]);
        if($insert) {
            return redirect('posts')->with('message', 'Record Inserted'); 
        }
        else {
            return redirect('/posts/create')->withInput();
        }
    }

    public function show($slug)
    {}

    public function edit($slug)
    {}

    public function delete($slug)
    {}
}
