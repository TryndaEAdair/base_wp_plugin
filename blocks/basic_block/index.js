import { registerBlockType } from '@wordpress/blocks';

registerBlockType('base_custom_plugin/basic_block', {
    title: 'Base Custom Plugin Block',
    icon: 'location',
    category: 'widgets',
    edit: () => <p>[base_custom_plugin] shortcode will be rendered here.</p>,
    save: () => null,
});
