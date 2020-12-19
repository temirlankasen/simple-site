import Vue from 'vue'
import App from './App'
import axios from 'axios'
import Toasted from "vue-toasted"

const opts = {}

Vue.use(axios)

Vue.use(Toasted, {
    theme: "toasted-primary",
    position: "top-center",
    duration: 4000,
    action: [{
        text: 'close',
        onClick: (e, toastObject) => {
            toastObject.goAway()
        }
    }]
})
const toastDuration = 5 * 1000
Vue.toasted.register('error',
    (payload) => {
        if (!payload.message) {
            // return app.$t("default_error_message")
            return 'Опаньки. Что-то пошло не так.'
        }
        return payload.message;
    },
    {
        type: 'error',
        icon: 'error_outline',
        theme: 'primary',
        position: 'bottom-right',
        duration: toastDuration,
    }
)
Vue.toasted.register('success',
    (payload) => {
        if (!payload.message) {
            // return app.$t('default_success_message')
            return "Успех"
        }
        return payload.message;
    },
    {
        type: 'success',
        icon: 'done',
        theme: 'primary',
        position: 'bottom-right',
        duration: toastDuration,
    }
)

const app = new Vue({
    ...App
})

app.$mount('#app')
