jQuery(document).ready(function($) {

	var hidden_id;
	var hidden_title;
	var posts_per_page;

	$('#uwpqsffrom_559').parent('#uwpqsf_id').css("display", "none");

	//for pagination posts "on"
	//check();

	//parameter transfer Ajax
		$(":checkbox").change(function(){
				process_data($(this));
				return false;
		});

		$('body').on('click','.upagievent', function(e) {
			var pagenumber =  $(this).attr('id');

			// < Fot pagination (nastepna and poprzednia)
			var nastepna = parseInt(pagenumber) + 1;
			var poprzednia = parseInt(pagenumber) - 1;
			var lastPage = $('.paginations > a').length - 3;

			setTimeout(function(){

					if(nastepna <= lastPage){
						$('a.nastepna').attr("id", nastepna);
					}else{
						$('a.nastepna').css("display", "none");
						$('span.nastepna').css("display", "inline-block");
						$('a.pagination_last').css("display", "none");
						$('span.pagination_last').css("display", "inline-block");
					}

					if(poprzednia > 0){
						$('a.poprzednia').css("display", "inline-block");
						$('span.poprzednia').css("display", "none");
						$('a.poprzednia').attr("id", poprzednia);
						$('a.pagination_first').css("display", "inline-block");
					  $('span.pagination_first').css("display", "none");
					}else{
						$('a.poprzednia').css("display", "none");
						$('span.poprzednia').css("display", "inline-block");
					  $('a.pagination_first').css("display", "none");
					  $('span.pagination_first').css("display", "inline-block");
					}

			}, 200);
			// >


			var formid = $('#curuform').val();
			upagi_ajax(pagenumber, formid);
			return false;
		});

		 $('body').on('keypress','.uwpqsftext',function(e) {
		  if(e.keyCode == 13){
                e.preventDefault();
                var form = $(this).parent().parent().attr('id');
                if (!form) {
                    id = $(this);
                }else{
                    var id = $('#'+form);
                }
                process_data(id);
		  }
		});

		window.process_data = function ($obj) {
			var ajxdiv = $obj.closest("form").find("#uajaxdiv").val();
			var res = {loader:$('<div />',{'class':'umloading'}),container : $(''+ajxdiv+'')};
            var formid = $obj.parent().parent().attr('id'); //console.log(formid);
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';

			postPerPageAndHiddenId();

			jQuery.ajax({
				 type: 'POST',
				 url: ajax.url,
				 data: ({
           action : 'uwpqsf_ajax',
           getdata:getdata,
           pagenum:pagenum,
           posts_per_page:posts_per_page,
           hidden_id:hidden_id,
           hidden_title:hidden_title
         }),
				 beforeSend:function() {$(''+ajxdiv+'').empty();res.container.append(res.loader);$obj.closest("form").find('input, textarea, button, select').attr("disabled", true);},
				 success: function(html) {
					res.container.find(res.loader).remove();
				  $(''+ajxdiv+'').html(html);
				  $obj.closest("form").find('input, textarea, button, select').attr("disabled", false);
				 }
				 });
		}

		window.upagi_ajax = function (pagenum, formid) {
			var ajxdiv = $(''+formid+'').find("#uajaxdiv").val();
			var res = {loader:$('<div />',{'class':'umloading'}),container : $(''+ajxdiv+'')};
			var getdata = $(''+formid+'').serialize();

			postPerPageAndHiddenId();

			jQuery.ajax({
				 type: 'POST',
				 url: ajax.url,
				 data: ({
           action : 'uwpqsf_ajax',
           getdata:getdata,
           pagenum:pagenum,
           posts_per_page:posts_per_page,
           hidden_id:hidden_id,
           hidden_title:hidden_title
         }),
				 beforeSend:function() {$(''+ajxdiv+'').empty(); res.container.append(res.loader);},
				 success: function(html) {
				  res.container.find(res.loader).remove();
				  $(''+ajxdiv+'').html(html);
				//res.container.find(res.loader).remove();
				 }
			});
		}

	 $('body').on('click', '.chktaxoall, .chkcmfall',function () {

	    $(this).closest('.togglecheck').find('input:checkbox').prop('checked', this.checked);

         });

	//for pagination posts "off"
	//check();


	function check(){
			$('.tchkb-0').click();
	}


	// Post per page and hidden id
	function postPerPageAndHiddenId(){
			posts_per_page = $('select#select_post_per_page option:selected').val();

      hidden_id = $('#hidden_id_posts').val();
      hidden_id = (hidden_id != undefined) ? hidden_id : '';

      hidden_title = $("#hidden_title_posts").val();
      hidden_title = (hidden_title != undefined) ? hidden_title : '';
	}

});//end of script
