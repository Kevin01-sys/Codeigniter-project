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

var vmServer = new Vue({
    el: "#communesServer",
    data: {
        //base_url: document.getElementById(`base_url`).value,
        dt_datos: {
            loading: false,
            columns: ['id', 'comuna', 'region'], // must be the names of the data obtained by the URL
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
                }
            }
        }
    }
});
