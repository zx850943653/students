<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>学员管理</title>
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">学生信息</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger er" role="alert" style="display: none">
                        A simple danger alert—check it out!
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">姓名:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">年龄:</label>
                            <input type="text" class="form-control" id="age">
                         </div>
                         <div class="form-group">
                             <label for="exampleFormControlSelect1">性别</label>
                             <select class="form-control" id="sex">
                                 <option>男</option>
                                 <option>女</option>
                             </select>
                         </div>
                         @csrf
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                     <button type="button" class="btn btn-primary tj">提交</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="container">
     <table class="table">
         <thead class="thead-dark">
         <tr>
             <th scope="col">id</th>
             <th scope="col">姓名</th>
             <th scope="col">年龄</th>
             <th scope="col">性别</th>
             <th scope="col">创建时间</th>
             <th scope="col">更新时间</th>
             <th scope="col">操作</th>
         </tr>
         </thead>
         <tbody>
         @foreach($stu as $re)
         <tr>
             <th scope="row">{{$re['id']}}</th>
             <td>{{$re['name']}}</td>
             <td>{{$re['age']}}</td>
             <td>{{$re['sex']}}</td>
             <td>{{$re['created_at']}}</td>
             <td>{{$re['updated_at']}}</td>
             <td>
                 <button type="button" class="btn btn-secondary" onclick="del({{$re['id']}})">删除</button>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xg" data-whatever="@mdo">修改</button>
                 <div class="modal fade" id="xg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">学生信息</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <div class="alert alert-danger er" role="alert" style="display: none">
                                     A simple danger alert—check it out!
                                 </div>
                                 <form>
                                     <div class="form-group">
                                         <label for="recipient-name" class="col-form-label">姓名:</label>
                                         <input type="text" class="form-control" id="names" value="{{$re['name']}}">
                                     </div>
                                     <div class="form-group">
                                         <label for="message-text" class="col-form-label">年龄:</label>
                                         <input type="text" class="form-control" id="ages" value="{{$re['age']}}">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleFormControlSelect1">性别</label>
                                         <select class="form-control" id="sexs">
                                             @if($re['sex'] == '男')
                                             <option>男</option>
                                             <option>女</option>
                                             @else
                                             <option>女</option>
                                              <option>男</option>
                                             @endif
                                         </select>
                                     </div>
                                     @csrf
                                     <input type="hidden" id="ids" value="{{$re['id']}}">
                                 </form>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                 <button type="button" class="btn btn-primary xg">修改</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </td>
         </tr>
         @endforeach
         </tbody>
     </table>
     {{ $stu->links() }}
 </div>

 <!-- Optional JavaScript; choose one of the two! -->

 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
 <script src="/js/bootstrap.bundle.min.js"></script>
 <script src="/js/students.js"></script>
 </body>
 </html>
