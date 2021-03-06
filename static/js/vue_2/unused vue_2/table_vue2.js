Vue.use(VueTables.ServerTable, VueTables.Event);
const base_url = document.getElementById(`base_url`).value

/* var vmClient = new Vue({
    el:"#peopleClient",
    data: {
    columns: ['id','name','age'],
    tableData: [
    {id:1, name:"John",age:"20"},
    {id:2, name:"Jane",age:"24"},
    {id:3, name:"Susan",age:"16"},
    {id:4, name:"Chris",age:"55"},
    {id:5, name:"Dan",age:"40"}
    ],
    options: {
    // see the options API
    }
    }
    }); */

var vmServer = new Vue({
    el: "#peopleServer",
    data: {
        columns: ['id', 'name', 'run'], // must be the names of the data obtained by the URL
        tableData: [], //
        options: {
            columnsClasses: {
                'actions': 'text-center'
            },
            perPage:25, //
            perPageValues:[25], //
            orderBy: { //
                ascending: false,
                column: 'name'
            },
            headings: { // working: change default column headings
                id: 'identificador',
                name: 'nombre',
                run: 'run',
            },
            texts:{ //
                loadingError: 'Oops! Something went wrong'
            },
            sortable: ['id','name'], //
            requestFunction(data) { // working: obtain data from the URL
                return axios.post('http://localhost/codeigniter/index.php/lists/people', {
                    params: data
                }).catch(function (e) {
                    this.dispatch('error', e);
                });
            },
            responseAdapter({data}) { // working: If you are calling a foreign API or simply want to use your own keys, refer to the `responseAdapter` option.
                return {
                    data,
                    count: data.length
                }
            }
        },
    }
});

/* var vmServer = new Vue({
    el: "#communesServer",
    data: {
        columns: ['id', 'comuna', 'region'], // must be the names of the data obtained by the URL
        tableData: [], //
        options: {
            params: { // customizable variables that are sent
                test: '',
                testing: 'T',
            },
            filterable: true, // activated filter
            perPage: 10, // how many items I'm showing per page
            headings: { // working: change default column headings
                id: 'identificador',
                comuna: 'comuna',
                region: 'region',
            },
            texts:{
                filterPlaceholder: 'filter' // working
            },
            requestFunction(data) { // working: obtain data from the URL
                return axios.get(this.url, {
                    params: data
                }).catch(function (e) {
                    this.dispatch('error', e);
                });
            },
            responseAdapter({data}) { // working: If you are calling a foreign API or simply want to use your own keys, refer to the `responseAdapter` option.
                return {
                    data: data.comunas, // records with which Vue Table will work
                    count: data.contar_comunas[0].lenght // total number of records that Vue Table will work with
                }
            }
        },
    }
}); */

var vmServer = new Vue({
    el: "#communesServer",
    data: {
        name: 'Variables estado en Vue',
        dt_datos: {
            loading: false,
            columns: ['id', 'comuna','region','identificadores', 'buttons'], // must be the names of the data obtained by the URL
            options: {
                params: { // customizable variables that are sent
                    test: '',
                    testing: 'T',
                },
                //perPage: 10, // how many items I'm showing per page
                headings: { // working: change default column headings
                    id: 'identificador',
                    comuna: 'comuna',
                    region: 'region',
                    buttons: 'botones',
                },
                filterable: true, // activated filter
                responseAdapter({data}) { // working: If you are calling a foreign API or simply want to use your own keys, refer to the `responseAdapter` option.
                    return {
                        data: data.comunas, // records with which Vue Table will work
                        count: data.contar_comunas[0].lenght // total number of records that Vue Table will work with
                    }
                },
                requestFunction: function (data) {
                    return axios.get(`${base_url}index.php/lists/communes`, {params: data}).
                    catch(function (e) {
                        this.dispatch('error', e);
                    }.bind(this))
                },
                /* test: function (row) {
                    console.log(row)
                    //console.log(`testing method`)
                } */
                /* templates: {
                    created_at() {
                        return console.log('hola')
                    }
                }, */
                /* methods: {
                    delete: function () {
                        console.log(`testing method`)
                    }
                } */
            }
        }
    },
    methods: { // working
        delete_row: function (row) {
            console.log(row)
            //console.log(`testing method`)
        },
        update_row: function (props) {
            console.log(props.row)
            this.currentLine = props.row
            console.log(this.currentLine)
            /* this.currentLine = { // object to be sent is created
                id : props.row.id,
            } */

            console.log(this.currentLine)
            //document.getElementById('myModal').style.display = 'block';
            //modal.modal();
        }
    }
});


    /* var vm = new Vue({
        el: "#peopleServer",
        data: {
            columns: ['id', 'name', 'age'],
            tableData: [],
            options: {
                requestFunction(data) {
                    return axios.get('http://localhost/codeigniter/index.php/Lists/people', {
                        params: data.name
                    }).catch(function (e) {
                        this.dispatch('error', e);
                    });
                }
            }
        }
    }); */


    /* var vmServer = new Vue({
        el: "#peopleServer",
        data: {
            columns: ['name', 'username'],
            tableData: [],
            options: {}
        },
        created () {
            axios.get("https://jsonplaceholder.typicode.com/users")
                .then(res => {
                    this.tableData = res.data
                })
        }
    }); */
