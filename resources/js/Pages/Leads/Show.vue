<template>
    <layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" v-model="lead.name" tabindex="1">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" v-model="lead.phone" tabindex="3">
                        </div>

                        <div class="form-group">
                            <label for="package">Interested Package</label>
                            <input id="package" class="form-control" v-model="lead.package" tabindex="5">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Email Address</label>
                            <input id="name" class="form-control" v-model="lead.email" tabindex="2">
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" id="date_of_birth" class="form-control" v-model="lead.date_of_birth" tabindex="4">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary mr-2">Save</button>
                <inertia-link class="btn btn-link" :href="$route('lead.index')">Back</inertia-link>
            </form>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout';

export default {
    components: { Layout },

    props: {
        leadProp: Object,
    },

    created() {
        this.lead = this.leadProp;
    },

    data() {
        return {
            'lead': {
                'name': '',
                'email': '',
                'phone': '',
                'date_of_birth': '',
                'package': ''
            }
        }
    },

    methods: {
        async handleSubmit() {

        }
    }
};
</script>
