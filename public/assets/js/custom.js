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
      console.log(resp);
    });
    return false;
});

$(document).on("click", ".category_status",function () {
    var id=$(this).attr('data-id');
    //alert(BASE_URL);
    $.get(BASE_URL+'/admin/category_status/'+id,function(fb){
        alert('Status updated successfully');
    });
});