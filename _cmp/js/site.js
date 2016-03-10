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

function go_to( admin_url ) {
	var url = '../admin/index.php?campanhas='+admin_url+'?admin_token='+admin_token;
	location.href = url;
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

	$('#camp_pesq').submit(function(e) {
		e.preventDefault();

		var actionSegments = $("#camp_pesq").attr('action').split('=');
		var pesq = actionSegments[1];
		var index = actionSegments[0];

		var newAction = index +'='+ encodeURIComponent( pesq +
			"&" + $("#camp_pesq").serialize() );

		location.href = newAction;
	});

	$('#campanha_inserir').submit(function(e) {
		e.preventDefault();

		$.post($("#campanha_inserir").attr("action"),
			$("#campanha_inserir").serialize(), function(data) {

			var json = myParseJSON( data );
			if( json.status=="OK" ) {
				msg_success( json.msg, 'Campanha inserida com sucesso!', 
					true, function() { go_to('listar'); } );

			} else {
				msg_error( json.msg );
			}
		}).fail( function() { msg_general_error(); } );
		return false;
	});

	$('#campanha_atualizar').submit(function(e) {
		e.preventDefault();

		$.post($("#campanha_atualizar").attr("action"),
			$("#campanha_atualizar").serialize(), function(data) {
			var json = myParseJSON( data );
			if( json.status=="OK" ) {
				msg_success( json.msg, 'A Campanha foi atualizada com sucesso!', 
					true, function() { go_to('listar'); } );
			} else {
				msg_error( json.msg );
			}
		}).fail( function() { msg_general_error(); } );

		return false;
	});

	$(document).on('click', '.activ_desativ_btn', function(e) {
		e.preventDefault();
		var btn = $(this);
		var status = btn.data('cmpstatus');
		var cmp_id = btn.data('cmpid');

		if( status=='C' ) {
			msg_error( 'Não é possível modificar o status de uma Campanha que foi comprada!' );
			return false;
		} else {
			var novo_status = (status=='A')?'I':'A';
			if( activ_deactiv( cmp_id, novo_status ) ) {
				btn.data('cmpstatus', novo_status);

				if( novo_status == 'A' ) {
					btn.addClass('icoenable');
					btn.find('i').removeClass('icon-star-empty');
					btn.find('i').addClass('icon-star');
				} else {
					btn.removeClass('icoenable');
					btn.find('i').removeClass('icon-star');
					btn.find('i').addClass('icon-star-empty');
				}
			}
		}
	});

});

var ret_activ = false;
function activ_deactiv( id, status ) {

	$.ajax({
		url         : '../_cmp/campanha/changestatus'+'/'+id+'/'+status+'?admin_token='+admin_token,
		contentType : 'charset=utf-8',
		dataType 	: 'json',
		success 	: function (data) {
			var acao = (status == 'A')?'ativada':'desativada';
			if ( data.result === "OK" ) {
				ret_activ = true;
				msg_success( 'A Campanha foi '+acao+' com sucesso!', true); 
			} else {
				ret_activ = false;
				msg_error( 'Não foi possível atualizar o estado da Campanha' );
			}
		},
		error : function (data, status, e) {
			ret = false;
			console.log(data);
			msg_general_error();
		}
	});

	return ret_activ;
}