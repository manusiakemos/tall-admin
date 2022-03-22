import Alpine from "alpinejs";
import 'tippy.js/dist/tippy.css';

import {Editor} from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import LinkExtension from "@tiptap/extension-link";
import Highlight from "@tiptap/extension-highlight";
import Underline from "@tiptap/extension-underline";
import Image from "@tiptap/extension-image";
import Table from '@tiptap/extension-table';
import TableRow from '@tiptap/extension-table-row';
import TableCell from '@tiptap/extension-table-cell';
import TableHeader from '@tiptap/extension-table-header';
import BubbleMenu from '@tiptap/extension-bubble-menu';
import TextAlign from "@tiptap/extension-text-align";
// Tiptap editor on alpine init
document.addEventListener("alpine:init", () => {
    Alpine.data("editor", (content) => {
        return {
            editor: null,
            content: content,
            updatedAt: Date.now(),
            active: {
                undo:false,
                redo:false,
                heading1: false,
                heading2: false,
                heading3: false,
                heading4: false,
                bold: false,
                italic: false,
                underline: false,
                highlight:false,
                paragraph:false,
                orderedList:false,
                bulletList:false,
                image:false,
                link:false,
                strike:false,
                blockquote:false,
                table:false,
                alignLeft:false,
                alignRight:false,
                alignCenter:false,
                alignJustify:false,
            },
            lfm(id, type, options) {
                let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=700,height=600');
                const _this = this;
                window.SetUrl = function (items) {
                    console.log(items);
                    let file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    _this.setImage(file_path);
                };
            },
            uploadImage(route_prefix) {
                this.lfm('lfm', 'image', {prefix: route_prefix});
            },
            setImage(url) {
                console.log(url);
                if (url) {
                    Alpine.raw(this.editor).chain().focus().setImage({src: url}).run();
                } else {
                    console.log('image url not found');
                }
            },
            toggleClass(type) {
                if (this.activeMenu.includes(type)) {
                    this.activeMenu = this.activeMenu.filter(item => item !== type);
                } else {
                    this.activeMenu.push(type);
                }
            },
            toggleHeading(level) {
                Alpine.raw(this.editor).chain().toggleHeading({level}).focus().run();
            },
            toggleBold() {
                // this.toggleClass('bold');
                Alpine.raw(this.editor).chain().toggleBold().focus().run();
            },
            toggleItalic() {
                Alpine.raw(this.editor).chain().toggleItalic().focus().run();
            },
            toggleUnderline() {
                Alpine.raw(this.editor).chain().toggleUnderline().focus().run();
            },
            toggleParagraph() {
                Alpine.raw(this.editor).chain().setParagraph().focus().run();
            },
            toggleList(type) {
                if (type === "bullet") {
                    Alpine.raw(this.editor).chain().toggleBulletList().focus().run();
                } else {
                    Alpine.raw(this.editor).chain().toggleOrderedList().focus().run();
                }
            },
            addTable(rows, cols) {
                Alpine.raw(this.editor).chain().focus().insertTable({
                    rows: rows,
                    cols: cols,
                    withHeaderRow: true
                }).run();
            },
            addColumnBefore() {
                Alpine.raw(this.editor).chain().addColumnBefore().focus().run();
            },
            addColumnAfter() {
                Alpine.raw(this.editor).chain().addColumnAfter().focus().run();
            },
            deleteColumn() {
                Alpine.raw(this.editor).chain().deleteColumn().focus().run();
            },
            addRowBefore() {
                Alpine.raw(this.editor).chain().addRowBefore().focus().run();
            },
            addRowAfter() {
                Alpine.raw(this.editor).chain().addRowAfter().focus().run();
            },
            deleteRow() {
                Alpine.raw(this.editor).chain().deleteRow().focus().run();
            },
            deleteTable() {
                Alpine.raw(this.editor).chain().deleteTable().focus().run();
            },
            mergeCells() {
                Alpine.raw(this.editor).chain().mergeCells().focus().run();
            },
            splitCells() {
                Alpine.raw(this.editor).chain().splitCell().focus().run();
            },
            toggleHeaderColumn() {
                Alpine.raw(this.editor).chain().toggleHeaderColumn().focus().run();
            },
            toggleHeaderRow() {
                Alpine.raw(this.editor).chain().toggleHeaderRow().focus().run();
            },
            toggleHeaderCell() {
                Alpine.raw(this.editor).chain().toggleHeaderCell().focus().run();
            },
            mergeOrSplit() {
                Alpine.raw(this.editor).chain().mergeOrSplit().focus().run();
            },
            fixTable() {
                Alpine.raw(this.editor).chain().fixTables().focus().run();
            },
            goToNextCell() {
                Alpine.raw(this.editor).chain().goToNextCell().focus().run();
            },
            goToPreviousCell() {
                Alpine.raw(this.editor).chain().goToPreviousCell().focus().run();
            },
            addLink() {
                Alpine.raw(this.editor).chain().setLink().focus().run();
            },
            toggleStrikeThrough() {
                Alpine.raw(this.editor).chain().toggleStrike().focus().run();
            },
            toggleHighlight(color) {
                Alpine.raw(this.editor).chain().toggleHighlight().focus().run();
            },
            toggleBlockquote() {
                Alpine.raw(this.editor).chain().toggleBlockquote().focus().run();
            },
            undo() {
                Alpine.raw(this.editor).chain().undo().focus().run();
            },
            redo() {
                Alpine.raw(this.editor).chain().redo().focus().run();
            },
            toggleTextAlign(type){
                Alpine.raw(this.editor).chain().focus().setTextAlign(type).run();
            },
            init() {
                const _this = this;
                this.editor = new Editor({
                    element: _this.$refs.editorReference,
                    extensions: [
                        LinkExtension,
                        StarterKit.configure({
                            history: true,
                            dropcursor: true,
                        }),
                        Image.configure({
                            HTMLAttributes: {
                                class: 'img-responsive'
                            }
                        }),
                        Underline,
                        Highlight,
                        Table.configure({
                            resizable: true,
                            HTMLAttributes: {
                                class: 'table table-bordered table-sm',
                            },
                        }),
                        TableRow,
                        TableHeader,
                        TableCell,
                        BubbleMenu.configure({
                            element: document.querySelector('.menu'),
                        }),
                        TextAlign.configure({
                            types: ['heading', 'paragraph'],
                        })
                    ],
                    content: _this.content,
                    onTransaction: ({ editor }) => {
                        _this.content = editor.getHTML();
                        _this.active.bold = editor.isActive("bold");
                        _this.active.italic = editor.isActive("italic");
                        _this.active.underline = editor.isActive("underline");
                        _this.active.highlight = editor.isActive("highlight");
                        _this.active.marker = editor.isActive("marker");
                        _this.active.orderedList = editor.isActive("orderedList");
                        _this.active.bulletList = editor.isActive("bulletList");
                        _this.active.image = editor.isActive("image");
                        _this.active.link = editor.isActive("link");
                        _this.active.strike = editor.isActive("strike");
                        _this.active.blockquote = editor.isActive("blockquote");
                        _this.active.table = editor.isActive("table");
                        _this.active.heading1 = editor.isActive('heading', { level: 1 });
                        _this.active.heading2 = editor.isActive('heading', { level: 2 });
                        _this.active.heading3 = editor.isActive('heading', { level: 3 });
                        _this.active.heading4 = editor.isActive('heading', { level: 4 });
                        _this.active.alignLeft = editor.isActive({ textAlign: 'left' });
                        _this.active.alignCenter = editor.isActive({ textAlign: 'center' });
                        _this.active.alignRight = editor.isActive({ textAlign: 'right' });
                        _this.active.alignJustify = editor.isActive({ textAlign: 'justify' });
                    },
                    onUpdate({editor}) {
                        _this.updatedAt = Date.now();
                        _this.content = editor.getHTML();
                    },
                    onSelectionUpdate: () => {
                        _this.updatedAt = Date.now();
                    },
                });
            }
        };
    });
});

window.Alpine = Alpine;
Alpine.start();
