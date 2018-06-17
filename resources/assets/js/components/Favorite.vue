<template>
    <button :class="classes" @click="toggle">
        <i class="fas fa-heart"></i>
        <span v-text="count"></span>
    </button>
</template>

<script>
    export default {
        props: ['reply'],
        computed: {
            classes() {
                return ['btn', this.active ? 'btn-primary' : 'btn-default'];
            },
            endpoint() {
                return '/replies/' + this.reply.id + '/favorites';
            }
        },
        data() {
            return {
                count: this.reply.favoritesCount,
                active: this.reply.isFavorited
            }
        },
        methods: {
            toggle() {
                this.active ? this.create() : this.destroy();
            },
            create() {
                axios.delete(this.endpoint);

                flash('Reply is removed from favorites');
                this.active = false;
                this.count--;
            },
            destroy() {
                axios.post(this.endpoint);

                flash('Reply is favorited');
                this.active = true;
                this.count++;
            },
        }
    }
</script>

<style scoped>

</style>