<template>
    <div id="sidebar" class="sidebar sidebar-blackground">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/dashboard" class="simple-text text-white text-decoration-none">
                    <div class="logo-img">
                        <img
                            src="https://seeklogo.com/images/B/Burger_King-logo-67A54F414B-seeklogo.com.png"
                        />
                    </div>
                    <span> Telesell Comp </span>
                </a>
            </div>

            <ul class="nav">
                <li class="nav-item" >
                        <router-link class="nav-link" to="/dashboard">

                            <span> <i class="bi bi-bar-chart-line"></i> </span>
                            <span class="text"> Dashboard </span>
                            
                        </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to="/Shop">
                        <span> <i class="bi bi-shop"></i> </span>
                        <span class="text">  สินค้า</span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to="/Notifications">
                        <span> <i class="bi bi-bell"></i> </span>
                        <span class="text"> ติดตามลูกค้า </span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to="/TableList">
                        <span> <i class="bi bi-list-task"></i> </span>
                        <span class="text">สถานะการซื้อลูกค้า </span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to="/customer">
                        <sapn> <i class="bi bi-file-person"></i></sapn>
                        <span class="text"> ลูกค้า </span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to="/Userprofile">
                        <sapn> <i class="bi bi-person-circle"></i> </sapn>
                        <span class="text"> โปรไฟล์ </span>
                    </router-link>
                </li>
                <li v-if="id == 1" class="nav-item">
                    <router-link class="nav-link" to="/Admin">
                        <sapn> <i class="bi bi-person"></i> </sapn>
                        <span class="text"> Admin </span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        compname: {
            type: String,
            default: "Telesell Comp",
        },
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id;
            this.name = window.Laravel.user.name
        } 
        if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }

      
    }
};
</script>
<style></style>
