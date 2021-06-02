<template>
    <v-container fluid pa-0>
        <v-row align="center" justify="center" 
            style="height:50vh" dense>
            <v-col cols="12" lg="12" md="12" class="fill-height d-flex flex-column justify-center align-center" style="margin-top: 5rem;">
                <v-card flat tile class="card-name" elevation="2">
                    <v-card-text>
                        WELCOME TO CHUCK NORRIS JOKE, PLEASE ENTER YOUR NAME TO PROCEED <br>
                        *INSERT NAME AND SELECT ICON
                    </v-card-text>
                    <v-card-text>
                        <v-row class="fill-height" align="end">
                            <v-col cols="12">
                                <v-text-field
                                    ref="name"
                                    v-model="name"
                                    :rules="[() => !!name || 'This field is required']"
                                    label="Please input your name"
                                    required>
                                </v-text-field>
                            </v-col>
                        </v-row>

                        <v-row class="fill-height" align="end">
                            <v-col cols="6" v-for="data in characters" :key="data.id" >
                                <v-card width="100px" style="height: auto;margin: 0 auto">
                                    <img :src="data.path" alt="logo-img" width="100px" class="image-char"  @click="selectChar(data.path)">
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col style="padding-bottom: 5px !important">
                                <v-btn :disabled="!name || !path" color="orange" width="100%"><router-link :to="{name: 'chuckNorris', params: { name: name, path: path }}" class="btn btn-success">SUBMIT</router-link></v-btn>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col>
                                <div class="text-center">
                                    <v-dialog v-model="dialog" width="500">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on" width="100%">More Joke</v-btn>
                                        </template>

                                        <v-card>
                                            <v-card-title class="text-h5 grey lighten-2">
                                            It's Frankie Time!
                                            </v-card-title>

                                            <v-row class="fill-height" align="end" style="padding: 25px !important;">
                                                <v-col cols="12">
                                                    <v-text-field
                                                        ref="searchJoke"
                                                        v-model="searchJoke"
                                                        label="Search . . . "
                                                        required>
                                                    </v-text-field>
                                                </v-col>
                                                <v-col cols="12" style="padding: 0px 8px !important;">
                                                   <v-btn color="red lighten-2" @click="searched()" style="width: 100%">SEARCH</v-btn>
                                                </v-col>
                                            </v-row>

                                            <v-row v-for="aj in allJoke" :key="aj.id" style="margin: 10px">
                                                <v-col cols="12">
                                                    <v-card elevation="2" style="padding: 10px">{{aj.value}}<br>{{aj['categories'] != null ? aj.categories : null}}</v-card>
                                                </v-col>
                                            </v-row>

                                            <v-divider></v-divider>

                                            <v-card-actions>
                                            <v-spacer></v-spacer>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </div>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                characters: [],
                path: null,
                searchJoke: null,
                dialog: false,
                allJoke:[],
            }
        },
        created(){
            this.axios
                .get('api/characters')
                .then(response => {
                    this.characters = response.data
                    console.log(this.characters)
            });
        },
        methods: {
            selectChar(path){
                this.path = btoa(path);
            },
            searched(){
                 this.axios
                .get(`https://api.chucknorris.io/jokes/search?query=${this.searchJoke}`)
                .then(response => {
                    console.log(response)
                   this.allJoke = response.data.result;
                });
            }
        }
    }
</script>