$('.tj').click(function () {
    var name = $('#name').val();
    var age = $('#age').val();
    var sex = $('#sex').val();
    var _token = $("input[name='_token']").val()
    console.log(name + '' + age + '' + sex + '' + _token);
    $.post('/add', {'name': name, 'age': age, 'sex': sex, '_token': _token}, function (res) {
        console.log(res)
        if(res['code'] == 500){
            $('.er').css('display','block');
            $('.er').text(res['data']);
        }
        if (res['code'] == 200){
                alert(res['message'])
            window.location.reload()
        }
        if (res['code'] == 205){
            alert(res['message'])
            window.location.reload()
        }
    })
})
$('.xg').click(function () {
    var name = $('#names').val();
    var age = $('#ages').val();
    var sex = $('#sexs').val();
    var ids = $('#ids').val();
    var _token = $("input[name='_token']").val()
    console.log(name + '' + age + '' + sex+''+ids);
    $.post('/up', {'name': name, 'age': age, 'sex': sex, '_token': _token,'id':ids}, function (res) {
        if (res['code'] == 200){
            alert(res['message'])
            window.location.reload()
        }
        if (res['code'] == 205){
            alert(res['message'])
            window.location.reload()
        }
        if(res['code'] == 500){
            $('.er').css('display','block');
            $('.er').text(res['data']);
        }
    })
})

function del(id) {
    console.log(id)
    $.post('/del',{'id':id},function (res) {
        if (res['code'] == 200){
            alert(res['message'])
            window.location.reload()
        }
        if (res['code'] == 204){
            alert(res['message'])
            window.location.reload()
        }
    })
}

