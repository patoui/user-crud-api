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
            <tr v-for="user in users" :key="user.encoded_id">
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
    </table>
</template>

<script>
    import UserEditModal from './UserEditModal.vue';

    export default {

        props: ['users'],

        methods: {
            openModal(user) {
                var ComponentClass = Vue.extend(UserEditModal);
                var instance = new ComponentClass({
                    propsData: { user: user },
                    parent: this
                });
                instance.$mount();
                this.$refs.container.appendChild(instance.$el);
            }
        }
    }
</script>
