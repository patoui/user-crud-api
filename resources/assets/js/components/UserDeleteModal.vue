<template>
    <div class="modal" :class="{ 'is-active': isActive }" style="text-align: left;">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Deleting User: {{ user.username }}</p>
                <button @click="close()" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <h1>Are you sure you want to delete user: {{ user.username }}</h1>
            </section>
            <footer class="modal-card-foot">
                <button @click="deleteUser()" class="button is-danger">Delete</button>
                <button @click="close()" class="button">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['user', 'isActive'],

        data() {
            return {
                errors: {}
            };
        },

        methods: {
            // couldn't use "delete" as the function name, it's a reserved word
            deleteUser() {
                var self = this;
                axios.delete('/api/users/' + this.user.encoded_id)
                    .then(function (response) {
                        self.$emit('deleteUser');
                    })
                    .catch(function (error) {
                        self.errors = error.response.data.errors;
                    });
            },
            close() {
                this.$emit('closeDelete');
            }
        }
    }
</script>
