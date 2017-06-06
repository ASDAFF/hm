$(document).ready(function() {

	$(".text-name-n").focus(function(e) {
		if($(".text-name-n").val() == 'Имя'){
			$(".text-name-n").val('');
			$(".text-name-n").css("color","#000000");
		}
	})
	
	$(".text-name-n").blur(function(e) {
			if($(".text-name-n").val() == ''){
				$(".text-name-n").val('Имя');
				$(".text-name-n").css("color","#b9bab9");
			}
	})
	
	$(".text-name-p").focus(function(e) {
		if($(".text-name-p").val() == 'Телефон'){
			$(".text-name-p").val('');
			$(".text-name-p").css("color","#000000");
		}
	})
	
	$(".text-name-p").blur(function(e) {
			if($(".text-name-p").val() == ''){
				$(".text-name-p").val('Телефон');
				$(".text-name-p").css("color","#b9bab9");
			}
	})


    $(".submit_form").click(function(e) {
        e.preventDefault();
		
		var withoutSpace = $(".text-area").val();
		while(withoutSpace.match(/\s{3}/g)){
			withoutSpace = withoutSpace.replace(/\s{3}/g, " ");				
		}
		$(".text-area").val(withoutSpace);
		
		var sendYes = true;
		
        if(!$(".text-area").val()) {
            $(".text-area").css("border","1px solid red");
			sendYes = false;
        }else{
			$(".text-area").css("border","1px solid #e5e7e7");
		}
		
		if((!$(".text-name-n").val())||($(".text-name-n").val() == 'Имя')){
            $(".text-name-n").css("border","1px solid red");
			sendYes = false;
        }else{
			$(".text-name-n").css("border","solid 1px #dbdcdc");
		}
		
		var newPhoneNum = $(".text-name-p").val();
		newPhoneNum = newPhoneNum.replace(/[^\d]/gi, '');
		$(".text-name-p").val(newPhoneNum);
		
		
		if((!$(".text-name-p").val())||($(".text-name-p").val() == 'Телефон')||($(".text-name-p").val().length<5)){
            $(".text-name-p").css("border","1px solid red");
			sendYes = false;
        }else{
			$(".text-name-p").css("border","solid 1px #dbdcdc");
		}
		
		if($(".text-area").val().length < 50){
			alert('Пожалуйста, напишите больше о своей мечте');
			sendYes = false;
		}
		
		//sendYes = false;
		
		if(sendYes) {

			$.ajax({
				url:"/upload/send.php",
				data: {
					t_message: "Имя: " + $(".text-name-n").val() + ", телефон: " + $(".text-name-p").val() + "<br> Сообщение:" + $('.text-area').val()
				},
				success:function(data) {

				}
			});
			//$(".form-block .white-block").html("<div style='text-align: center;'>Сообщение отправлено</div>");
			$(".form-block").css("border","none");
			$(".form-block").html("<div class='thx_for_mail'></div>");
			$(".form-inp").html("");
		}
		
		
		
/*		
        if(!$(".text-area").val()) {
            $(".text-area").css("border","1px solid red");
        } else {
            if($(".add-file").text() == '') {

                $.ajax({
                    url:"/upload/send.php",
                    data: {
                        t_message: $('.text-area').val()
                    },
                    success:function(data) {

                    }
                });
                $(".form-block .white-block").html("<div style='text-align: center;'>Сообщение отправлено</div>");
            }
            $(".text-area").css("border","1px solid #e5e7e7");
        }
*/
    })

// Код кнопки прикрепить


    'use strict';


    $(".submit_form").click(function() {
        if($(".text-area").val() != '') {
            $(".btn-primary").click();
        }
    })

    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
            '//jquery-file-upload.appspot.com/' : '/upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        add: function (e, data) {
            var that = this;
            $.getJSON('/upload/server/php/', {file: data.files[0].name}, function (result) {
                var file = result.file;
                data.uploadedBytes = file && file.size;
                $.blueimp.fileupload.prototype
                    .options.add.call(that, e, data);
            });
        },
        files: [''],
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|doc|zip|docx|rar|7z|bmp|txt)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        $(".add-file").text("Прикреплен файл");
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {

        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $(".form-block .white-block").html("<div style='text-align: center;'>Сообщение отправлено</div>");
        $.ajax({
            url:"/upload/send.php",
            data: {
                t_message: $('.text-area').val(),
                t_link: data.result.files[0].name
            },
            success:function(data) {

            }
        });

        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        //$(".form-block .white-block").html("Сообщение не отправлено");
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


});