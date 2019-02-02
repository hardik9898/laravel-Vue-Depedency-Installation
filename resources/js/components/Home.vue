<template>
<div>
    <nav class="panel column is-offset-2 is-8">
    <p class="panel-heading">
        Vue Js PhoneBook <button class="button is-outlined is-link" @click="openAdd">Add New</button>
    </p>
    <div class="panel-block">
        <p class="control has-icons-left">
        <input class="input is-small" type="text" placeholder="search">
        <span class="icon is-small is-left">
            <i class="fa fa-search" aria-hidden="true"></i>
        </span>
        </p>
    </div>
        <a class="panel-block is-active" v-for="item,key in list">
        <span class="column is-9">
            {{item.name}} 
        </span>
        <span class="is-3">

            <span class="panel-icon" @click="openEdit(key)">
                <i class="has-text-info fa fa-edit" aria-hidden="true"></i>
            </span>
            
            <span class="panel-icon" @click="deleteItem(key,item.id)">
                <i class="has-text-danger  fa fa-trash" aria-hidden="true"></i>
            </span>

            
            <span class="panel-icon" @click="openShow(key)">
                <i class="has-text-success fa fa-eye" aria-hidden="true"></i>
            </span>
        </span>  
    </a>
    
    </nav>
<Add :openaddmodal='openModalStatus' @closeRequest='closeModal'></Add>
<Show :openshowmodal='showModalStatus' @closeRequest='ShowcloseModal'></Show>
<Edit :openeditmodal='editModalStatus' @closeRequest='editcloseModal'></Edit>
</div>
</template>

<script>
let Add = require('./Add.vue').default;
let Show = require('./Show.vue').default;
let Edit = require('./Edit.vue').default;
    export default {
        components:{Add,Show,Edit},
        data(){
           return{
                openModalStatus:'',
                showModalStatus:'',
                editModalStatus:'',
                list:{},
                errors:{}
           }
           
        },
        mounted(){
             axios.post('/getData')
            .then((response)=>this.list = response.data)
            .catch((error)=>
            this.errors = error.response.data.errors
            );
        },
        methods: {
            openAdd(){
                this.openModalStatus='is-active'
            },
            closeModal(){
                this.openModalStatus=''
            },
             openEdit(key){
                 this.$children[2].list = this.list[key];
                this.editModalStatus='is-active'
            },
            editcloseModal(){
                this.editModalStatus=''
            },
            openShow(key)
            {
                this.$children[1].list = this.list[key];
                this.showModalStatus='is-active'
            },
            ShowcloseModal()
            {
                this.showModalStatus=''
            },
            deleteItem(key,id)
            {
                if(confirm('Are You Sure Delete This ??'))
                {

                    axios.delete(`/phonebook/${id}`)
                    .then((response)=>this.list.splice(key,1))
                    .catch((error)=>
                    this.errors = error.response.data.errors
                    );
                }
            }
        }
    }
</script>