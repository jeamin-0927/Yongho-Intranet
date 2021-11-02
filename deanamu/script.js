$.ajax({
    url:'header.php',
    success:function(data){
        $('.header').html(data);
        $(window).scrollTop('0');
    }
});
function getCookie(name) {
    //alert('get' + name);
    var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return value ? value[2] : null;
}
function deleteCookie(name) {
    //alert('del' + name);
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function setCookie(name, value, exp = 99999999) {
    //alert('set' + name);
    deleteCookie(name);
    var date = new Date();
    date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000);
    document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
}
function content(Qnumber){
    $.ajax({
        url:'content.php',
        data: {
            id: Qnumber
        },
        method: 'GET',
        async: false,
        success:function(data){
            $('body').append(data);
        }
    });
}
function DBput(Qtitle, Qcontent, Qtag, Qpassword, Qadmin, Qip){
    $.ajax({
        url:'put.php',
        data: {
            admin: Qadmin,
            type: 'put',
            password: Qpassword,
            ip: Qip,
            title: Qtitle,
            content: Qcontent,
            tag: Qtag
        },
        method: 'POST',
        success:function(data){
            alert(data);
            if(data == '성공적으로 DB에 추가하였습니다.'){
                setCookie('yonghowifi', Qpassword);
                location.reload();
            }
        }
    });
}
function Onput(){
    var Qtitle = $('#title').val();
    var Qcontent = $('#content').val();
    var Qtag = $('#tag').val();
    var Qpassword = 'yonghoms826';
    var Qadmin = $('#admin').val();
    var Qip = $('#ip').val();
    if(Qtitle.length > 20){
        alert('제목 글자 수를 초과하였습니다.');
    }
    else if(Qcontent.length > 3000){
        alert('본문 글자 수를 초과하였습니다.');
    }
    else{
        DBput(Qtitle, Qcontent, Qtag, Qpassword, Qadmin, Qip);
    }
}
function show(j){
    var ns = 1;
    for(var i = j; i > j - ns; i--){
        if(i > 0){
            content(i);
        }
    }
    cnt = cnt - ns;
    show_check();
}
function show_check(){
    var scrollBottom = $(document).height() - ($(document).height() - $(window).height() - $(window).scrollTop());
    var innerHeight = $(document).height();
    if (scrollBottom + 500 >= innerHeight) {
        show(cnt);
    }
}
function fill_out_kl(sq){
    var cg = ' ';
    sq = sq.replace(/\`/g, cg);
    sq = sq.replace(/\~/g, cg);
    sq = sq.replace(/\!/g, cg);
    sq = sq.replace(/\@/g, cg);
    sq = sq.replace(/\#/g, cg);
    sq = sq.replace(/\$/g, cg);
    sq = sq.replace(/\%/g, cg);
    sq = sq.replace(/\^/g, cg);
    sq = sq.replace(/\&/g, cg);
    sq = sq.replace(/\*/g, cg);
    sq = sq.replace(/\(/g, cg);
    sq = sq.replace(/\)/g, cg);
    sq = sq.replace(/\_/g, cg);
    sq = sq.replace(/\-/g, cg);
    sq = sq.replace(/\=/g, cg);
    sq = sq.replace(/\+/g, cg);
    sq = sq.replace(/\\/g, cg);
    sq = sq.replace(/\|/g, cg);
    sq = sq.replace(/\;/g, cg);
    sq = sq.replace(/\:/g, cg);
    sq = sq.replace(/\'/g, cg);
    sq = sq.replace(/\"/g, cg);
    sq = sq.replace(/\,/g, cg);
    sq = sq.replace(/\</g, cg);
    sq = sq.replace(/\>/g, cg);
    sq = sq.replace(/\./g, cg);
    sq = sq.replace(/\//g, cg);
    sq = sq.replace(/\?/g, cg);
    return sq;
}