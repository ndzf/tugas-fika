<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\StudentEntity;
use App\Models\StudentModel;
use CodeIgniter\I18n\Time;

class StudentController extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        $date = Time::parse("now", "Asia/Jakarta");

        $data = [
            "date"				=> $date->toDateString(),
            "students"			=> $this->studentModel->findAll()
        ];

        return view("students/index", $data);
    }

    public function create()
    {
        $inputs = esc($this->request->getPost());

        $student = new StudentEntity();
        $student->fill($inputs);

        try {
            $this->studentModel->save($student);
            return redirect()->to("/students")->with("successMessage", "Berhasil menyimpan data siswa");
        } catch(\Exception $e) {
            return redirect()->to("/students")->with("errorMessage", $e->getMessage());
        }
    }

    public function edit($id)
    {
        $student = $this->studentModel->find($id);
        if (empty($student)) {
            throw new \Exception("Student Not Found", 404);
        }
        if ($this->request->isAJAX()) {
            return json_encode($student);
        }
    }

    public function update($id)
    {
        $inputs = esc($this->request->getPost());

        $student = $this->studentModel->find($id);
        if (empty($student)) {
            throw new \Exception("Student Not Found", 404);
        }

        $student->fill($inputs);
        try {
            $this->studentModel->save($student);
            return redirect()->to("/students")->with("successMessage", "Berhasil memperbaharui data siswa");
        } catch(\Exception $e) {
            return redirect()->to("/students")->with("errorMessage", $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->studentModel->where("id", $id)->delete();
            return redirect()->to("/students")->with("successMessage", "Berhasil menghapus data siswa");
        } catch(\Exception $e) {
            return redirect()->to("/students")->with("errorMessage", $e->getMessage());
        }
    }
}
