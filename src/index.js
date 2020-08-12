const { registerBlockType } = wp.blocks;
import {
    InspectorControls,
} from '@wordpress/block-editor';

const { PanelBody, TextControl} = wp.components;

registerBlockType('zebra/entry-form', {
    // built in attributes
    title: 'Entry Form',
    description: 'Block to generate a zebra checkout form',
    icon: 'format-image',
    category: 'zebra-blocks',

    // custom attributes
    attributes: {
        redirectTo: {
            type: 'string',
            source: 'html',
            default: '/'
        }
    },

    // custom functions

    // built-in functions
    edit({ attributes, setAttributes }) {
        console.log(zebra_settings)

        return (
            <>
                <InspectorControls>
                    <PanelBody title={'Redirect To'}>
                        <p>Define Redirect Link</p>
                        <TextControl label="RedirectTo" value={attributes.redirectTo} onChange={(val) => {
                            setAttributes({redirectTo: val})
                        }}/>
                    </PanelBody>
                </InspectorControls>
                <h1>{attributes.redirectTo}</h1>
                <h1>CONTACT</h1>
                <input type="text" placeholder="Full Name" />
                <input type="text" placeholder="Email Address" />
                <input type="tel" placeholder="Phone Number" />

                <h1>SHIPPING</h1>
                <input type="text" placeholder="Full Address" />
                <input type="text" placeholder="City" />
                <input type="text" placeholder="State/Province" />
                <input type="text" placeholder="Postal Code" />
                <input type="text" placeholder="Country" />
            </>
        )
    },
    save({ attributes }) {
        return (
            <>
                <h1>{attributes.redirectTo}</h1>
                <h1>CONTACT</h1>
                <input type="text" placeholder="Full Name" />
                <input type="text" placeholder="Email Address" />
                <input type="tel" placeholder="Phone Number" />

                <h1>SHIPPING</h1>
                <input type="text" placeholder="Full Address" />
                <input type="text" placeholder="City" />
                <input type="text" placeholder="State/Province" />
                <input type="text" placeholder="Postal Code" />
                <input type="text" placeholder="Country" />
            </>
        )
    }
})