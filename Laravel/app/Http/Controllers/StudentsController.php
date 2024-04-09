<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Http\Requests\StudentsRequest;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $students;
    // const _PER_PAGE = 3;

    public function __construct(){
        $this->students = new Students();
    }

    public function index(Request $request){
        $title = 'Quản lý học sinh';
        $studentsList = $this->students->getAllStudents();
        return view('students.list', compact('title', 'studentsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $title = 'Thêm người dùng';
        return view('students.add', compact('title'));
    }

    public function postAdd(StudentsRequest $request){
        $dataInsert = [
            'name' => $request->name,
            'phone' => $request->phone,
            // 'create_at' => date('Y-m-d H:i:s')
        ];

        $this->students->addStudent($dataInsert);
        return redirect()->route('students.students')->with('msg', 'Thêm người dùng thành công');
    }

    public function getEdit(Request $request, $id=0){
        $title = 'Cập nhật người dùng';
        
        if (!empty($id)) { //Kiểm tra xem id có tồn tại hay không 
            $studentDetail = $this->students->getDetail($id);
            if (!empty($studentDetail[0])) {
                $request->session()->put('id', $id);

                $studentDetail = $studentDetail[0];
            } else {
                return redirect()->route('students.students')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('students.students')->with('msg', 'Liên kết không tồn tại');
        }
        return view('students.edit', compact('title', 'studentDetail'));
    }

    public function postEdit(StudentsRequest $request){
        $id = session('id');
        if (empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        $dataUpdate = [
            'name' => $request->name,
            'phone' => $request->phone,
            // 'update_at' => date('Y-m-d H:i:s')
        ];

        $this->students->updateStudent($dataUpdate, $id);
        return back()->with('msg','Cập nhật người dùng thành công');
    }

    public function delete($id=0){
        if (!empty($id)) { //Kiểm tra xem id có tồn tại hay không 
            $studentDetail = $this->students->getDetail($id);
            if (!empty($studentDetail[0])) {
                $deleteStatus = $this->students->deleteStudent($id);
                if ($deleteStatus){
                    $msg = 'Xóa người dùng thành công';
                }else{
                    $msg = 'Bạn không thể xóa người dùng lúc này. Vui lòng thử lại sau.';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } 
        return redirect()->route('students.students')->with('msg', $msg);
    }
}

