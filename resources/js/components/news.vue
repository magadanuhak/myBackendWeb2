<template>
    <div class="cards">
        <a href="#" class="btn btn-primary" @click="workWithNew(false, 0)">Adauga Stire</a>
        <div class="card" v-for="oneNew in news">
            <h3 class="card-header">
                {{oneNew.title}}

                <button class="btn-info btn float-right" @click="removeNew(oneNew.id)">X</button>
                <button class="btn-dark btn float-right" @click="workWithNew(true, oneNew.id)">Editeaza</button>


            </h3>
            <div class="card-body">
                <p class="card-text">{{oneNew.content}}</p>
<!--                <a href="#" class="btn btn-primary" @click="">Citeste tot</a>-->

            </div>
        </div>
<!--        modala-->
        <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Titlu:</label>
                                <input type="text" v-model="newsTitle" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Continut:</label>
                                <textarea class="form-control" v-model="newsContent" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
                        <button type="button" v-if="isUpdate" class="btn btn-primary" @click="updateNew()">Modifica</button>
                        <button type="button" v-if="!isUpdate" class="btn btn-primary" @click="addNew()">Adauga</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                "news" : []
            }
        },
        methods:{
            getNews(){
                axios.get(this.site + 'api/posts', { headers: { Authorization: 'Bearer '+ this.token  }}).then(response => {
                  this.news = response.data;
                })
                  .catch((error) => {

                  });
            },
            updateNew(){

                axios.put(this.site + 'api/post/' + this.updateID , {title: this.newsTitle, content: this.newsContent} , { headers: { Authorization: 'Bearer '+ this.token  }}).then(response => {
                        this.getNews();
                })
                    .catch((error) => {
                        console.log('erroare ' + error);
                    });
                $('#newsModal').modal('toggle');
            },
            addNew(){
                if(!this.isUpdate){
                    axios.post(this.site + 'api/post', {title: this.newsTitle, content: this.newsContent, category_id: 2 }, {headers: {Authorization: 'Bearer ' + this.token}}).then(response => {
                        this.getNews();
                    })
                        .catch((error) => {
                            console.log('eroare ' + error);
                        });
                    $('#newsModal').modal('toggle');
                }
            },
            workWithNew(update, id = 0){
                if(update){
                    axios.get('api/post/'+ id, { headers: { Authorization: 'Bearer '+ this.token  }}).then(response => {
                        this.newsTitle = response.data.title;
                        this.newsContent = response.data.content;
                        this.isUpdate = true
                        this.updateID = id
                    })

                    .catch((error) => {
                        console.log('error 3 ' + error);
                    });

                } else {
                    this.newsTitle = ""
                    this.newsContent = ""
                    this.isUpdate = false

                }
                $('#newsModal').modal('toggle');
            },
            removeNew(id){

                axios.delete(this.site + "api/post/" + id , { headers: { Authorization: 'Bearer '+ this.token  }}).then(response => {
                    if(response.data == 204) {
                        alert("Sters cu success");
                        this.getNews();

                    }
                })
                .catch((error) => {
                    console.log('error 3 ' + error);
                });

            }

        },
        mounted() {
            this.site = localStorage.getItem('site');
            if (this.site ==  null ){
                document.location.href = "setup"
            } else {

            }
            this.token = localStorage.getItem('token');
            console.log(this.token);
            if(this.token == null ) {
                document.location.href="register"
            } else {
                this.getNews();
            }
        }
    }
</script>
