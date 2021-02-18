<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $table = 'stu';
    protected $fillable = ['name', 'age', 'sex'];

    /**
     * 分页获取全部
     * @return mixed
     */
    public static function getAllByPage()
    {
        $res = self::orderBy('id', 'desc')->paginate(15);
        return $res;
    }

    /**
     * 删除数据
     * @param $id
     */
    public static function del($id)
    {
        $res = self::destroy($id);
        return $res;
    }

    /**
     * 修改数据
     * @param $data
     * @return mixed
     */
    public static function up($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $res = self::where('id', $id)->update($data);
        return $res;
    }

    /**
     * 添加数据
     * @param $data
     */
    public static function add($data)
    {
        $res = self::create($data);
        return $res;
    }
}
