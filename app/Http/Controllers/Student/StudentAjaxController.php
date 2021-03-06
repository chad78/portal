<?php

namespace App\Http\Controllers;

use App\Helpers\DatabaseHelpers;
use Exception;
use App\Student;
use App\Helpers\Helpers;
use App\Helpers\FieldValidation;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Database\Eloquent\Collection;

class StudentAjaxController extends Controller
{
    protected $validation;
    protected $errors;
    protected $request;
    protected $eagerLoad;

    /**
     * Require users to have been authenticated before reaching this page.
     *
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('ajaxShow');
        $this->validation = new FieldValidation();
        $this->errors = false;
        $this->request = new StoreStudentRequest();
        $this->eagerLoad = ['gradeLevel', 'person.user', 'status', 'family'];
    }

    /**
     * Add an error if needed.
     *
     * @param bool $result
     * @param string $item
     * @param string $action
     * @param null $custom_message
     * @return bool|void
     */
    public function attemptAction($result, $item = 'year', $action = 'update', $custom_message = null)
    {
        if ($result) {
            return $result;
        }

        if ($custom_message) {
            $this->errors[] = $custom_message;

            return;
        }

        $this->errors[] = "Could not $action this $item. Please try again.";
    }

    /*
        |--------------------------------------------------------------------------
        | AJAX METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * This returns a json formatted array for the table.
     *
     * @return Student[]|Collection
     */
    public function ajaxShow()
    {
        return Student::with($this->eagerLoad)->get();
    }

    /**
     * Take the given arrays and specified actions and pass them to the CRUD methods
     * below.
     * @return array|bool
     * @throws Exception
     */
    public function ajaxStore()
    {
        $values = request()->all();

        $action = $values['action'];
        $data = $values['data'];
        $return_array = [];

        foreach ($data as $id => $form_data) {
            $this->validation->checkForm($this->request, $form_data);

            if ($errors = $this->validation->hasErrors()) {
                return $errors;
            }

            // EDIT THE GIVEN Student
            if ($action == 'edit') {
                if ($student = $this->update(Student::find($id), $form_data)) {
                    $return_array['data'][] = $student->load($this->eagerLoad);
                }
            }
            // CREATE THE Student
            if ($action == 'create') {
                $student = $this->store($data[$id]);
                $return_array['data'][] = $student->load($this->eagerLoad);
            }
        }

        if ($action == 'remove') {
            foreach ($data as $id => $form_data) {
                $this->destroy(Student::find($id));
            }
        }

        if ($this->errors) {
            $return_array['error'] = $this->errors;
        }

        return $return_array;
    }

    /*
        |--------------------------------------------------------------------------
        | CRUD METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Store the new student.
     *
     * @param $values
     * @return bool
     */
    public function store($values)
    {
        $values = DatabaseHelpers::dbAddAudit($values);

        return $this->attemptAction(Student::create($values), 'student', 'create');
    }

    /**
     * Update the given model.
     *
     * @param Student $student
     * @param $values
     * @return Student|mixed|void
     */
    public function update(Student $student, $values)
    {
        $student = DatabaseHelpers::dbAddAudit($student);
        $this->attemptAction($student->update($values), 'student', 'update');

        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return void
     */
    public function destroy(Student $student)
    {
        $student = DatabaseHelpers::dbAddAudit($student);
        $this->attemptAction($student->delete(), 'student', 'delete');
    }
}
