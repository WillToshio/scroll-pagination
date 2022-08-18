<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Article();

        $data = [
            'page' => 'index',
            'articles' => $model->paginate(15),
            'pager' => $model->pager,
        ];
        
        return view('dashboard', $data);
    }
    public function fetch(){
        
        $limits = $this->request->getVar('limit');
        $offset = $this->request->getVar('offset');

        $model = new \App\Models\Article();
        if($offset == 90){
            $limits = 10;
        }
        if($offset > 91){
            return json_encode([
                'err' => true,
                'msg' => 'Não há mais nenhum dado a ser buscado!'
            ]);
        }
        $data = [
            'articles' => $model->findAll($limits, $offset),
        ];
        return json_encode($data);
    }
}
