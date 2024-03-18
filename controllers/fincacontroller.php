<?php

require_once('../models/FincaModel.php');

class FincaController {
    private $model;

    public function __construct() {
        $this->model = new FincaModel();
    }
    public function index() {
        $fincas = $this->model->getFincas();
        include('../views/fincas/index.php');
    }
    public function add() {
        include('../views/fincas/add.php');
    }
    public function store($data) {
        $this->model->addFinca($data);
        header('Location: index.php');
    }
    public function edit($nombre) {
        $finca = $this->model->getFincaByNombre($nombre);
        include('../views/fincas/edit.php');
    }
    public function update($nombre, $data) {
        $this->model->updateFinca($nombre, $data);
        header('Location: index.php');
    }
    public function delete($nombre) {
        $this->model->deleteFinca($nombre);
        header('Location: index.php');
    }
}

?>
