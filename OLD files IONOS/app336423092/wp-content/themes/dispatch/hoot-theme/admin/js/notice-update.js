jQuery(document).on( 'click', '.hoot-migration-notice .notice-dismiss', function() {
	jQuery('.hoot-migration-notice').fadeOut();
	jQuery.ajax({
		url: hootdata.ajax_url,
		data: {
			action: 'hoot_dismiss_migration_notice'
		},
		success : function( response ) {
			console.log('hoot-migration-notice-dismissed');
		}
	})
})