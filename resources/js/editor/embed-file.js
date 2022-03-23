import { Node } from '@tiptap/core';

export default Node.create({
    name: 'embed-file',

    group: 'block',

    atom: true,

    addOptions() {
        return {
            allowFullscreen: true,
            HTMLAttributes: {
                class: 'embed-file-wrapper',
            },
        };
    },
    addAttributes() {
        return {
            src: {
                default: null,
            },
            frameborder: {
                default: 0,
            },
            width: {
                default: 300,
            },
            height: {
                default: 300,
            },
            allowfullscreen: {
                default: this.options.allowFullscreen,
                parseHTML: () => this.options.allowFullscreen,
            },
        };
    },

    parseHTML() {
        return [{
            tag: 'iframe',
        }];
    },

    renderHTML({ HTMLAttributes }) {
        return ['div', this.options.HTMLAttributes, ['iframe', HTMLAttributes]];
    },

    addCommands() {
        return {
            setEmbedFile: (options) => ({ tr, dispatch }) => {
                const { selection } = tr;
                const node = this.type.create(options);

                if (dispatch) {
                    tr.replaceRangeWith(selection.from, selection.to, node);
                }

                return true;
            },
        };
    },
});
