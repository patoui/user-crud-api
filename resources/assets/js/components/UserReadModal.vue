<template>
    <div class="modal" :class="{ 'is-active': isActive }" style="text-align: left;">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Reading User: {{ user.username }}</p>
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
                                <input class="input" type="text" v-model="user.username" disabled>
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
                                <input class="input" type="text" v-model="user.email" disabled>
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
                                <input class="input" type="text" v-model="user.role" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button @click="close()" class="button">Close</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['user', 'isActive'],

        methods: {
            close() {
                this.$emit('closeRead');
            }
        }
    }
</script>
