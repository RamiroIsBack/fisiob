function hideBoxes() {
    jQuery("#TB_window").remove();
    jQuery("#TB_overlay").remove();
}

function showBox( id, modal, width, height ) {
    if ( typeof modal === 'undefined' ) {
        modal = false;
    }
    hideBoxes();
    tb_show( '', '#TB_inline?height=' + height + '&width=' + width + '&inlineId=' + id + '&modal=' + modal, null );
}

function startInstall( theme_id ) {
    showBox( 'oneandone-setup-install', true, 550, 150 );

    if ( typeof theme_id === 'undefined' ) {
        theme_id = '';
    }

    var form = jQuery( 'form#oneandone-install-form' );
    var url = ajax_assistant_object.ajaxurl;
    var data = form.serialize() + '&theme=' + theme_id + '&action=ajaxinstall';

    jQuery.ajax( {
        type: 'POST',
        dataType: 'json',
        url: url,
        data: data,

        success: function( response ) {
            window.location = response.data.referer;
        }
    } );
}