@extends('vendor.crudgen.app')

@section('content')
    <div class="container-fluid py-5" id="app">
        <div class="row" v-cloak>
            <div class="col-md-12">
                <div class="card bg-dark text-white border-light shadow-sm">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title mb-3 text-white">CrudGen GUI</h4>
                            <div class="ml-auto">
                                <a @click.prevent="create"
                                   class="btn btn-primary btn-create mb-1">
                                    <span class="fa fa-plus"></span>
                                    Add
                                </a>
                                <button
                                    @click="refresh"
                                    class="btn btn-primary btn-refresh mb-1">
                                    <span class="fa fa-recycle"></span>
                                    Refresh
                                </button>
                                <button @click="deleteAll" class="btn btn-danger btn-bulk-delete mb-1"
                                        v-if="data_json.length > 0">
                                    <span class="fa fa-trash"></span>
                                    Truncate
                                </button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <table class="table text-white">
                                <tbody>
                                <tr v-for="(v,i) in data_json" :key="i">
                                    <td>@{{ v.class }}</td>
                                    <td class="text-center w-25">
                                        <button type="button" class="btn btn-primary" @click="edit(i)"><span
                                                class="fa fa-pencil"></span></button>
                                        <button type="button" class="btn btn-danger" @click="destroy(i)"><span class="fa fa-trash-o"></span></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalForm">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title">Crud Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row row">
                            <div class="form-group col-lg-3">
                                <label for="class" class="text-capitalize">class</label>
                                <input type="text" class="form-control" id="class" v-model="data.class">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="table" class="text-capitalize">table</label>
                                <input type="text" class="form-control" id="table" v-model="data.table">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="router" class="text-capitalize">router</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.router"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="view" class="text-capitalize">view</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.view"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            {{-- <div class="form-group col-lg-3">
                                 <label for="spa" class="text-capitalize">spa</label>
                                 <div v-for="(v,i) in boolean_list" class="form-check">
                                     <input class="form-check-input"
                                            type="radio" :id="`${v.text}i`"
                                            v-model="data.spa"
                                            :value="v.value">
                                     <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                 </div>
                             </div>--}}

                            <div class="form-group col-lg-3">
                                <label for="model" class="text-capitalize">model</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.model"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="controller" class="text-capitalize">controller</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.controller"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="seeder" class="text-capitalize">seeder</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.seeder"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="modal" class="text-capitalize">modal</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.modal"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <label for="migration" class="text-capitalize">migration</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.migration"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="migrate" class="text-capitalize">migrate</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.migrate"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="upload" class="text-capitalize">upload</label>
                                <div v-for="(v,i) in boolean_list" class="form-check">
                                    <input class="form-check-input"
                                           type="radio" :id="`${v.text}i`"
                                           v-model="data.upload"
                                           :value="v.value">
                                    <label class="form-check-label" :for="`${v.text}i`">@{{ v.text }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h4>Fields</h4>
                            <draggable v-if="data.fields" v-model="data.fields" group="people" @start="drag=true" @end="drag=false">
                                <div v-for="(field,index) in data.fields" :key="index" class="rounded border border-primary mb-3 p-3">
                                    <div class="form-row row">
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">name</label>
                                            <input type="text" class="form-control" v-model="field.name">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">label</label>
                                            <input type="text" class="form-control" v-model="field.label">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">dbType</label>
                                            <select v-model="field.dbType" class="form-control">
                                                <option v-for="v in data_types" :value="v">@{{ v }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">length</label>
                                            <input type="text" class="form-control" v-model="field.length">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">nullable</label>
                                            <select v-model="field.nullable" class="form-control">
                                                <option v-for="v in boolean_list" :value="v.value">@{{ v.text }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">default</label>
                                            <input type="text" class="form-control" v-model="field.default">
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">htmlType</label>
                                            <select v-model="field.htmlType" class="form-control">
                                                <option v-for="v in input_types" :value="v">@{{ v }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">validations</label>
                                            <select v-model="field.validations" class="form-control">
                                                <option v-for="v in boolean_list" :value="v.value">@{{ v.text }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">searchable</label>
                                            <select v-model="field.searchable" class="form-control">
                                                <option v-for="v in boolean_list" :value="v.value">@{{ v.text }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">printable</label>
                                            <select v-model="field.printable" class="form-control">
                                                <option v-for="v in boolean_list" :value="v.value">@{{ v.text }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">primary</label>
                                            <select v-model="field.primary" class="form-control">
                                                <option v-for="v in boolean_list" :value="v.value">@{{ v.text }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="text-capitalize">faker</label>
                                            <input type="text" class="form-control" v-model="field.faker">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-danger" @click="deleteField(index)"><span
                                                    class="fa fa-minus"></span></button>
                                            <button type="button" class="btn btn-primary" @click="addField(index)"><span
                                                    class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </draggable>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="simpan">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push("script")
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    <!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.20.0/vuedraggable.umd.min.js"></script>
    <script>
        var app = new Vue({
            el: "#app",
            created() {
                this.getData();
                this.data_clone = this.data;
            },
            data: {
                data_types: [
                    'id',
                    'false',
                    'increments',
                    'string',
                    'integer',
                    'boolean',
                    'enum',
                    'date',
                    'text',
                    'longText',
                    'double',
                    'float',
                    'year',
                    'timestamp',
                    'json'
                ],
                input_types: [
                    'false',
                    'text',
                    'money',
                    'file',
                    'radio',
                    'checkbox',
                    'file',
                    'summernote',
                    'select',
                    'date',
                    'time',
                ],
                selected_index: 0,
                data_json: [],
                field_base: {
                    "name": "",
                    "dbType": "string",
                    "label": "",
                    "length": false,
                    "nullable": false,
                    "default": false,
                    "htmlType": "text",
                    "validations": true,
                    "searchable": false,
                    "printable": false,
                    "primary": false,
                    "faker": false
                },
                data: {
                    "class": "",
                    "table": "",
                    "router": false,
                    "view": true,
                    "spa": false,
                    "model": true,
                    "modal": true,
                    "controller": true,
                    "seeder": true,
                    "migration": true,
                    "migrate": false,
                    "upload": false,
                    "fields": [
                        {
                            "name": "id",
                            "label": "Id",
                            "dbType": "id",
                            "length": false,
                            "nullable": false,
                            "default": false,
                            "htmlType": false,
                            "validations": false,
                            "searchable": false,
                            "printable": false,
                            "primary": true,
                            "faker": false
                        },
                        {
                            "name": "name",
                            "dbType": "string",
                            "label": "Nama",
                            "length": 190,
                            "nullable": true,
                            "default": false,
                            "htmlType": "text",
                            "validations": true,
                            "searchable": true,
                            "printable": true,
                            "primary": false,
                            "faker": false
                        },
                    ]
                },
                data_clone: "",
                boolean_list: [
                    {
                        'value': true,
                        'text': 'Ya'
                    },
                    {
                        'value': false,
                        'text': 'Tidak'
                    }
                ]
            },
            methods: {
                simpan(){
                    axios.post('/crud',this.data).then(res=>{
                        alertify.success(res.data.message);
                        this.getData();
                    });
                },
                refresh() {
                    this.getData();
                },
                deleteAll(data = []) {
                    this.data_json = data;
                    axios.post('/crud/truncate', {data : this.data_json});
                },
                deleteField(i) {
                    this.data.fields.splice(i,1);
                    var vm = this;
                    this.$nextTick(()=>{
                        vm.simpan();
                    });
                },
                addField(index=0) {
                    var index = index + 1;
                    var x = {
                        "name": "",
                        "dbType": "string",
                        "label": "",
                        "length": 190,
                        "nullable": true,
                        "default": false,
                        "htmlType": "text",
                        "validations": true,
                        "searchable": false,
                        "printable": false,
                        "primary": false,
                        "faker": false
                    };
                    this.data.fields.splice(index,0,x);
                },
                create() {
                    this.data = this.data_clone;
                    $("#modalForm").modal("toggle");
                },
                edit(index) {
                    this.data = this.data_json[index];
                    $("#modalForm").modal("toggle");
                },
                destroy(index) {
                    console.log(this.data_json);
                    this.data_json.splice(index, 1);
                    this.deleteAll(this.data_json);
                },
                getData() {
                    axios.post('/crud/data').then(res => {
                        this.data_json = res.data;
                    });
                }
            }
        });
    </script>
@endpush
