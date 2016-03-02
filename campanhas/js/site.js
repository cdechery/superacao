jQuery.extend({
    handleError: function( s, xhr, status, e ) {
        // If a local callback was specified, fire it
        if ( s.error ) {
            s.error( xhr, status, e );
        	setErrorDiv( xhr.responseText );
        }
        // If we have some XML response text (e.g. from an AJAX call) then log it in the console
        else if(xhr.responseText) {
        	console.log(xhr.responseText);
			setErrorDiv( xhr.responseText );
		}
    }
});

function setErrorDiv( errorData ) {
	$('#error-details').html( errorData );
}

var nonJSONret = $.parseJSON( '{ "status": "nonJSONreturn", '
	+'"msg": "Desculpe, ocorreu uma falha ao executar a ação desejada." }' );

function myParseJSON( jsonString ) {
	try {
		var json = $.parseJSON( jsonString );
		return json;
	} catch(err) {
		setErrorDiv( jsonString );
		return nonJSONret;
	}
}

function countOcurrences(str, value){
   var regExp = new RegExp(value, "gi");
   return str.match(regExp) ? str.match(regExp).length : 0;  
}

function logonFB() {
	location.href = site_root+'login/fblogin';
}

function go_home() {
	location.href = site_root;
}

function msg_general_error( msg ) {
	if( msg==null ) {
		msg = 'Desculpe, ocorreu uma falha ao executar a ação desejada';
	}
	
	new Messi( msg, {title: 'Oops...', titleClass: 'anim error', 
		buttons: [{id: 0, label: 'Fechar', val: 'X'}] });
}

function msg_success(msg, title, modal, custom_action) {
	if( modal==null ) {
		modal = false;
	}

	if( custom_action ) {
		new Messi(msg, {title: title, 
			titleClass: 'anim success', modal: modal,
			buttons: [{id: 0, label: 'OK', val: 'S'}], 
			callback: custom_action } );
	} else {
		new Messi(msg, {title: title, 
			titleClass: 'anim success', modal: modal } );
	}
}

function msg_confirm(msg, title, custom_action) {
	new Messi(msg, {title: title, modal: true,
		buttons: [{id: 0, label: 'Sim', val: 'S'}, 
		{id: 1, label: 'Não', val: 'N'}], 
		callback: custom_action } );
}

function msg_error( msg, title ) {
	if( title==null ) {
		title = 'Oops...';
	}

	new Messi( msg, {title: title, titleClass: 'anim error', 
		modal: true, buttons: [{id: 0, label: 'Fechar', val: 'X'}]} );
}

function msg_general( msg, title, modal ) {
	new Messi( msg, {title: title, modal: modal} );
}

function img_preload( arrayOfImages ) {
    $(arrayOfImages).each(function () {
        $('<img />').attr('src',this).appendTo('body').hide();
    });
}

$(function() {

	$('#campanha_insert').submit(function(e) {
		e.preventDefault();
		$.post($("#campanha_insert").attr("action"),
			$("#campanha_insert").serialize(), function(data) {
			console.log(data);
			var json = myParseJSON( data );
			if( json.status=="OK" ) {
				msg_success( json.msg, 'Campanha inserida com sucesso!', true);
			} else {
				msg_error( json.msg );
			}
		}).fail( function() { msg_general_error(); } );
		return false;
	});

	$('#campanha_update').submit(function(e) {
		e.preventDefault();
		$.post($("#campanha_update").attr("action"),
			$("#campanha_update").serialize(), function(data) {
			var json = myParseJSON( data );
			if( json.status=="OK" ) {
				msg_success( json.msg, 'Campanha inserida com sucesso!', true);
			} else {
				msg_error( json.msg );
			}
		}).fail( function() { msg_general_error(); } );
		return false;
	});

	$(document).on('click', '.activ_interesse_btn', function(e) {
		e.preventDefault();
		var btn = $(this);
		if( !btn.hasClass('blue') ) {
			activ_deactiv_interesse(btn, 'activate');
		} else {
			activ_deactiv_interesse(btn, 'deactivate');
		}
		return false;
	});

});

function activ_deactiv_interesse( btn, action ) {
	$.ajax({
		url         : site_root + 'interesse/'+action+'/'+btn.data('catid'),
		contentType : 'charset=utf-8',
		dataType 	: 'json',
		success 	: function (data) {
			if ( data.status === "success" ) {
				if( action=='activate' ) {
					btn.html('<i class="fa fa-square-o"></i>&nbsp;Desativar');
					btn.addClass('blue');
					btn.parents('tr').removeClass('disabled');
				} else {
					btn.html('<i class="fa fa-check-square-o"></i>&nbsp;Ativar');
					btn.removeClass('blue');
					btn.parents('tr').addClass('disabled');
				}
				return true;
			} else {
				msg_error( data.msg );
				return false;
			}
		},
		error : function (data, status, e) {
			msg_general_error();
			return false;
		}
	});
}