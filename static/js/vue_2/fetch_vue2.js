/* start: This Fetch works with Vue 2 */
var vm = new Vue({
    el: '#app',
    // property is reactive
    data: {
        name: 'Variables estado en Vue',
        data: {}
    },
    // define methods under the `methods` object
    methods: {
        get_data: function () {
            const url = "https://api.agify.io/?name=michael"
            fetch(url)
            .then(response => response.json())
            .then((json_data) => {
                console.log(json_data)
                console.log(this.data)
                this.data = json_data
                console.log(this.data)
            })
            .catch((error) => {
                console.log(error)
            })
            //console.log(event.target.id)
        }
    }
    })
/* end: This Fetch works with Vue 2 */