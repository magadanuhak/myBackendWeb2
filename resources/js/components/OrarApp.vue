<template>
    <v-app id="keep">
        <v-app-bar
            app
            clipped-left
            color="amber"
        >
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <span class="title ml-3 mr-5">Orar&nbsp;<span class="font-weight-light"></span></span>
            <v-combobox
                v-model="peopleSelected"
                :items="people"
                solo-inverted
                flat
                hide-details
                prepend-inner-icon="search"
                box
                color="blue-grey lighten-2"
                label="Alege"
                item-text="name"
                item-value="name"
            >
                <!-- Template for render selected data -->
                <template
                    slot="selection"
                    slot-scope="data"
                >
                </template>
                <!-- Template for render data when the select is expanded -->
                <template
                    slot="item"
                    slot-scope="data"
                >
                    <!-- Divider and Header-->
                    <template v-if="typeof data.item !== 'object'">
                        <v-list-tile-content v-text="data.item"/>
                    </template>
                    <!-- Normal item -->
                    <template v-else>
                        <v-list-tile-content>
                            <v-list-tile-title v-html="data.item.name"/>
                            <v-list-tile-sub-title v-html="data.item.group"/>
                        </v-list-tile-content>
                    </template>
                </template>
            </v-combobox>

            <div class="flex-grow-1"></div>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            app
            clipped
            color="grey lighten-4"
        >
            <v-list
                dense
                class="grey lighten-4"
            >
                <template v-for="(item, i) in items">
                    <v-row
                        v-if="item.heading"
                        :key="i"
                        align="center"
                    >
                        <v-col cols="6">
                            <v-subheader v-if="item.heading">
                                {{ item.heading }}
                            </v-subheader>
                        </v-col>
                        <v-col
                            cols="6"
                            class="text-right"
                        >
                            <v-btn
                                small
                                text
                            >edit</v-btn>
                        </v-col>
                    </v-row>
                    <v-divider
                        v-else-if="item.divider"
                        :key="i"
                        dark
                        class="my-4"
                    ></v-divider>
                    <v-list-item
                        v-else
                        :key="i"
                        @click=""
                    >
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="grey--text">
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <v-container
                fluid
                class="grey lighten-4 fill-height"
            >
                <v-row
                    justify="center"
                    align="center"
                >
                    <v-col class="shrink">
                        <v-tooltip right>
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    :href="source"
                                    icon
                                    large
                                    target="_blank"
                                    v-on="on"
                                >
                                    <v-icon large>mdi-code-tags</v-icon>
                                </v-btn>
                            </template>
                            <span>Source</span>
                        </v-tooltip>
                        <v-tooltip right>
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    icon
                                    large
                                    href="https://codepen.io/johnjleider/pen/zgxbYO"
                                    target="_blank"
                                    v-on="on"
                                >
                                    <v-icon large>mdi-codepen</v-icon>
                                </v-btn>
                            </template>
                            <span>Codepen</span>
                        </v-tooltip>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
    </v-app>
</template>


<script>
    export default {
        data:function(){
            return {
                "newsTitle" : "",
                "site" : "http://tezas.md",
                "newsContent" : "",
                "updateID" : 0,
                "isUpdate" : false,
                "token" : "gED5GEtiqeD6olXykSJQ18lyF3ffpyOJ58ghuVR8H0KvqskaeBRwcTwgyDCc",
                "today_timetable" : "{}",
                "search_tabel" : "",
                drawer: null,
                peopleSelected:[],
                people: [
                    { header: 'grupa' },
                    { name: 'Sandra Adams'},
                    { name: 'Ali Connors', group: 'Group 1' },
                    { name: 'Trevor Hansen', group: 'Group 1' },
                    { name: 'Tucker Smith', group: 'Group 1'},
                    { divider: true },
                    { header: 'Group 2' },
                    { name: 'Britta Holt', group: 'Group 2'},
                    { name: 'Jane Smith ', group: 'Group 2'},
                    { name: 'John Smith', group: 'Group 2' },
                    { name: 'Sandra Williams', group: 'Group 2' }
                ],
                items: [
                    { icon: 'lightbulb_outline', text: 'Notes' },
                    { icon: 'touch_app', text: 'Reminders' },
                    { divider: true },
                    { heading: 'Labels' },
                    { icon: 'add', text: 'Create new label' },
                    { divider: true },
                    { icon: 'archive', text: 'Archive' },
                    { icon: 'delete', text: 'Trash' },
                    { divider: true },
                    { icon: 'settings', text: 'Settings' },
                    { icon: 'chat_bubble', text: 'Trash' },
                    { icon: 'help', text: 'Help' },
                    { icon: 'phonelink', text: 'App downloads' },
                    { icon: 'keyboard', text: 'Keyboard shortcuts' },
                ],
            }
        },
        props: {
            source: String,
        },
        methods:{
            getNews(){

            },
            updateNew(){


            },
            addNew(){

            },
            workWithNew(update, id = 0){

            },
            removeNew(id){


            }

        },
        mounted() {

        }
    }
</script>

<style scoped>
    #keep .v-navigation-drawer__border {
        display: none
    }
</style>
