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
            <b-dropdown-item >Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
    
}
</script>
<style >
    
</style>