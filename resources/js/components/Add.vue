<template>
<div class="modal" :class='openaddmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add {{list.name }} Detail</p>
      <button class="delete" aria-label="close" @click="addModalClose"></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Enter name" v-model="list.name" >
            <small class="has-text-danger" v-if="errors.name">{{errors.name[0]}}</small>
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
      <button class="button is-success" @click="save">Save</button>
      <button class="button" @click="addModalClose">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
  export default{
    props:['openaddmodal'],
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
      addModalClose(){
        this.$emit('closeRequest')
      },
      
      save(){
        axios.post('/phonebook',this.$data.list)
        .then((response)=>{
          this.addModalClose();
          this.$parent.push(this.$data.list);
        })
        .catch((error)=>
          this.errors = error.response.data.errors
        );
      }
    }
  }
</script>
