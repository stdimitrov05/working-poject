$(document).ready(function () {
	var options = {
		    ajaxPrefix: ''
		};

    $('#insert_button').click(function () {
    
    		new Dialogify('add-form.php', options)
                .title('Create New Comment')
                .buttons([
                    {
                        text: 'Cancel',
                        click: function (e) {
                            console.log('cancel click');
                            this.close();
                        }
                    },
                    {
                        text: 'Okay',
                        type: Dialogify.BUTTON_PRIMARY,
                        click: function (e) {
                            var name = document.getElementById("username").value;
                            var website = document.getElementById("website").value;
                            var content = document.getElementById("new_content").value;
                            $.ajax
                                    ({
                                        type: 'post',
                                        url: 'comment-add.php',
                                        data: {
                                            insert_row: 'insert_row',
                                            name: name,
                                            website: website,
                                            content: content
                                        },
                                        success: function (response) {
                                            if (response != "")
                                            {
                                                var id = response;
                                                var row = "<div id='name_val" + id + "'>" + name + "</div><div id='website_val" + id + "'>" + website + "</div><div id='content_val" + id + "'>" + content + "</div><input type='button' class='edit_button' id='edit_button" + id + "' value='Edit' onclick='edit_row(" + id + ");'/>";
                                                $('#container').append(row);
                                                document.getElementById("username").value = "";
                                                document.getElementById("website").value = "";
                                                document.getElementById("new_content").value = "";
                                            }

                                            location.reload();
                                        }
                                    });
                            this.close();
                        }
                    }
                ]).show();
    });
});

function edit_row(id)
{
            var name = $.trim(document.getElementById("name_val" + id).innerHTML);
            var website = $.trim(document.getElementById("website_val" + id).innerHTML);
            var content = $.trim(document.getElementById("content_val" + id).innerHTML);
			localStorage.setItem('name',name);
			localStorage.setItem('website',website);
			localStorage.setItem('content',content);
			
		var options = {
		    ajaxPrefix: '',
			 
		};

    new Dialogify('edit-form.php', options)
            .title('Edit Comment')
            .buttons([
                {
                    text: 'Cancel',
                    click: function (e) {
                        console.log('cancel click');
                        this.close();
                    }
                },
                {
                    text: 'Okay',
                    type: Dialogify.BUTTON_PRIMARY,
                    click: function (e) {
					  					   
                        var name = $('#username').val();
                        var website = $('#website').val();
                        var content = $('#edit_content').val();
                        $.ajax
                                ({
                                    type: 'post',
                                    url: 'comment-edit.php',
                                    data: {
                                        edit_row: 'edit_row',
                                        id: id,
                                        name: name,
                                        website: website,
                                        content: content
                                    },
                                    success: function (response) {
                                        if (response == "success")
                                        {
                                            document.getElementById("name_val" + id).innerHTML = name;
                                            document.getElementById("website_val" + id).innerHTML = website;
                                            document.getElementById("content_val" + id).innerHTML = content;
                                        }
                                    }
                                });
                        this.close();

                    }
                }
            ]).show();
			
    $('#username').val(name);
    $('#website').val(website);
    $('#edit_content').val(content);
}