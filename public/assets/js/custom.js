$(document).on("submit", ".database_operation",function () {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url,data,function(fb){
      var resp = JSON.parse(fb);
      if (resp.status == 'true') {
          alert(resp.message);
          setTimeout(() => {
              window.location.href=resp.reload;
          }, 1000);
      }
      else{
        alert(resp.message); 
      }
      console.log(resp);
    });
    return false;
});

$(document).on("click", ".category_status",function () {
    var id=$(this).attr('data-id');
    var base_url =$('head base').attr('href');
    $.get(base_url+'/admin/category_status/'+id,function(fb){
        alert('Status updated Successfully');
    });
});



$(document).on("click", ".exam_status",function () {
    var id=$(this).attr('data-id');
    var base_url =$('head base').attr('href');
    $.get(base_url+'/admin/exam_status/'+id,function(fb){
        alert('Status updated Successfully');                  
    });
});


$(document).on("click", ".student_status",function () {
    var id=$(this).attr('data-id');
    var base_url =$('head base').attr('href');
    $.get(base_url+'/admin/student_status/'+id,function(fb){
        alert('Status updated Successfully');                  
    });
});