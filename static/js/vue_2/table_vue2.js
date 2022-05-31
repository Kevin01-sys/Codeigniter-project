Vue.use(VueTables.ServerTable);
Vue.use(VueTables.ClientTable);

var vmClient = new Vue({
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
    });

var vmServer = new Vue({
    el: "#peopleServer",
    methods: {
        test() {
            return 1;
        }
    },
    data: {
        columns: ['id', 'name', 'run'],
        tableData: [],
        loading: false,
        perPage:25,
        perPageValues:[25],
        options: {
            headings: {
                id: 'identificador',
                name: 'nombre',
                run: 'run',
            },
            customFilters: ['run','name'],
            responseAdapter({data}) {
                return {
                    data,
                    count: data.length
                }
            }
        },
        filterable: true
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
