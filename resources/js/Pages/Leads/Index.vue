<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Package</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="lead in leads" :key="lead.id">
                                <td>{{ lead.id }}</td>
                                <td>{{ lead.name }}</td>
                                <td>{{ lead.email }}</td>
                                <td>{{ lead.phone }}</td>
                                <td>{{ lead.date_of_birth }}</td>
                                <td>{{ lead.package }}</td>
                                <td>{{ moment(lead.created_at).fromNow() }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout';
import moment from 'moment';

export default {
    components: { Layout },

    props: ['leads'],

    filters: {
        moment: function (date) {
            return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        }
    }
};
</script>
