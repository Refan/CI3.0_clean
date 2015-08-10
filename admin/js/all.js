$(document).ready(function(){

    //=================刪除=================
    $(".delete").click(function(){
        var obj = $(this);
        var controllers = (obj.attr("controllers")) ? obj.attr("controllers") : "";
        var functions = (obj.attr("functions")) ? obj.attr("functions") : "";
        var id = obj.parent().parent("tr").prop("id");
        if(!id) return;
        var file = (obj.attr("file")) ? obj.attr("file") : "";
        swal({
          title: "Are you sure?",
          text: "您將無法恢復，確定要刪除此筆資料?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
              $.ajax({type: "POST", dataType: "html", url: "/admin.php/" + controllers + "/" + functions,
                  data: {
                      id: id,
                      file: file
                  },
                  success: function(){
                      $("#"+id).remove();
                      swal("Deleted!", "您的資料已刪除成功。", "success");
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown){
                      swal("Error!", "意外錯誤", "error");
                  }
              });
          } else {
            swal("Cancelled!", "您已取消刪除。", "error");
          }
        });
    }); 

	//=================防呆 start=================
	$('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
		var $form = $(this).closest('form'),
            $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
            
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "password") {
			state = $("#pwd1").val()!="" && $("#pwd1").val() == $("#pwd2").val() ? true : false;
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length >= $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'glyphicon glyphicon-ok');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'glyphicon glyphicon-remove');
		}
        
        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="submit"]').prop('disabled', false);
        }else{
            $form.find('[type="submit"]').prop('disabled', true);
        }
	});
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
    //=================防呆 end=================
	
	//x-editable
	$.fn.editable.defaults.mode = 'inline';
});

//=================cookie.js=================
function setCookie(c_name,value,expiredays,path)
{
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())+
    ((path==null) ? ";path=/" : ";path="+path)
}
function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        { 
            c_start=c_start + c_name.length+1 
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return decodeURI(document.cookie.substring(c_start,c_end))
        } 
    }
    return ""
}
