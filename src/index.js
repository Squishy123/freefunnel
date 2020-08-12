const { registerBlockType } = wp.blocks;

registerBlockType('zebra/entry-form', {
    // built in attributes
    title: 'Entry Form',
    description: 'Block to generate a zebra checkout form',
    icon: 'format-image',
    category: 'zebra-blocks',

    // custom attributes
    attributes: {

    },

    // custom functions

    // built-in functions
    edit() {
        console.log(zebra_settings)
        return (
            <>
                <h1>ANOTHER ONE!</h1>
                <h1>HELLO WORLD!</h1>
                <input type="text" placeholder="BITCH" />
            </>
        )
    },
    save() {
        return (
            <>
                <h1>ANOTHER ONE!</h1>
                <h1>HELLO WORLD!</h1>
                <input type="text" placeholder="BITCH" />
            </>
        )
    }
})