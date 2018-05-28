<template>
    <div class="section">

        <div class="columns">
            <div class="column" style="text-align: right;">
                <button type="button" class="button is-success" @click="openCreate()"><i class="fa fa-user-plus"></i>&nbsp;Create User</button>
            </div>
            <user-create-modal :isActive="isCreateActive" v-on:store="onStore()" v-on:closeCreate="onCloseCreate()"></user-create-modal>
        </div>

        <div class="columns">
            <div class="column" style="text-align: right;">
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
                                <span @click="openEdit(user)" class="icon has-text-info" style="cursor: pointer;">
                                    <i class="fa fa-pencil-square fa-lg"></i>
                                </span>
                                <span class="icon has-text-danger" style="cursor: pointer;">
                                    <i class="fa fa-trash fa-lg"></i>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <user-update-modal :user="user" :isActive="isEditActive" v-on:save="onSave()" v-on:closeUpdate="onCloseUpdate()"></user-update-modal>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    import UserCreateModal from './UserCreateModal.vue';
    import UserUpdateModal from './UserUpdateModal.vue';

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
                isCreateActive: false,
                isEditActive: false
            };
        },

        methods: {
            openCreate() {
                this.isCreateActive = true;
            },
            openEdit(user) {
                this.oldUsers = JSON.parse(JSON.stringify(this.dataUsers));
                this.user = user;
                this.isEditActive = ! this.isEditActive;
            },
            onStore() {
                this.isCreateActive = false;
            },
            onSave() {
                this.isEditActive = false;
            },
            onCloseCreate() {
                this.isCreateActive = false;
            },
            onCloseUpdate() {
                this.isEditActive = false;
                this.dataUsers = JSON.parse(JSON.stringify(this.oldUsers));
            }
        }
    }
</script>
