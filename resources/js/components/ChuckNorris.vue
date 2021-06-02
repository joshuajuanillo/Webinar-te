<template>
    <main>
        <v-card class="chat-card">
            <v-container class="fill-height" elevation="2">
                <v-row class="fill-height pb-5" align="end">
                    <v-col class="col-overflow">
                        <div v-for="(item, index) in chat" :key="index" class="user-card" :class="['d-flex flex-row align-center my-2', item.from == 'user' ? 'justify-end': null]">
                            <v-card v-if="item.from == 'user'" class="u-card mr-3 mx-auto pd10" max-width="344">{{ item.msg }}</v-card>
                            <v-avatar :color="item.from == 'user' ? 'indigo': 'red'">
                                <span v-if="item.from != 'user'"><img class="avatar-char" :src="'/'+path" alt=""></span>
                                <span v-else>U</span>
                            </v-avatar>
                            <v-card v-if="item.from != 'user'" class="frankie-card ml-3 mx-auto pd10" max-width="344">{{ item.msg }}<br>Select category:<br><v-btn class="cat-btn" v-for="(cat, index) in categories" :key="index"  @click="selectCat(cat)">{{ cat }}</v-btn></v-card>
                        </div>
                    </v-col>
                </v-row>
            </v-container>

            <v-footer>
                <v-container class="ma-0 pa-0">
                    <v-row no-gutters>
                    <v-col>
                        <div class="d-flex flex-row align-center">
                        <v-text-field v-model="msg" placeholder="Select and Click Category" @keypress.enter="send"></v-text-field>
                        <v-btn icon class="ml-4" @click="send"><v-icon>mdi-send</v-icon></v-btn>
                        </div>
                    </v-col>
                    </v-row>
                </v-container>
            </v-footer>
        </v-card>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                chat: [],
                msg: null,
                result: null,
                path: null,
            }
        },
        created() {
            this.axios
                .get('https://api.chucknorris.io/jokes/categories')
                .then(response => {
                    console.log(response.data)
                    this.categories = response.data;
                    this.chat.push({from: "sushant", msg:  'Hi'+' '+`${this.$route.params.name}`+ ',I am Frankie - your source of non-stop laughter.'});
                    this.path = atob(`${this.$route.params.path}`);
                });
        },
        methods: {
            searchCategories(name){
                this.axios
                    .get(`https://api.chucknorris.io/jokes/random?category=${name}`)
                    .then(response => {
                        console.log(response.data)
                    })
            },

            send: function(){
                this.chat.push({
                    from: "user",
                    msg: this.msg
                })
                if(this.msg != "Start for A joke Franky!!"){
                    this.axios.get(`https://api.chucknorris.io/jokes/random?category=${this.msg}`)
                        .then(response => {
                            this.result = response.data.value
                            this.msg = null
                            this.addReply(this.result)
                        })
                }else if(this.categories.includes(this.msg)){

                }else{
                    this.msg = null
                    this.addReply(null)
                }
            },
                
            addReply(val){
                this.chat.push({
                    from: "sushant",
                    msg: val
                })
            },

            selectCat(name){
                this.msg = name;
            }
        }
    }
</script>