<template>
  <div>
    <b-navbar :fixed="'top'" toggleable="lg" type="light" variant="light">
      <b-navbar-brand><img @click="scrollTo('start')" :src="static_host + '/dist/image/logo300black.png'" alt=""></b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item @click="scrollTo('news')">Новости</b-nav-item>
          <b-nav-item @click="scrollTo('services')" >Направления</b-nav-item>
          <b-nav-item @click="scrollTo('about')" >О нас</b-nav-item>
          <b-nav-item @click="scrollTo('good')" >Преимущества</b-nav-item>
          <b-nav-item v-b-toggle.sidebar-right>Контакты</b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form>
<!--            <b-form-input size="sm" class="mr-sm-2" placeholder="Поиск статей"></b-form-input>-->
            <b-button size="sm" v-b-modal.modal-center class="my-2 my-sm-0" type="button">Подать заявку</b-button>
          </b-nav-form>

<!--          <b-nav-item-dropdown text="Язык" right>-->
<!--            <b-dropdown-item href="#">EN</b-dropdown-item>-->
<!--            <b-dropdown-item href="#">KZ</b-dropdown-item>-->
<!--            <b-dropdown-item href="#">RU</b-dropdown-item>-->
<!--          </b-nav-item-dropdown>-->

<!--          <b-nav-item-dropdown right>-->
<!--            &lt;!&ndash; Using 'button-content' slot &ndash;&gt;-->
<!--            <template #button-content>-->
<!--              <em>Кабинет</em>-->
<!--            </template>-->
<!--            <b-dropdown-item href="#">Профиль</b-dropdown-item>-->
<!--            <b-dropdown-item href="#">Выйти</b-dropdown-item>-->
<!--          </b-nav-item-dropdown>-->
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <b-sidebar id="sidebar-right" title="Контакты" right shadow>
      <div class="px-3 py-2">
        <h3>Номера:</h3>
        <a href="tel:+77017645918">+7 (701) 764 59 18</a>
        <a target="_blank" href="https://wa.me/+77017645918" style="margin-left: 30px"><img class="wa" :src="static_host + '/dist/image/wa.png'" alt=""></a>
          <br>
        <a href="tel:+77172252698">+7 (7172) 25 26 98</a>
        <br>
        <br>
        <h3>Наш адрес:</h3>
        <strong>На левом берегу</strong>
        <p>
          Центральный офис: ул.Сауран 42/1, ЖК «Expo Boulevard - 2»</p>
        <div id="map"></div>

      </div>
    </b-sidebar>

    <b-modal id="modal-center" centered title="Подать заявку на обучение">
      <div>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group
              id="input-group-1"
              label="Электронная почта:"
              label-for="input-1"
              description="Мы не используем вашу почту для других целей"
          >
            <b-form-input
                id="input-1"
                v-model="form.email"
                type="email"
                placeholder="Введите почту"
                required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-2" label="Имя:" label-for="input-2">
            <b-form-input
                id="input-2"
                v-model="form.name"
                placeholder="Как вас зовут?"
                required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Номер телефона:" label-for="input-3">
            <b-form-input
                type="tel"
                id="input-3"
                v-model="form.phone"
                placeholder="Куда нам звонить?"
                required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Направление:" label-for="input-3">
            <b-form-select
                id="input-3"
                v-model="form.service_id"
                :options="services"
                required
            ></b-form-select>
          </b-form-group>

<!--          <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">-->
<!--            <b-form-checkbox-group-->
<!--                v-model="form.checked"-->
<!--                id="checkboxes-4"-->
<!--                :aria-describedby="ariaDescribedby"-->
<!--            >-->
<!--              <b-form-checkbox value="me">Check me out</b-form-checkbox>-->
<!--              <b-form-checkbox value="that">Check that out</b-form-checkbox>-->
<!--            </b-form-checkbox-group>-->
<!--          </b-form-group>-->

          <b-button type="submit" variant="primary">Отправить</b-button>
          <b-button type="reset" variant="danger">Очистить</b-button>
        </b-form>
<!--        <b-card class="mt-3" header="Form Data Result">-->
<!--          <pre class="m-0">{{ form }}</pre>-->
<!--        </b-card>-->
      </div>
    </b-modal>

    <b-alert
        :show="dismissCountDown"
        dismissible
        variant="success"
        @dismissed="dismissCountDown=0"
        @dismiss-count-down="countDownChanged"
    >
      <p>This alert will dismiss after {{ dismissCountDown }} seconds...</p>
      <b-progress
          variant="success"
          :max="dismissSecs"
          :value="dismissCountDown"
          height="4px"
      ></b-progress>
    </b-alert>
  </div>

</template>

<script>
  import Vue from 'vue'
  import axios from 'axios'
  import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

  Vue.use(BootstrapVue)
  Vue.use(IconsPlugin)
  Vue.use(axios)

  import 'bootstrap/dist/css/bootstrap.css'
  import 'bootstrap-vue/dist/bootstrap-vue.css'

  export default {
    props: [
      'static_host',
      'services',
      'ajax_host',
    ],
    data() {
      return {
        app_data: null,
        form: {
          email: '',
          name: '',
          phone: '',
          service_id: null
        },
        show: true,
        dismissSecs: 10,
        dismissCountDown: 0,
      }
    },
    created() {
      //основа
      Vue.set(this.$data, "app_data", APP_GLOBALS.data)
    },
    mounted() {
    },
    watch: {
    },
    methods: {

      countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },

      scrollTo(element){
        var hiddenElement = document.getElementById(element);

        hiddenElement.scrollIntoView({block: "center", behavior: "smooth"});
      },

      onSubmit(event) {
        event.preventDefault()

        axios.post(this.ajax_host + '/ticket', {
          form: this.form
        }).then((response) => {
          console.log(response.data)
          if (response.data.status === true) {
            this.alert_variant = 'success'
            this.showAlert()
          }
          if (response.data.status === false) {
            if (response.data.message) {
              this.alert_variant = 'danger'
              this.showAlert()
              // this.$toasted.show(response.data.message, {type: "error"})
            }
          }
        }).catch((error) => {
          console.log(error)
        })
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    },
  }
</script>

<style lang="scss" scoped>

  img {
    width: 100%;
  }
  .wa {
    width: 25px;
  }
  .navbar-brand {
    width: 15%;
  }

  #map {
    width: 100%;
    height: 200px;
  }
</style>


