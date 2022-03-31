
const App = {
    data() {
        return {
            title: 'Ароматный Amaretto',
            photo: "../../static/img/amareto.jpg",
            price: 350,
            description: "Неповторимый вкус бразильского Amaretto не оставить вас равнодушными.",
        }
    },
    methods: {
        adda(){
            alert("ok")
            // $.ajax({
            //     url: 'catalog/rest/product/1/',         /* Куда пойдет запрос */
            //     method: 'post',                         /* Метод передачи (post или get) */
            //     dataType: 'json',                       /* Тип данных в ответе (xml, json, script, html). */
            //     data: {},                               /* Параметры передаваемые в запросе. */
            //     success: function(data){                /* функция которая будет выполнена после успешного запроса.  */
            //         alert(data);                        /* В переменной data содержится ответ от index.php. */
            //     }
            // })
        }
    }
}

Vue.createApp(App).mount('#app')