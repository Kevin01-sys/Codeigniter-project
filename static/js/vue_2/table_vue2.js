Vue.use(VueTables.ServerTable, VueTables.Event);
const base_url = document.getElementById(`base_url`).value

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
            }
        }
    },
    methods: { // working
        delete_row: function (row) {
            console.log(row)
            //console.log(`testing method`)
        }
    }
});
