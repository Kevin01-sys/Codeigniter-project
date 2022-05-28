var vm = new Vue({
    el: '#app',
    // property is reactive
    data: {
        name: 'Variables estado en Vue',
        data: {}
    },
    // define methods under the `methods` object
    methods: {
        get_api_data: function () { // receive data by Fetch
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
        },
        post_json_data: function () { // send and receive data by Fetch
            let gato = `Uri`
            const objectSend = { // object to be sent is created
                nombreGato : gato,
            }
            const jsonSend = JSON.stringify(objectSend);  // Object is transformed to a json format valid for sending
            console.log(`JSON to send: ${jsonSend}`);

            const base_url = document.getElementById(`base_url`).value
            const url = `http://localhost/codeigniter/index.php/Users/getJson`;
            console.log(url)

            const methodSend = 'POST';
            fetch(url, {
                method: methodSend,
                body: jsonSend,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then((json_data) => {
                console.log(json_data)
                this.data = json_data
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
    })