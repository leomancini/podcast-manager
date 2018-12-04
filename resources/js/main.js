function refresh_episode_list() {
	$.get("views/components/episode-list.php", function(data) {
		$("#episode-list").html(data);
	});
}

$(document).ready(function() { 
	refresh_episode_list();
	
	$('input#fileupload').change(function() {
		var filename = $('input#fileupload')[0].files[0].name;
		$('label#fileupload span').text("Replace File");
		$('#fileupload-filename').addClass("visible").text(filename);
	});
	
    $('input#fileupload').fileupload({
        dataType: 'json',
		replaceFileInput: false,
		add: function (e, data) {
            $("#upload-button").click(function (e) {
	            $('form#fileupload').hide();
	            $('#progress').show();
				$("#status").text("Uploading...");
				e.preventDefault();
                data.submit();
            });
        },
        done: function (e, data) {
            $('#progress').hide();
			$("#status").addClass("done").text("Success!");
			refresh_episode_list();
        },
		progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .bar').css(
	            'width',
	            progress + '%'
	        );
	    }
    });

});