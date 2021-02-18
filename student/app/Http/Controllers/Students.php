<?php

namespace App\Http\Controllers;

use App\Http\Requests\StuRequest;
use App\model\Students as Stu;
use Illuminate\Http\Request;

class Students extends Controller
{
    public function index()
    {
        $res = Stu::getAllByPage();
        return view('index', ['stu' => $res]);
    }

    public function add(StuRequest $stuRequest)
    {
        $data = \request()->post();
        unset($data['_token']);
        $res = Stu::add($data);
        if ($res) {
            return response()->json(['code' => 200, 'message' => '添加成功'], 200);
        } else {
            return response()->json(['code' => 205, 'message' => '添加失败'], 200);
        }
    }

    public function del()
    {
        $id = \request()->post('id');
        $res = Stu::del($id);
        if ($res) {
            return response()->json(['code' => 200, 'message' => '删除成功'], 200);
        } else {
            return response()->json(['code' => 205, 'message' => '删除失败'], 200);
        }
    }

    public function up(StuRequest $stuRequest){
        $data = \request()->post();
        unset($data['_token']);
        $res=Stu::up($data);
        if ($res) {
            return response()->json(['code' => 200, 'message' => '修改成功'], 200);
        } else {
            return response()->json(['code' => 205, 'message' => '修改失败'], 200);
        }
    }
}
