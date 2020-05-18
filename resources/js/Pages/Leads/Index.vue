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
                                <td>
                                    <inertia-link :href="$route('lead.show', {lead: lead})">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" class="svg-inline--fa fa-angle-right fa-w-8" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>
                                    </inertia-link>
                                </td>
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
