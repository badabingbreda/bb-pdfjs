// https://wordpress.stackexchange.com/questions/181000/get-attachment-image-info-in-js
// https://codex.wordpress.org/Javascript_Reference/wp.media

(function($){

    BBPDFJS = {
        _singlePDFSelector: null,

        _init: function()
        {
            $('body').delegate('.pdfjs-pdf .pdf-select', 'click', BBPDFJS._selectPDF);
            $('body').delegate('.pdfjs-pdf .pdf-remove', 'click', BBPDFJS._removePDF);
            //$('body').delegate('.fl-pdf-field .fl-pdf-remove', 'click', BBPDFJS._removeSinglePDF);

            /* add a MutationObserver so we can fetch filenames when opening modules */
            BBPDFJS._createObserver();
        },

        _createObserver: function() {
            const targetNode = document.querySelector( 'body' );
            // Options for the observer (which mutations to observe)
            const config = { attributes: true, childList: true, subtree: true };

            const callback = ( mutationsList, observer ) => {

                // look through all mutations that just occured
                for(var i=0; i<mutationsList.length; ++i) {
                    // look through all added nodes of this mutation
                    for(var j=0; j<mutationsList[i].addedNodes.length; ++j) {
                        // was a child added with ID of 'bar'?
                        if( mutationsList[i].addedNodes[j] ) {
                            $node = $( mutationsList[i].addedNodes[j] );
                            if ( $node.find( '.pdfjs-pdf' ).length > 0 ) {
                                // trigger the media 
                                $node.find( '.pdfjs-pdf' ).each( function(index) {
                                    var pdfjsNode = $(this);
                                    var value = pdfjsNode.find( 'input[type="hidden"]' ).val();
                                    pdfjsNode.find( 'input[type="hidden"]' ).addClass( 'hasvalue' );
                                    if (value !== '' || value !== null ) {
                                        wp.media.attachment(value).fetch().then( function(data){

                                            BBPDFJS._setPDFFilename(pdfjsNode,data);

                                        });
                                    }
                                });
                            }
                        }
                    }
                }                
            }

            // Create an observer instance linked to the callback function
            const observer = new MutationObserver(callback);

            // Start observing the target node for configured mutations
            observer.observe(targetNode, config);
        },

        _setPDFFilename: function( pdfjsNode , data ) {

            /**
             * data object:
             *          id
             *          title
             *          filename
             *          url
             *          link
             *          filesizeHumanReadable
             *          caption
             *          icon
             */

            pdfjsNode.find( '.filename' ).html( data.filename );

        },

        _selectPDF: function()
        { 
            if(BBPDFJS._singlePDFSelector === null) {
            
                BBPDFJS._singlePDFSelector = wp.media({
                    title: 'Select PDF',
                    button: { text: 'Select PDF' },
                    library : { type : 'application/pdf' },
                    multiple: false
                }); 
            }
            
            BBPDFJS._singlePDFSelector.once( 'select', $.proxy( BBPDFJS._singlePDFSelected, this ) );
            BBPDFJS._singlePDFSelector.open();
        },

        /**
         * Called as proxy, has same initial this
         */
        _singlePDFSelected: function()
        {
            var pdf     = BBPDFJS._singlePDFSelector.state().get('selection').first().toJSON(),
                wrap    = $(this).closest('.pdfjs-pdf'),
                field   = wrap.find( 'input[type="hidden"]' );

                field.addClass( 'hasvalue' );

                BBPDFJS._setPDFFilename(wrap,pdf);

            field.val( pdf.id ).trigger( 'change' );

        },
        /**
         * Remove the Selected PDF from the field
         */
        _removePDF: function() {
            var wrap    = $(this).closest('.pdfjs-pdf'),
                field   = wrap.find( 'input[type="hidden"]' ),
                filename = wrap.find( '.filename' );

            /* clear the value and filename */
            field.removeClass( 'hasvalue' );
            field.val( '' ).trigger('change');
            filename.html( '' );

        }

    };
    
    $(function(){
        BBPDFJS._init();
    });
    
})(jQuery);

