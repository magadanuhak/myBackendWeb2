<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inregistrare</div>

                    <div class="card-body">
                        <input type="text" v-model="token">
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
              "token" : null
          }
        },
        mounted() {
            let storage = localStorage.getItem('personalToken');
            if( storage == null){
                this.token = "Tokenul dumneavoastra lipseste"
            } else{
                this.token = storage;
            }
        }
    }
</script>
