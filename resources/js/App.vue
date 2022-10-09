<template>
    <div id="app">
        <!-- Sidebar -->
        <Corelayout />

        <!-- Content -->
        <div class="main-panel">
            <TopNavbar></TopNavbar>
            <div class="content">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
import Corelayout from "./layouts/corelayout.vue";
import Content from "./layouts/Content.vue";
import TopNavbar from "./layouts/topNavbar.vue";
import Add from "./pages/shop/add.vue";
export default {
    name: "App",
    components: { Corelayout, Content, TopNavbar, Add },
  
};
</script>
<style></style>
