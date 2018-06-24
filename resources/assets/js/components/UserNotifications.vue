<template>
    <li class="nav-item dropdown" v-if="notifications.length">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-heart"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" v-for="notification in notifications" @click="markAsRead(notification)" :href="notification.data.link" v-text="notification.data.message"></a>
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notifications: [],
            }
        },
        created () {
            axios.get("/profiles/" + window.App.user.name + '/notifications')
                .then(response => this.notifications = response.data)
        },
        methods: {
            markAsRead (notification) {
                axios.delete("/profiles/" + window.App.user.name + '/notifications/' + notification.id);
            }
        }
    }
</script>

<style scoped>

</style>