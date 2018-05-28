<template>
    <table class="table" style="width: 100%;" ref="container">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th style="text-align: right;">Last Updated</th>
                <th style="text-align: right;">Tools</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in dataUsers" :key="user.encoded_id">
                <td>{{ user.username }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role_label }}</td>
                <td style="text-align: right;">{{ user.short_updated_at }}</td>
                <td style="text-align: right;">
                    <span @click="openModal(user)" class="icon has-text-info" style="cursor: pointer;">
                        <i class="fa fa-pencil-square fa-lg"></i>
                    </span>
                    <span class="icon has-text-danger" style="cursor: pointer;">
                        <i class="fa fa-trash fa-lg"></i>
                    </span>
                </td>
            </tr>
        </tbody>
        <user-edit-modal :user="user" :isActive="isActive" v-on:saveAndClose="onSaveAndClose()" v-on:close="onClose()"></user-edit-modal>
    </table>
</template>

<script>
    import UserEditModal from './UserEditModal.vue';

    export default {

        props: ['users'],

        mounted() {
            this.dataUsers = this.users;
        },

        data() {
            return {
                dataUsers: {},
                oldUsers: {},
                user: {
                    encoded_id: '',
                    username: '',
                    email: '',
                    role_label: ''
                },
                isActive: false
            };
        },

        methods: {
            openModal(user) {
                this.oldUsers = JSON.parse(JSON.stringify(this.dataUsers));
                this.user = user;
                this.isActive = ! this.isActive;
            },
            onSaveAndClose() {
                this.isActive = false;
            },
            onClose() {
                this.isActive = false;
                this.dataUsers = JSON.parse(JSON.stringify(this.oldUsers));
            }
        }
    }
</script>
