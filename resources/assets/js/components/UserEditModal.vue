<template>
    <div class="modal is-active" style="text-align: left;" v-on:openModal="updateUser()">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Editing User: {{ user.username }}</p>
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
                                <input class="input" type="text" v-model="user.role_label">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button @click="saveAndClose()" class="button is-success">Save changes</button>
                <button @click="close()" class="button">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['user'],

        methods: {
            saveAndClose() {
                var self = this;
                axios.put('/api/users/' + this.user.encoded_id, {
                    username: this.user.username,
                    email: this.user.email,
                    role: this.user.role_label
                })
                .then(function (response) {
                    self.$el.classList.remove('is-active');
                });
            },
            close() {
                this.$el.classList.remove('is-active');
            }
        }
    }
</script>
