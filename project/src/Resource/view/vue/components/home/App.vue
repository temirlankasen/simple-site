<template>
  <div>
    <root
        :static_host="static_host"
        :services="services"
        :ajax_host="ajax_host"
    >

    </root>

    <div id="start" class="main-content-section">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="main-photo">
        <img v-if="static_host" :src="static_host + '/dist/image/kids.png'">
        <div class="centered"><h1>Образовательный центр в Астане</h1></div>
        <div class="centered-down">ВСЕ ДЛЯ РАЗВИТИЯ ВАШЕГО РЕБЕНКА</div>
      </div>

      <br>
      <br>
      <br>

      <b-container class="content-section">
        <b-row>
          <b-col>
            <h4><strong>Ментальная арифметика:</strong></h4>
          </b-col>
        </b-row>
        <br>
        <br>
        <b-row>
          <b-col>
            <div class="video">
              <b-embed
                  type="iframe"
                  aspect="16by9"
                  src="https://www.youtube.com/embed/XBPWO_N5IG0?rel=0"
                  allowfullscreen
              ></b-embed>
            </div>
          </b-col>
        </b-row>
        <br>
        <br>
        <br>
        <b-row>
          <b-col>
            <h4 id="news"><strong>Новости:</strong></h4>
          </b-col>
        </b-row>
        <br>
        <br>
        <b-row>
          <div>
            <b-carousel
                id="carousel-1"
                v-model="slide"
                :interval="4000"
                controls
                indicators
                background="#ababab"
                img-width="1024"
                img-height="480"
                style="text-shadow: 1px 1px 2px #333;"
                @sliding-start="onSlideStart"
                @sliding-end="onSlideEnd"
            >
              <b-carousel-slide v-for="item in news"
                  :caption="item.name"
                  :text="item.description"
                  :img-src="static_host + '/dist/image/' + item.digest + '.jpg'"
              ></b-carousel-slide>
            </b-carousel>
          </div>
        </b-row>
        <br>
        <br>
        <br>
        <b-row>
          <b-col>
            <h4 id="services"><strong>Направления:</strong></h4>
          </b-col>
        </b-row>
        <br>
        <br>
        <b-row v-for="count in Math.ceil(this.services.length / 3)">
          <b-col>
            <b-card-group deck>
              <b-card v-for="(item, key) in services" v-if="(count - 1) * 3 <= key && count * 3 > key"
                      :img-src="static_host + '/dist/image/' + item.digest + '.jpg'"
                      :title="item.text"
                      img-alt="Image"
                      img-top>
                <b-card-text>
                  {{ item.description }}
                </b-card-text>
<!--                <template #footer>-->
<!--                  <small class="text-muted">Last updated 3 mins ago</small>-->
<!--                </template>-->
              </b-card>
            </b-card-group>
          </b-col>
        </b-row>
        <br>
        <br>
        <b-row>
          <b-col style="text-align: center">
            <h3 id="good"><strong>Наши преимущества</strong></h3>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-card-group deck>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>ИНДИВИДУАЛЬНЫЙ ПОДХОД К КАЖДОМУ РЕБЕНКУ. МЫ В КАЖДОМ РЕБЕНКЕ ВИДИМ ГЕНИЯ</b-card-text>
              </b-card>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>В РЕЗУЛЬТАТИВНОСТИ ЗАНЯТИЙ ЗАИНТЕРЕСОВАН КАЖДЫЙ ПРЕПОДАВАТЕЛЬ</b-card-text>
              </b-card>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>НАШИ ПЕДАГОГИ ПОВЫШАЮТ КВАЛИФИКАЦИЮ КАЖДЫЙ МЕСЯЦ</b-card-text>
              </b-card>
            </b-card-group>
            <br>
            <b-card-group deck>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>ПОДГОТОВКА К ШКОЛЕ ПО ПРОГРАММЕ НИШ, УТВЕРЖДЕННАЯ МИНИСТЕРСТВОМ ОБРАЗОВАНИЯ РК</b-card-text>
              </b-card>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>МЕНТАЛЬНАЯ АРИФМЕТИКА МЕНАР — ЛУЧШАЯ МЕТОДИКА С ОНЛАЙН ПЛАТФОРМОЙ, И ИЗУЧЕНИЕМ НА ТРЕХ ЯЗЫКАХ (КАЗАХСКИЙ, РУССКИЙ И АНГЛИЙСКИЙ)</b-card-text>
              </b-card>
              <b-card
                  border-variant="success"
                  align="center"
              >
                <b-card-text>АРТ-СТУДИЯ «НАТЮРМОРТ» — ЭТО СОВРЕМЕННАЯ ХУДОЖЕСТВЕННАЯ ШКОЛА</b-card-text>
              </b-card>
            </b-card-group>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>

<style scoped lang="scss">
.main-content-section {
  width: 100%;
  //display: grid;
  //grid-template-columns: 100%;
  div{
    max-width: 100%;
  }

  .content-section {
      //width: 80%;
      max-width: 80%;

    #carousel-1 {
      border-radius: 20px;
    }
  }

  .main-photo {
    position: relative;
    text-align: center;
    color: white;

    img {
      width: 100%;
      max-width: 100%;
    }

    .centered {
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .centered-down {
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  }
}

</style>

<script>
  import Vue from 'vue'
  import Centrifuge from "centrifuge"
  import SockJS from "sockjs-client";
  import axios from 'axios';
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';
  import Root from "../layout/root/Root";

  export default {
    name: "App",
    components: {
      Loading,
      Centrifuge,
      SockJS,
      Root,
    },
    data() {
      return {
        app_data: null,
        static_host: null,
        ajax_host: null,
        slide: 0,
        sliding: null,
        news: [],
        services: [],
      }
    },
    created() {
      //основа
      Vue.set(this.$data, "app_data", APP_GLOBALS)

      this.app_data = this.$data.app_data
      this.static_host = this.app_data.hosts.static
      this.ajax_host = this.app_data.hosts.ajax

      if(CONTENT.news && CONTENT.news.length > 0){
          this.news = CONTENT.news
      }

      if(CONTENT.services && CONTENT.services.length > 0){
          this.services = CONTENT.services
      }
      // setInterval(() => {
      //   if(this.more_chats.length > 0){
      //
      //     this.playSound()
      //     let chat = this.more_chats.pop()
      //     if(this.selected_desc){
      //       this.chats.unshift(chat)
      //     }else {
      //       this.chats.push(chat)
      //     }
      //     this.last_chat_id = chat.id
      //     this.has_chat_ids.push(chat.id)
      //   }
      // }, 1000)

      // this.audio = new Audio(this.start_host + '/dist/sound/message.mp3')
    },
    mounted() {
      this.connectWebSocket()
      // if(!this.from_admin) {
      //   document.getElementById('chats-component').addEventListener('scroll', this.handleScroll);
      // }
    },
    watch: {
      'socket_message': {
        handler(val) {

        }
      },
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      },
      handleScroll(event){
        let div = document.getElementById('chats-component')
        if(this.has_more && parseInt(div.scrollTop + div.offsetHeight) === div.scrollHeight){
          this.getChats()
        }
      },

      playSound(){
        this.audio.play();
      },
      connectWebSocket() {
        // this.centrifuge = new Centrifuge(this.web_socket.host, {
        //   sockjs: SockJS
        // });
        //
        // this.centrifuge.setToken(this.web_socket.token);
        // let callbacks = {
        //   "publish": (message) => {
        //     if(message.data.event === 'message') {
        //       this.socket_message = message
        //     }else{
        //       this.socket_other_message = message
        //     }
        //   }
        // }
        // this.centrifuge.on('connect', (context) => {
        //   this.is_disconnect = false
        // });
        // this.centrifuge.on('disconnect', (context) => {
        //   this.is_disconnect = true
        // });
        // this.centrifuge.on('error', (context) => {
        //   this.is_disconnect = true
        // });
        // let subscription = this.centrifuge.subscribe(this.user_id + 'o', callbacks)
        //
        // this.centrifuge.connect();
      },

      addChats() {
        // if (this.selected_state !== 'open' || this.from_admin) {
        //   return
        // }
        // axios.post(this.start_host + '/ajax/naimigram/chats?user_private_id=' + this.user_private_id, {
        //   has_chat_ids: this.has_chat_ids
        // }).then((response) => {
        //   if (response.data.status === true) {
        //     let new_chats = response.data.content
        //     if (new_chats) {
        //       this.playSound()
        //       new_chats.forEach(chat => {
        //           this.more_chats.push(chat)
        //       })
        //     }
        //   }
        //   if (response.data.status === false) {
        //     if (response.data.message) {
        //       this.$toasted.show(response.data.message, {type: "error"})
        //     }
        //   }
        // }).catch((error) => {
        //   console.log(error)
        // })
      },
    },
  }
</script>

