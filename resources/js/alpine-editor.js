import Alpine from "alpinejs";
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
// Tiptap editor on alpine init
document.addEventListener("alpine:init", () => {
    Alpine.data("editor", (content) => {
        let editor;
        return {
            activeMenu:[],
            isActive(type) {
                let active = editor.isActive(type);
                return active ? 'bg-primary-500' : 'bg-gray-400';
            },
            lfm(id, type, options) {
                let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=700,height=600');
                var vm = this;
                window.SetUrl = function (items) {
                    console.log(items);
                    let file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    vm.setImage(file_path);
                };
            },
            uploadImage(route_prefix) {
                this.lfm('lfm', 'image', {prefix: route_prefix});
            },
            setImage(url) {
                console.log(url);
                if (url) {
                    editor.chain().focus().setImage({src: url}).run();
                } else {
                    console.log('image url not found');
                }
            },
            toggleClass(type){
                if (this.activeMenu.includes(type)) {
                    this.activeMenu = this.activeMenu.filter(item => item !== type);
                } else {
                    this.activeMenu.push(type);
                }
            },
            toggleHeading(level) {
                editor.chain().toggleHeading({level}).focus().run();
            },
            toggleBold() {
                // this.toggleClass('bold');
                editor.chain().toggleBold().focus().run();
            },
            toggleItalic() {
                editor.chain().toggleItalic().focus().run();
            },
            toggleUnderline() {
                editor.chain().toggleUnderline().focus().run();
            },
            toggleParagraph() {
                editor.chain().setParagraph().focus().run();
            },
            toggleList(type) {
                if (type === "bullet") {
                    editor.chain().toggleBulletList().focus().run();
                } else {
                    editor.chain().toggleOrderedList().focus().run();
                }
            },
            addTable(rows, cols) {
                editor.chain().focus().insertTable({rows: rows, cols: cols, withHeaderRow: true}).run();
            },
            addColumnAfter() {
                editor.chain().addColumnAfter().focus().run();
            },
            deleteColumn() {
                editor.chain().deleteColumn().focus().run();
            },
            addRowBefore() {
                editor.chain().addRowBefore().focus().run();
            },
            addRowAfter() {
                editor.chain().addRowAfter().focus().run();
            },
            deleteRow() {
                editor.chain().deleteRow().focus().run();
            },
            deleteTable() {
                editor.chain().deleteTable().focus().run();
            },
            mergeCells() {
                editor.chain().mergeCells().focus().run();
            },
            splitCells() {
                editor.chain().splitCell().focus().run();
            },
            toggleHeaderColumn() {
                editor.chain().toggleHeaderColumn().focus().run();
            },
            toggleHeaderRow() {
                editor.chain().toggleHeaderRow().focus().run();
            },
            toggleHeaderCell() {
                editor.chain().toggleHeaderCell().focus().run();
            },
            mergeOrSplit(){
                editor.chain().mergeOrSplit().focus().run();
            },
            fixTable(){
                editor.chain().fixTables().focus().run();
            },
            goToNextCell(){
                editor.chain().goToNextCell().focus().run();
            },
            goToPreviousCell(){
                editor.chain().goToPreviousCell().focus().run();
            },
            addLink() {
                editor.chain().setLink().focus().run();
            },
            toggleStrikeThrough() {
                editor.chain().toggleStrike().focus().run();
            },
            toggleHighlight(color) {
                editor.chain().toggleHighlight().focus().run();
            },
            toggleBlockquote() {
                editor.chain().toggleBlockquote().focus().run();
            },
            content: content,
            init() {
                const _this = this;
                editor = new Editor({
                    element: this.$refs.editorReference,
                    extensions: [
                        LinkExtension,
                        StarterKit.configure({
                            history: false,
                            dropcursor: true,
                        }),
                        Image.configure({
                           HTMLAttributes:{
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
                    ],
                    content: this.content,
                    onUpdate({editor}) {
                        _this.updatedAt = Date.now();
                        _this.content = editor.getHTML();
                    }
                });
            }
        };
    });
});

window.Alpine = Alpine;
Alpine.start();
