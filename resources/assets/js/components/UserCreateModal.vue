<template>
    <div class="modal" :class="{ 'is-active': isActive }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Create User</p>
                <button @click="close()" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Username</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" v-model="user.username">
                            </div>
                            <div v-if="errors.hasOwnProperty('username')">
                                <p v-for="error in errors.username" class="help is-danger">{{ error }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Email</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" v-model="user.email">
                            </div>
                            <div v-if="errors.hasOwnProperty('email')">
                                <p v-for="error in errors.email" class="help is-danger">{{ error }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Role</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" v-model="user.role">
                            </div>
                            <div v-if="errors.hasOwnProperty('role')">
                                <p v-for="error in errors.role" class="help is-danger">{{ error }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button @click="store()" class="button is-success">Create</button>
                <button @click="close()" class="button">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['isActive'],

        data() {
            return {
                user: {
                    username: '',
                    email: '',
                    role: ''
                },
                errors: {}
            };
        },

        methods: {
            store() {
                var self = this;
                axios.post('/api/users', {
                    username: this.user.username,
                    email: this.user.email,
                    role: this.user.role
                })
                .then(function (response) {
                    self.$emit('store');
                })
                .catch(function (error) {
                    self.errors = error.response.data.errors;
                });
            },
            close() {
                this.$emit('closeCreate');
            }
        }
    }
</script>
