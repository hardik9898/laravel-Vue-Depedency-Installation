<template>
<div class="modal" :class='openshowmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{list.name }}'s Detail</p>
      <button class="delete" aria-label="close" @click="showModalClose"></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
              {{list.name}}
          </div>
        </div>

        <div class="field">
          <label class="label">Phone</label>
          <div class="control">
              {{list.phone}}
          </div>
        </div>
        
        <div class="field">
          <label class="label">Email</label>
              {{list.email}}
          <div class="control">
          </div>
        </div>


    </section>
    <footer class="modal-card-foot">
      <button class="button" @click="showModalClose">Close</button>
    </footer>
  </div>
</div>
</template>
<script>
   export default{
    props:['openshowmodal'],
    data(){
        return {
            list:''
        }
    },
    methods:{
      showModalClose(){
        this.$emit('closeRequest')
      },
    }
  }
</script>
