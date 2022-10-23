<template >
     <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand">Dashboard</a>

      <div class="collapse navbar-collapse">
        <div class="navbar-nav ml-auto">
          <b-nav-item-dropdown right  >
            <!-- Using 'button-content' slot -->
            <template #button-content>
              <em>
                <img class="avatar" src="@/assets/img/face/face.jpg"/>
              </em>
            </template>

            <b-dropdown-item >Profile</b-dropdown-item>
            <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
          </b-nav-item-dropdown>
          
        </div>
      </div>
            

    </div>
  </nav>
</template>
<script>
export default {
    data() {
      return {
        
      }
    },
    methods: {
      async logout(e) {
            e.preventDefault();
            await axios.get('/sanctum/csrf-cookie').then(response => {
                   axios.post('http://127.0.0.1:8000/api/logout')
                .then(response => {
                    if(response.data.success){
                        window.location.href ="/Home"
                    }else {
                        console.log(response);
                    }  
                }) 
                .catch(function (error) {
                     console.error(error);
                });
                   
            })
        }

    }
}
</script>
<style >
    
</style>