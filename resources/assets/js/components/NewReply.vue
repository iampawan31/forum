<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
<textarea name="body" id="body" class="form-control" cols="30" rows="10"
          placeholder="Have something to say?" v-model="body"></textarea>
            </div>
            <div class="form-group">
                <button @click="addReply" class="btn btn-primary">Post</button>
            </div>
        </div>
        <div v-else>
            <div class="text-center alert alert-warning" role="alert">
                Please <a href="/login">sign in</a> to participate in this discussion.
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                body: ''
            }
        },
        computed: {
            signedIn() {
                return window.App.signedIn;
            }
        },
        methods: {
            addReply() {
                axios.post(location.pathname + '/replies', {body: this.body})
                    .then(({data}) => {
                        this.body = '';
                        flash('Your reply has been posted');

                        this.$emit('created', data);
                    });
            }
        }
    }
</script>

<style scoped>

</style>