import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";
// const MY_TEMPLATE = [
//     [ 'core/image', {} ],
//     [ 'core/heading', { placeholder: 'Book Title' } ],
//     [ 'core/paragraph', { placeholder: 'Summary' } ],
// ];
const ALLOWED_BLOCKS_GALLERY = ['core/gallery'];
const GALLERY_TEMPLATE = [
    ['core/gallery', {} ]
];

// const ALLOWED_BLOCKS = [ 'core/image' ]

registerBlockType( 'learn-gutenber-block/call-to-action', {
    title: 'Call to Action',
    icon: 'admin-comments',
    category: 'common',
    keywords: [ 'cta', 'call to action' ],
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2'
        },
        content: {
            type: 'string',
            source: 'html',
            selector: 'p'
        }
    },
    /**
     * Edit Function
     */
    edit: ( { attributes, setAttributes } ) => {
        const {
            title,
            content
        } = attributes;

        /**
         * Set Title
         */
        function setTitle( value ) {
            setAttributes( { title: value } );
        }

        /**
         * Set Content
         */
        function setContent( value ) {
            setAttributes( { content: value } )
        }

        return(
            <>
            <div class="call-to-action-this">
                <div class="call-to-action">
                    <RichText
                        key="editable"
                        tagName="h2"
                        placeholder="Heading"
                        value={ title }
                        onChange={ setTitle }/>

                    <RichText
                        key="editable"
                        tagName="h3"
                        placeholder="Gallary Content Here"
                        value={ content }
                        onChange={ setContent }/>
                   <InnerBlocks
                allowedBlocks={ ALLOWED_BLOCKS_GALLERY }
                template={ GALLERY_TEMPLATE }
                templateLock="all"
            />
                </div>
                </div>
            </>
        )
    },
    /**
     * Save Function
     */
    save: ( { attributes } ) => {
        const {
            title,
            content
        } = attributes;

        return(
            <>
            <div class="call-to-action-this>"
                <div class="call-to-action">
                    <h2>{ title }</h2>
                    <RichText.Content value={ content } tagName="p" />
                    <InnerBlocks template={ MY_TEMPLATE } templateLock="all"/>
                </div>
                </div>
            </>
        )
    }
});