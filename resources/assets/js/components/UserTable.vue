<template>
    <div class="section" style="overflow-x: auto;">

        <div class="columns" style="min-width: 780px;">
            <div class="column" style="text-align: right;">
                <button type="button" class="button is-success" @click="openCreate()"><i class="fa fa-user-plus"></i>&nbsp;Create User</button>
            </div>
            <user-create-modal :isActive="isCreateActive" v-on:store="onCreate()" v-on:closeCreate="onCloseCreate()"></user-create-modal>
        </div>

        <div class="columns" style="min-width: 780px;">
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
                                <span @click="openRead(user)" class="icon" style="cursor: pointer;">
                                    <i class="fa fa-eye fa-lg"></i>
                                </span>
                                <span @click="openUpdate(user)" class="icon has-text-info" style="cursor: pointer;">
                                    <i class="fa fa-pencil-square fa-lg"></i>
                                </span>
                                <span @click="openDelete(user)" class="icon has-text-danger" style="cursor: pointer;">
                                    <i class="fa fa-trash fa-lg"></i>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <user-delete-modal :user="user" :isActive="isDeleteActive" v-on:deleteUser="onDelete()" v-on:closeDelete="onCloseDelete()"></user-delete-modal>
                    <user-update-modal :user="user" :isActive="isUpdateActive" v-on:save="onUpdate()" v-on:closeUpdate="onCloseUpdate()"></user-update-modal>
                    <user-read-modal :user="user" :isActive="isReadActive" v-on:closeRead="onCloseRead()"></user-read-modal>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    import UserCreateModal from './UserCreateModal.vue';
    import UserDeleteModal from './UserDeleteModal.vue';
    import UserUpdateModal from './UserUpdateModal.vue';
    import UserReadModal from './UserReadModal.vue';

    export default {

        props: ['users'],

        mounted() {
            if (this.users) {
                this.dataUsers = this.users;
            } else {
                this.list();
            }
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
                isDeleteActive: false,
                isUpdateActive: false,
                isReadActive: false
            };
        },

        methods: {
            openCreate() {
                this.isCreateActive = true;
            },
            openDelete(user) {
                this.user = user;
                this.isDeleteActive = true;
            },
            openUpdate(user) {
                this.oldUsers = JSON.parse(JSON.stringify(this.dataUsers));
                this.user = user;
                this.isUpdateActive = true;
            },
            openRead(user) {
                this.user = user;
                this.isReadActive = true;
            },
            onCreate() {
                this.isCreateActive = false;
                this.list();
            },
            onDelete() {
                this.isDeleteActive = false;
                this.list();
            },
            onUpdate() {
                this.isUpdateActive = false;
            },
            onRead() {
                this.isUpdateActive = false;
            },
            onCloseCreate() {
                this.isCreateActive = false;
            },
            onCloseDelete() {
                this.isUpdateActive = false;
            },
            onCloseUpdate() {
                this.isUpdateActive = false;
                this.dataUsers = JSON.parse(JSON.stringify(this.oldUsers));
            },
            onCloseRead() {
                this.isReadActive = false;
            },
            list() {
                var self = this;
                axios.get('/api/users')
                    .then(function (response) {
                        self.dataUsers = response.data;
                    })
                    .catch(function (error) {
                        self.errors = error.response.data.errors;
                    });
            }
        }
    }
</script>
