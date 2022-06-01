Vue.use(VueTables.ServerTable, VueTables.Event);

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

var vmServer = new Vue({
    el: "#communesServer",
    data: {
        columns: ['id', 'comuna', 'region'], // must be the names of the data obtained by the URL
        tableData: [], //
        options: {
            filterable: true,
            perPage: 10, // how many items I'm showing per page
            headings: { // working: change default column headings
                id: 'identificador',
                comuna: 'comuna',
                region: 'region',
            },
            texts:{
                filterPlaceholder: 'filter' // working
            },
            sortable: ['id','name'], //
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
