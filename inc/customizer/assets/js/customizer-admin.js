/*admin css*/
( function( inx_game_api ) {

	inx_game_api.sectionConstructor['inx_game_upsell'] = inx_game_api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
