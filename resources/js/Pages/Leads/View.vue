<template>
    <layout>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><inertia-link :href="$route('lead.index')">Leads</inertia-link></li>
                    <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                </ol>
            </nav>

            <h1 class="mb-4">Lead Details</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5 mb-0">Details</h2>
                </div>

                <div class="card-body">
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

                        <button class="btn btn-primary mr-2">Update</button>
                        <inertia-link class="btn btn-light" :href="$route('lead.index')">Back</inertia-link>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">
                        Reminders
                    </h2>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush mb-3" v-if="lead.reminders.length > 0">
                        <li class="list-group-item list-group-item-action" v-for="reminder in lead.reminders" :key="reminder.id">
                            <div class="row">
                                <div class="col-md-6">{{ reminder.reminder }}</div>
                                <div class="col-md-2">{{ reminder.reminder_date }}</div>
                                <div class="col-md-2"><strong>{{ reminder.status }}</strong></div>
                                <div class="col-md-2 text-right">
                                    <inertia-link :href="$route('reminder.view', {lead: lead, reminder: reminder})">
                                        <span>View</span><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" class="svg-inline--fa fa-angle-right fa-w-8" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>
                                    </inertia-link>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <inertia-link class="btn btn-primary" :href="$route('reminder.create', { lead: lead })">Add New Reminder</inertia-link>
                </div>
            </div>
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
            let response = await this.$inertia.post('/leads', this.lead)
        }
    }
};
</script>
