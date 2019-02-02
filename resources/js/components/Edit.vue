<template>
<div class="modal" :class='openeditmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Update {{list.name }}'s Detail</p>
      <button class="delete" aria-label="close" @click="editModalClose"></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Enter name" v-model="list.name" >
            <small class="has-text-danger" v-if="errors.name  ">{{errors.name[0]}}</small>
          </div>
        </div>

        <div class="field">
          <label class="label">Phone</label>
          <div class="control">
            <input class="input" type="text" :class="{'is-danger':errors.phone}" placeholder="Enter Phone" v-model="list.phone" >
            <small class="has-text-danger" v-if="errors.name  ">{{errors.phone[0]}}</small>
          </div>
        </div>
        
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" type="email" :class="{'is-danger':errors.email}" placeholder="Enter Email Id" v-model="list.email">
            <small class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</small>
          </div>
        </div>


    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="update">Save</button>
      <button class="button" @click="editModalClose">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
  export default{
    props:['openeditmodal'],
        data(){
           return{
                list:{
                    name:'',
                    phone:'',
                    email:''
                },
                errors:{

                }
           }
           
        },
    methods:{
      editModalClose(){
        this.$emit('closeRequest')
      },
      
      update(){
        axios.patch(`/phonebook/${this.list.id}`,this.$data.list)
        .then((response)=>this.editModalClose())
        .catch((error)=>
          this.errors = error.response.data.errors
        );
      }
    }
  }
</script>
